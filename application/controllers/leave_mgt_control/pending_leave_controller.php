<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/22/2021
 * Time: 7:06 PM
 */

class pending_leave_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('leave_mgt_model/pending_leave_model');
        $this->load->model('includes/header_model');


    }


    public function pendingLeavesView()
    {

        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged']) {

            $dept = $_SESSION['dept'];
            $ofz = $_SESSION['ofz'];

            $response = $this->pending_leave_model->getPendingLeaves($dept,$ofz);

            $lgusrDept = $_SESSION['dept'];

            $response1 = $this->header_model->getUnredLvCount($lgusrDept);
            $response2 = $this->header_model->getUnredLvs($lgusrDept);

            $pendLvs['lvCount'] = $response1;
            $pendLvs['unread'] = $response2;


            $pendLvs['lvs'] = $response;
            $this->load->view('leave_management/pendingLeaves', $pendLvs);


        } else {
            $this->session->set_flashdata('error', 'Please Log in to the system to view this page');
            redirect('page_controller/index', 'refresh');
        }

    }
}