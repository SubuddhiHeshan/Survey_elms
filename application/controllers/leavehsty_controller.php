<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/29/2021
 * Time: 12:18 AM
 */

class leavehsty_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('leavehsty_model');

        $this->load->model('includes/header_model');


    }

    public function leaveHistoryView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {


            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $empNo = $_SESSION['emp'];

                $response = $this->leavehsty_model->getLeaveHistory($empNo);

                if ($response != null) {

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $LvHistory['lvCount'] = $response1;
                    $LvHistory['unread'] = $response2;


                    $LvHistory['history'] = $response;

                    $this->load->view('leavehistory', $LvHistory);

                } else {
                    $this->session->set_flashdata("error", "No Leaves Applied, Apply Leave First");
                    redirect("page_controller/dashboardView", "refresh");
                }


                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {

                $empNo = $_SESSION['emp'];

                $response = $this->leavehsty_model->getLeaveHistory($empNo);

                if ($response != null) {

                    $LvHistory['history'] = $response;

                    $this->load->view('leavehistory', $LvHistory);

                } else {
                    $this->session->set_flashdata("error", "No Leaves Applied, Apply Leave First");
                    redirect("page_controller/dashboardView", "refresh");
                }

                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $empNo = $_SESSION['emp'];

                $response = $this->leavehsty_model->getLeaveHistory($empNo);

                if ($response != null) {

                    $emp = $_SESSION['emp'];

                    $response1 = $this->header_model->getPrntLvCount($emp);
                    $response2 = $this->header_model->getPendingPrintLvs($emp);

                    $LvHistory['prntCount'] = $response1;
                    $LvHistory['WprntLvs'] = $response2;


                    $LvHistory['history'] = $response;

                    $this->load->view('leavehistory', $LvHistory);

                } else {
                    $this->session->set_flashdata("error", "No Leaves Applied, Apply Leave First");
                    redirect("page_controller/dashboardView", "refresh");
                }


                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $empNo = $_SESSION['emp'];

                $response = $this->leavehsty_model->getLeaveHistory($empNo);

                if ($response != null) {

                    $LvHistory['history'] = $response;

                    $this->load->view('leavehistory', $LvHistory);

                } else {
                    $this->session->set_flashdata("error", "No Leaves Applied, Apply Leave First");
                    redirect("page_controller/dashboardView", "refresh");
                }

            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }
}