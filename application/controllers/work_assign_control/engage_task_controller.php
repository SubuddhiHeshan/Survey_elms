<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/5/2021
 * Time: 10:12 PM
 */

class engage_task_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('includes/header_model');
        $this->load->model('work_assign_model/engage_task_model');

    }


    public function engageTaskView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];

                $result1 = $this->engage_task_model->getAssignTasks($emp);

                $response1 = $this->header_model->getPrntLvCount($emp);
                $response2 = $this->header_model->getPendingPrintLvs($emp);

                $headerData['prntCount'] = $response1;
                $headerData['WprntLvs'] = $response2;
                $headerData['taskAssignData'] = $result1;

                $this->load->view('work_assign_module/engageTask', $headerData);

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $this->load->view('work_assign_module/engageTask');

            }

        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }


    }

    //Set task Accept Coming from ajax function
    public function setTaskAccept()
    {
        $workId = $this->input->post('workId');
        $startDate = date("Y-m-d h:i:s", time());

        $result = $this->engage_task_model->setEngageTask($workId,$startDate);

        if ($result == true) {
            echo 1;
        }
    }
}