<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 4:42 PM
 */

class user_management_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('includes/header_model');
        $this->load->model('user_mgt_model/user_management_model');

    }

    public function userManagementView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $lgusrDept = $_SESSION['dept'];
            $lgusrOfz = $_SESSION['ofz'];

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {


                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $headerData['lvCount'] = $response1;
                $headerData['unread'] = $response2;

                //Logged as a superAdmin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {


            }


            $result1 = $this->user_management_model->getAllUsers($lgusrDept, $lgusrOfz);

            $headerData['allDeptUsers'] = $result1;
            $this->load->view('user_management/manageUsers', $headerData);


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }

    }

    //Updating Active Inactive User status
    public function updateUserStatus()
    {
        $status = $this->input->post('status');
        $emp = $this->input->post('employee');

        if ($status == 1) {
            $upStatus = 0;
        } elseif ($status == 0) {
            $upStatus = 1;
        }

        $result = $this->user_management_model->setUserStatus($emp, $upStatus);

        if ($result == true) {
            echo 1;
        }
    }

    //Updating User Account Lock Status
    public function updateLockStatus()
    {
        $status = $this->input->post('status');
        $username = $this->input->post('username');

        if ($status == 1) {
            $upStatus = 0;
        } elseif ($status == 0) {
            $upStatus = 1;
        }

        $result = $this->user_management_model->setLockStatus($username, $upStatus);

        if ($result == true) {
            echo 1;
        }
    }
}