<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/27/2021
 * Time: 12:50 PM
 */
class  leave_controller extends CI_Controller
{

    public function __Construct()
    {
        parent::__construct();

        $this->load->model('leave_model');
        $this->load->model('apply_leave_model');
        $this->load->model('includes/header_model');


    }


    //Create Leave View
    public function cuLeaveView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $result = $this->leave_model->getLeaves();

            if ($result != false) {
                $LeaveData['leaves'] = $result;

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $LeaveData['lvCount'] = $response1;
                $LeaveData['unread'] = $response2;

                $this->load->view('cuLeave', $LeaveData);
            } else {
                $this->session->set_flashdata("error", "Error occured when rendering page!!!");
                redirect("page_controller/dashboardView", "refresh");
            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

    //Create new leave
    public function createLeave()
    {
        $leaveName = $this->input->post('lvName');
        $leaveQty = $this->input->post('lvQty');
        $leaveDesc = $this->input->post('lvDsc');
        $leaveCarder = $this->input->post('ucarder');
        $upBy = $_SESSION['user'];

        $result = $this->leave_model->createLeave($leaveName, $leaveQty, $leaveDesc, $leaveCarder, $upBy);

        if ($result == true) {
            $this->session->set_flashdata("success", "Successfully added a Leave");
            redirect('leave_controller/cuLeaveView', "refresh");
        } else {
            $this->session->set_flashdata("error", "Error occured in creating Leave");
            redirect('leave_controller/cuLeaveView', "refresh");
        }


    }

    //Edit Apply Leaves View
    public function editLeave()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lvId = $_GET['leaveid'];

                $response1 = $this->leave_model->editLeaveView($lvId);
                $response2 = $this->apply_leave_model->getLeaves();

                if ($response1 != false) {

                    $lgusrDept = $_SESSION['dept'];

                    $response3 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response4 = $this->header_model->getUnredLvs($lgusrDept);

                    $EdLvData['lvCount'] = $response3;
                    $EdLvData['unread'] = $response4;

                    $EdLvData['LvData'] = $response1;
                    $EdLvData['Leaves'] = $response2;
                    $EdLvData['EditId'] = $lvId;


                    $this->load->view('editLeave', $EdLvData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leavehsty_controller/leaveHistoryView', "refresh");

                }

                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {


                $lvId = $_GET['leaveid'];
                $response1 = $this->leave_model->editLeaveView($lvId);
                $response2 = $this->apply_leave_model->getLeaves();

                if ($response1 != false) {

                    $EdLvData['LvData'] = $response1;
                    $EdLvData['Leaves'] = $response2;
                    $EdLvData['EditId'] = $lvId;


                    $this->load->view('editLeave', $EdLvData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leavehsty_controller/leaveHistoryView', "refresh");

                }


                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];


                $lvId = $_GET['leaveid'];

                $response1 = $this->leave_model->editLeaveView($lvId);
                $response2 = $this->apply_leave_model->getLeaves($emp);

                if ($response1 != false) {


                    $response3 = $this->header_model->getPrntLvCount($emp);
                    $response4 = $this->header_model->getPendingPrintLvs($emp);

                    $EdLvData['prntCount'] = $response3;
                    $EdLvData['WprntLvs'] = $response4;


                    $EdLvData['LvData'] = $response1;
                    $EdLvData['Leaves'] = $response2;
                    $EdLvData['EditId'] = $lvId;

                    $this->load->view('editLeave', $EdLvData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leavehsty_controller/leaveHistoryView', "refresh");

                }


                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $lvId = $_GET['leaveid'];

                $response1 = $this->leave_model->editLeaveView($lvId);
                $response2 = $this->apply_leave_model->getLeaves();

                if ($response1 != false) {

                    $EdLvData['LvData'] = $response1;
                    $EdLvData['Leaves'] = $response2;
                    $EdLvData['EditId'] = $lvId;


                    $this->load->view('editLeave', $EdLvData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leavehsty_controller/leaveHistoryView', "refresh");

                }

            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");

        }

    }

    //Edit Apply Leave Submit
    public function updateLeave()
    {
        $lvId = $_GET['leaveid'];

        $empno = $_SESSION['emp'];
        $lid = $this->input->post('leavetype');
        $todate = $this->input->post('todate');
        $frmdate = $this->input->post('fromdate');
        $applyDate = date("Y-m-d");
        $applyqty = $this->input->post('reqQty');
        $rmk = $this->input->post('dsc');
        $status = 0;
        $isread = 0;

        $response = $this->leave_model->editLeaveSubmit($empno, $lid, $todate, $frmdate, $applyDate, $applyqty, $rmk, $status, $isread, $lvId);


        if ($response != false) {

            $this->session->set_flashdata("success", "Successfully Updated Your Leave");
            redirect('leavehsty_controller/leaveHistoryView', 'refresh');

        } else {

            $this->session->set_flashdata("error", "Error Occured while Updating your Leave Details");
            redirect('leavehsty_controller/leaveHistoryView', 'refresh');
        }


    }

    //Delete Leave in Leave History
    public function deleteLeave()
    {
        $lvId = $_GET['leaveid'];

        $result = $this->leave_model->setLeaveDelete($lvId);

        if ($result != false) {
            $this->session->set_flashdata("success", "Successfully Deleted Your Leave");
            redirect('leavehsty_controller/leaveHistoryView', 'refresh');

        } else {
            $this->session->set_flashdata("error", "Error Occured while Deleting your Leave Details");
            redirect('leavehsty_controller/leaveHistoryView', 'refresh');

        }
    }


}