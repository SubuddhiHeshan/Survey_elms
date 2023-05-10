<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 11:48 PM
 */
class create_desg_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('includes/header_model');
        $this->load->model('admin_model/create_desg_model');

    }

    public function createDesigView()
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

            $result = $this->create_desg_model->getAllDesignations();

            $headerData['DesgData'] = $result;

            $this->load->view('admin_module/createDesignations', $headerData);


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

//    Designation create
    public function createDesignation()
    {
        $DName = $this->input->post('degName');
        $CreateBy = $_SESSION['user'];

        $result = $this->create_desg_model->setDesig($DName, $CreateBy);

        if ($result != false) {

            $this->session->set_flashdata("success", "Designation Created Successfully");
            redirect("admin_control/create_desg_controller/createDesigView", "refresh");
        } else {
            $this->session->set_flashdata("error", "Error Ocuured, Please try again later");
            redirect("admin_control/create_desg_controller/createDesigView", "refresh");

        }

    }
}