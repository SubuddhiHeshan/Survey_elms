<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/4/2021
 * Time: 8:53 PM
 */

class work_assign_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('includes/header_model');

        $this->load->model('work_assign_model/work_assign_model');
    }

    public function workAssignView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lguOfz = $_SESSION['ofz'];
                $lgusrDept = $_SESSION['dept'];

                $result1 = $this->work_assign_model->getTaskUsers($lguOfz, $lgusrDept);

                if ($result1 != false) {

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $headerData['lvCount'] = $response1;
                    $headerData['unread'] = $response2;

                    $headerData['taskUsers'] = $result1;

                    $this->load->view('work_assign_module/assignTask', $headerData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");

                }


            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $this->load->view('work_assign_module/assignTask');

            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

    //Assign task to user
    public function setTask()
    {

//        stage = 0 - Assign
//                1 - Engage
//
//        Priority Level = 1 - High
//                         2- Medium
//                         3- Low
//
//        Work Progress  1 - 0% Complete
////                     2 - 25% Complete
////                     3 - 50% Complete
////                     4 - 75% Complete
////                     5 - 100% Complete

        $tname = $this->input->post('taskName');
        $assignTo = $this->input->post('assign');
        $Prio = $this->input->post('priority');
        $Dead = date('Y-m-d', strtotime($this->input->post('deadline')));
        $rmk = $this->input->post('taskDsc');

        $assignBy = $_SESSION['user'];
        $stage = 0;
        $assignDate = date("Y-m-d h:i:s", time());

        $result = $this->work_assign_model->setCreateTask($tname, $assignTo, $Prio, $Dead, $rmk,
            $assignBy, $stage, $assignDate);

        if ($result != false) {

            $this->session->set_flashdata("success", "Task Assigned to user successfully");
            redirect("work_assign_control/work_assign_controller/workAssignView", "refresh");

        } else {
            $this->session->set_flashdata("error", "Error Occured, Please Try again later");
            redirect("work_assign_control/work_assign_controller/workAssignView", "refresh");

        }


    }


}



