<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/24/2021
 * Time: 3:31 PM
 */

class print_leave_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('print_leave_model');
        $this->load->model('includes/header_model');

    }

    public function printLeaveView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {


                $empNo = $_SESSION['emp'];

                $response = $this->print_leave_model->getPrintLeaveDtl($empNo);

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $printLvDtl['lvCount'] = $response1;
                $printLvDtl['unread'] = $response2;


                $printLvDtl['prntDtl'] = $response;

                $this->load->view('printLeave', $printLvDtl);


                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {

                $empNo = $_SESSION['emp'];

                $response = $this->print_leave_model->getPrintLeaveDtl($empNo);
                $printLvDtl['prntDtl'] = $response;

                $this->load->view('printLeave', $printLvDtl);

                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $empNo = $_SESSION['emp'];

                $response = $this->print_leave_model->getPrintLeaveDtl($empNo);

                $printLvDtl['prntDtl'] = $response;

                $emp = $_SESSION['emp'];

                $response1 = $this->header_model->getPrntLvCount($emp);
                $response2 = $this->header_model->getPendingPrintLvs($emp);

                $printLvDtl['prntCount'] = $response1;
                $printLvDtl['WprntLvs'] = $response2;
                $this->load->view('printLeave', $printLvDtl);

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $empNo = $_SESSION['emp'];

                $response = $this->print_leave_model->getPrintLeaveDtl($empNo);
                $printLvDtl['prntDtl'] = $response;

                $this->load->view('printLeave', $printLvDtl);

            }

        } else {
            $this->session->set_flasdata("error", "Please Log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }
}