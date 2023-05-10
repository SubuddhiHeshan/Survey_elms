<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/17/2021
 * Time: 9:21 PM
 */
class all_leave_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('leave_mgt_model/all_leave_model');

        $this->load->model('includes/header_model');

    }


    public function allLeavesView()
    {

        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged']) {

            $dept = $_SESSION['dept'];
            $ofz = $_SESSION['ofz'];

            $response = $this->all_leave_model->getLeaves($dept,$ofz);

            $lgusrDept = $_SESSION['dept'];

            $response1 = $this->header_model->getUnredLvCount($lgusrDept);
            $response2 = $this->header_model->getUnredLvs($lgusrDept);

            $Lvs['lvCount'] = $response1;
            $Lvs['unread'] = $response2;


//            var_dump($response);


            $Lvs['allLvs'] = $response;
            $this->load->view('leave_management/AllLeaves', $Lvs);


        } else {
            $this->session->set_flashdata('error', 'Please Log in to the system to view this page');
            redirect('page_controller/index', 'refresh');
        }

    }

}