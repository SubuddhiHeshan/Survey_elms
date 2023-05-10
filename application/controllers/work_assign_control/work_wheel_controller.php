<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 12:18 PM
 */

class work_wheel_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('includes/header_model');
        $this->load->model('work_assign_model/work_wheel_model');


    }

    public function workWheelView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

//            Logged as a User
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];

                $response1 = $this->header_model->getPrntLvCount($emp);
                $response2 = $this->header_model->getPendingPrintLvs($emp);

                $headerData['prntCount'] = $response1;
                $headerData['WprntLvs'] = $response2;

                //Get Tasks Assigned Only to you
                $result1 = $this->work_wheel_model->getEngageTasks($emp);

                $headerData['enrollTasks'] = $result1;

                $this->load->view('work_assign_module/workWheel', $headerData);

            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }
}