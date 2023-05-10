<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/28/2021
 * Time: 7:02 PM
 */

class apply_leave_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('apply_leave_model');
        $this->load->model('includes/header_model');

    }


    public function applyLeaveView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {


            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $result = $this->apply_leave_model->getLeaves();

                if ($result != false) {

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $Leaves['lvCount'] = $response1;
                    $Leaves['unread'] = $response2;

                    $Leaves['totalLeaves'] = $result;

                    $this->load->view('applyLeave', $Leaves);
                } else {

                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('page_controller/dashboardView', 'refresh');
                }

                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {


                $result = $this->apply_leave_model->getLeaves();

                if ($result != false) {

                    $Leaves['totalLeaves'] = $result;

                    $this->load->view('applyLeave', $Leaves);
                } else {

                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('page_controller/dashboardView', 'refresh');
                }


                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];

                $result = $this->apply_leave_model->getLeaves($emp);

                if ($result != false) {


                    $response1 = $this->header_model->getPrntLvCount($emp);
                    $response2 = $this->header_model->getPendingPrintLvs($emp);

                    $Leaves['prntCount'] = $response1;
                    $Leaves['WprntLvs'] = $response2;
                    $Leaves['totalLeaves'] = $result;

                    $this->load->view('applyLeave', $Leaves);
                } else {

                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('page_controller/dashboardView', 'refresh');
                }


                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $result = $this->apply_leave_model->getLeaves();

                if ($result != false) {

                    $Leaves['totalLeaves'] = $result;

                    $this->load->view('applyLeave', $Leaves);
                } else {

                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('page_controller/dashboardView', 'refresh');
                }


            }

        } else {
            $this->session->set_flashdata("error", "Please Log in to the system to view this page!!!");
            redirect("page_controller/index", "refresh");

        }

    }

    //Create Leave Function
    public function insertLeaves()
    {

        $empno = $_SESSION['emp'];
        $lid = $this->input->post('leavetype');
        $todate = $this->input->post('todate');
        $frmdate = $this->input->post('fromdate');
        $applyDate = date("Y-m-d");
        $applyqty = $this->input->post('reqQty');
        $rmk = $this->input->post('dsc');
        $status = 0;
        $isread = 0;


//        var_dump($empno,$lid,$frmdate,$todate,$applyDate,$applyqty,$rmk,$status,$isread);

        $response = $this->apply_leave_model->setLeaves($empno, $lid, $frmdate, $todate, $applyDate, $applyqty, $rmk, $status, $isread);

        if ($response != false) {
            $this->session->set_flashdata("success", "Leave Applied Successfully, Waitting for Admin Approval");
            redirect("apply_leave_controller/applyLeaveView", "refresh");
        } else {
            $this->session->set_flashdata("error", "Error occured while applying Leave");
            redirect("apply_leave_controller/applyLeaveView", "refresh");
        }

    }


}