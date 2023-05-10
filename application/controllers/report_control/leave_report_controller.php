<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/28/2021
 * Time: 7:18 PM
 */
class leave_report_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('report_model/leave_report_model');
        $this->load->model('includes/header_model');

    }

    public function leaveReportView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $reportData['lvCount'] = $response1;
                $reportData['unread'] = $response2;


                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {


                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];

                $response1 = $this->header_model->getPrntLvCount($emp);
                $response2 = $this->header_model->getPendingPrintLvs($emp);

                $reportData['prntCount'] = $response1;
                $reportData['WprntLvs'] = $response2;

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {


            }

            $ofzId = $_SESSION['ofz'];
            $deptId = $_SESSION['dept'];

            $result1 = $this->leave_report_model->getAllOffice();
            $result2 = $this->leave_report_model->getAllDepartments();
            $result3 = $this->leave_report_model->getAllUsers($ofzId, $deptId);
            $result4 = $this->leave_report_model->getAllLeaves();

//            Report generation came with data set
            if (isset($_GET['gen']) && $_GET['gen'] == 1) {

                $office = $this->input->post('office');
                $dept = $this->input->post('dept');
                $employee = $this->input->post('emp');
                $lType = $this->input->post('type');
                $lStatus = $this->input->post('status');
                $fdate = $this->input->post('fdate');
                $tdate = $this->input->post('tDate');

                $response = $this->leave_report_model->getReportData($office, $dept, $employee, $lType, $lStatus, $fdate, $tdate);

                $reportData['genData'] = $response;

            }

            $reportData['Offices'] = $result1;
            $reportData['Departments'] = $result2;
            $reportData['Users'] = $result3;
            $reportData['Leaves'] = $result4;

            $this->load->view('report_module/leaveReport', $reportData);


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

}