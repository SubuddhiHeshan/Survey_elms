<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 8:48 PM
 */
class work_summary_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('includes/header_model');
        $this->load->model('work_assign_model/work_summary_model');

    }


    public function workSummaryView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

//           Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lgusrDept = $_SESSION['dept'];

                $username = $_SESSION['user'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $headerData['lvCount'] = $response1;
                $headerData['unread'] = $response2;

                //Get All tasks assigned by specific username
                $result = $this->work_summary_model->getAllTasks($username);

                $headerData['allTasks'] = $result;


                $this->load->view('work_assign_module/workSummary', $headerData);

            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }

    }
}