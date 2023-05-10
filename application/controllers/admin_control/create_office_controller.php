<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 8:07 PM
 */

class create_office_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('includes/header_model');
        $this->load->model('admin_model/create_office_model');

    }

    public function createOfficeView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $headerData['lvCount'] = $response1;
                $headerData['unread'] = $response2;

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

            }

            $result = $this->create_office_model->getAllOffices();

            $headerData['ofzdata'] = $result;


            $this->load->view('admin_module/createOffice', $headerData);


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

//    Check Office Id exsist before create
    public function officeIdCheck()
    {
        $oId = $this->input->post('OfzID');

        $result = $this->create_office_model->getOfzChck($oId);

        if ($result == true) {
            echo 1;
        }


    }


//    Create Office
    public function createOffice()
    {
        $OId = $this->input->post('ofzId');
        $OName = $this->input->post('ofzName');
        $add1 = $this->input->post('add1');
        $add2 = $this->input->post('add2');
        $CreateBy = $_SESSION['user'];

        $result = $this->create_office_model->setOffice($OId,$OName,$add1,$add2,$CreateBy);

        if ($result !=false){

            $this->session->set_flashdata("success", "Office Created Successfully");
            redirect("admin_control/create_office_controller/createOfficeView", "refresh");
        } else{
            $this->session->set_flashdata("error", "Error Ocuured, Please try again later");
            redirect("admin_control/create_office_controller/createOfficeView", "refresh");

        }


    }
}