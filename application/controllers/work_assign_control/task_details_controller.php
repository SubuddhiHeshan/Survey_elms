<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 3:23 PM
 */

class task_details_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('includes/header_model');
        $this->load->model('work_assign_model/task_details_model');


    }

    public function taskDetailsView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $headerData['lvCount'] = $response1;
                $headerData['unread'] = $response2;

                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];

                $response1 = $this->header_model->getPrntLvCount($emp);
                $response2 = $this->header_model->getPendingPrintLvs($emp);

                $headerData['prntCount'] = $response1;
                $headerData['WprntLvs'] = $response2;

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {


            }

            $taskId = $_GET['taskId'];

            $result1 = $this->task_details_model->getTaskDetails($taskId);

            if ($result1 != false) {

                $headerData['tskDtl'] = $result1;
                $headerData['id'] = $taskId;

                $this->load->view('work_assign_module/taskDetails', $headerData);

            } else {
                $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                redirect("page_controller/dashboardView", "refresh");

            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

    //Update Task Progress Status
    public function updateTaskProgress()
    {
        $prg = $this->input->post('progress');
        $rmk = $this->input->post('dsc');
        $TaskId = $_GET['taskID'];

        if ($prg == 1 || $prg == '0% Completed') {
            $prgStatus = 1;
        } elseif ($prg == 2 || $prg == '25% Completed') {
            $prgStatus = 2;
        } elseif ($prg == 3 || $prg == '50% Completed') {
            $prgStatus = 3;
        } elseif ($prg == 4 || $prg == '75% Completed') {
            $prgStatus = 4;
        } elseif ($prg == 5 || $prg == '100% Completed') {
            $prgStatus = 5;
        }

        $result = $this->task_details_model->setTaskProgress($prgStatus, $rmk, $TaskId);

        if ($result != false) {
            $this->session->set_flashdata("success", "Successfully updated the progress");
            redirect("work_assign_control/work_wheel_controller/workWheelView", "refresh");
        } else {
            $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
            redirect("work_assign_control/work_wheel_controller/workWheelView", "refresh");

        }


    }

}