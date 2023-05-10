<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 11:17 PM
 */
class work_report_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('includes/header_model');
        $this->load->model('report_model/work_report_model');
    }

    public function workReportView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $reportData['lvCount'] = $response1;
                $reportData['unread'] = $response2;


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

            $result1 = $this->work_report_model->getAllOffice();
            $result2 = $this->work_report_model->getAllDepartments();
            $result3 = $this->work_report_model->getAssignByUsers($ofzId, $deptId);
            $result4 = $this->work_report_model->getAssignToUsers($ofzId, $deptId);

            //REport Generation came with data set
            if (isset($_GET['gen']) && $_GET['gen'] == 1) {

                $office = $this->input->post('office');
                $dept = $this->input->post('dept');
                $asgnBy = $this->input->post('aBy');
                $asTo = $this->input->post('aTo');
                $tStatus = $this->input->post('Tstatus');
                $priority = $this->input->post('Priority');
                $prog = $this->input->post('prog');
                $fdate = $this->input->post('fdate');
                $tdate = $this->input->post('tDate');

                $response = $this->work_report_model->getReportData($office, $dept, $asgnBy, $asTo, $tStatus, $priority, $prog, $fdate, $tdate);

//                var_dump($response);
                $reportData['genData'] = $response;
//var_dump($office, $dept, $asgnBy, $asTo, $tStatus, $priority, $prog, $fdate, $tdate);

            }
            $reportData['Offices'] = $result1;
            $reportData['Departments'] = $result2;
            $reportData['AssignBy'] = $result3;
            $reportData['AssignTo'] = $result4;


            $this->load->view('report_module/workAssignReport', $reportData);


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }
}