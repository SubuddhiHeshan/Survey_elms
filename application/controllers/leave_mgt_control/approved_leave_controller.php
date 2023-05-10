<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/22/2021
 * Time: 9:21 PM
 */

class approved_leave_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('leave_mgt_model/approved_leave_model');

        $this->load->model('includes/header_model');


    }

    public function approvedLeavesView()
    {

        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged']) {

            $dept = $_SESSION['dept'];
            $ofz = $_SESSION['ofz'];

            $response = $this->approved_leave_model->getApprovedLeaves($dept,$ofz);

            $appdLvs['lvs'] = $response;

            $lgusrDept = $_SESSION['dept'];

            $response1 = $this->header_model->getUnredLvCount($lgusrDept);
            $response2 = $this->header_model->getUnredLvs($lgusrDept);

            $appdLvs['lvCount'] = $response1;
            $appdLvs['unread'] = $response2;


            $this->load->view('leave_management/approvedLeaves', $appdLvs);


        } else {
            $this->session->set_flashdata('error', 'Please Log in to the system to view this page');
            redirect('page_controller/index', 'refresh');
        }

    }
}