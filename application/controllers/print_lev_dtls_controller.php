<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/25/2021
 * Time: 12:11 PM
 */
class print_lev_dtls_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('print_lev_dtls_model');
    }



    public function printLevDtls()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $levId = $_GET['leaveId'];


            //Print Leave Details coming from header notification from user
            if (isset($_GET['print']) && $_GET['print'] == 1) {

                $printStatus = 1;

                $response = $this->print_lev_dtls_model->getPrintLvDtls($levId);

                if ($response != false) {

                    $this->print_lev_dtls_model->setLvPrintStatus($levId, $printStatus);

                    $prntDtls['dtl'] = $response;

                    $this->load->view('printLevDetails', $prntDtls);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("print_leave_controller/printLeaveView", "refresh");
                }
            } else {
                $response = $this->print_lev_dtls_model->getPrintLvDtls($levId);

                if ($response != false) {

                    $prntDtls['dtl'] = $response;

                    $this->load->view('printLevDetails', $prntDtls);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("print_leave_controller/printLeaveView", "refresh");
                }
            }


        } else {

            $this->session->set_flashdata('error', 'Please log in to the system to view this page');
            redirect("page_controller/index", "refresh");
        }


    }
}