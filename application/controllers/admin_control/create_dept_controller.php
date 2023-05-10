<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 9:40 PM
 */
class create_dept_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('includes/header_model');
        $this->load->model('admin_model/create_dept_model');

    }

    public function createDepartmentView()
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

            $result1 = $this->create_dept_model->getAllOffices();

            $result2 = $this->create_dept_model->getAllDepts();

            $headerData['allOfz'] = $result1;
            $headerData['DeptsData'] = $result2;

            $this->load->view('admin_module/createDepartment', $headerData);


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

//Department create function
    public function createDept()
    {
        $ofzId = $this->input->post('ofz');
        $dept = $this->input->post('deptName');
        $deptId = $this->input->post('deptId');
        $createBy = $_SESSION['user'];

        $result = $this->create_dept_model->setDepartment($ofzId, $dept, $createBy,$deptId);

        if ($result != false) {

            $this->session->set_flashdata("success", "Department Created Successfully");
            redirect("admin_control/create_dept_controller/createDepartmentView", "refresh");
        } else {
            $this->session->set_flashdata("error", "Error Ocuured, Please try again later");
            redirect("admin_control/create_dept_controller/createDepartmentView", "refresh");

        }

    }

//    Check Department Id before create
    public function deptIdCheck()
    {
        $DeptId = $this->input->post('deptID');

        $result = $this->create_dept_model->getDeptChck($DeptId);

        if ($result == true) {
            echo 1;
        }
    }

}