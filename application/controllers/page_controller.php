<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class page_controller extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('includes/header_model');
        $this->load->model('admin_das_model');
        $this->load->model('user_das_model');
        $this->load->model('officer_das_model');

    }

    //Load login to frontend
    public function index()
    {
       $this->load->view('login');
        // $this->load->view('login1');

    }

    //Load User Dashboard 
    public function dashboardView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $headerData['lvCount'] = $response1;
                $headerData['unread'] = $response2;

                $result1 = $this->admin_das_model->getDashLeaveData($lgusrDept);
                $result2 = $this->admin_das_model->getAprdCount($_SESSION['user']);
                $result3 = $this->admin_das_model->getNotAprdCount($_SESSION['user']);
                $result4 = $this->admin_das_model->getPendingCount($lgusrDept);
                $result5 = $this->admin_das_model->getAssignTaskCount($_SESSION['user']);


                $headerData['LvDtls'] = $result1;
                $headerData['aprdCount'] = $result2;
                $headerData['nApdCountnt'] = $result3;
                $headerData['pendingCount'] = $result4;
                $headerData['taskCount'] = $result5;

                $this->load->view('adminDashboard', $headerData);

                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {

                $ofzId = $_SESSION['ofz'];
                $deptId = $_SESSION['dept'];

                $Oresult1 = $this->officer_das_model->getBrAprdCount($ofzId, $deptId);
                $Oresult2 = $this->officer_das_model->getBrNtAprdCount($ofzId, $deptId);
                $Oresult3 = $this->officer_das_model->getBrPendingCount($ofzId, $deptId);
                $Oresult4 = $this->officer_das_model->getTotRegEmpUsr($ofzId, $deptId);

                $Oresult5 = $this->officer_das_model->getBranchLVSummary($ofzId, $deptId);

                $headerData['brApdCount'] = $Oresult1;
                $headerData['brNApdCount'] = $Oresult2;
                $headerData['brPendingCount'] = $Oresult3;
                $headerData['TotRegCount'] = $Oresult4;

                $headerData['BrLeaveSummry'] = $Oresult5;

                $this->load->view('leaveOfficerDashboard', $headerData);

                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];

                $response1 = $this->header_model->getPrntLvCount($emp);
                $response2 = $this->header_model->getPendingPrintLvs($emp);

                $headerData['prntCount'] = $response1;
                $headerData['WprntLvs'] = $response2;

                $Uresult1 = $this->user_das_model->getCasulLvCount($emp);
                $Uresult2 = $this->user_das_model->getRestLvCount($emp);
                $Uresult3 = $this->user_das_model->getLastRestLvCount($emp);
                $Uresult4 = $this->user_das_model->getLeavesSummary($emp);
                $Uresult5 = $this->user_das_model->getTotAssignTasks($emp);
                $Uresult6 = $this->user_das_model->getTotDoneTasks($emp);

                $headerData['casApdCnt'] = $Uresult1;
                $headerData['rstApdCnt'] = $Uresult2;
                $headerData['LastrstApdCnt'] = $Uresult3;
                $headerData['LvSummary'] = $Uresult4;
                $headerData['TotTasks'] = $Uresult5;
                $headerData['TotDoneTasks'] = $Uresult6;


                $this->load->view('userDashboard', $headerData);

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $this->load->view('dashboard');

            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

    public function checkQty()
    {
        $stdate = $this->input->post('Start');
        $endDate = $this->input->post('End');


        $conSD = date("d", strtotime($stdate));

        $conED = date("d", strtotime($endDate));

        $smonth = date("m", strtotime($stdate));
        $emonth = date("m", strtotime($endDate));

//        echo $smonth . ' '. $emonth;

        if ($smonth < $emonth) {

            $month_diff = $emonth - $smonth;

            $month_qty = $month_diff * 30;

            $tot = $month_qty + ($conED - $conSD);
        } else {
            $tot = $conED - $conSD;

        }


        echo $tot;


    }

    //Test
    public function testUIView()
    {
        $this->load->view('testUi');
    }

}

?>
