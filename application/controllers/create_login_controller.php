<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/2/2021
 * Time: 8:50 PM
 */
class create_login_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model('includes/header_model');

        $this->load->model('create_login_model');


    }

    public function createLoginView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $lgusrDept = $_SESSION['dept'];

                $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                $response2 = $this->header_model->getUnredLvs($lgusrDept);

                $headerData['lvCount'] = $response1;
                $headerData['unread'] = $response2;

                $result1 = $this->create_login_model->getUserRoles();

                $headerData['roles'] = $result1;

                $this->load->view('createLogin', $headerData);

                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {

                $this->load->view('createLogin');

                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $emp = $_SESSION['emp'];

                $response1 = $this->header_model->getPrntLvCount($emp);
                $response2 = $this->header_model->getPendingPrintLvs($emp);

                $headerData['prntCount'] = $response1;
                $headerData['WprntLvs'] = $response2;


                $this->load->view('createLogin', $headerData);

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $this->load->view('createLogin');

            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

    //User Validation calling from ajax function
    public function empNoValidate()
    {
        $EmpNo = $this->input->post('employee');


        $result = $this->create_login_model->getLgCrEmpData($EmpNo);

        if ($result == true) {

            $_SESSION['emp_check'] = 1;

            $data["fName"] = $result->fName;
            $data["lName"] = $result->lName;
            $data["office"] = $result->ofzName;
            $data["dept"] = $result->deptName;
            $data["desig"] = $result->dName;

            echo json_encode($data);

        } else {
            unset($_SESSION['emp_check']);
        }


    }


//    Username Validation calling from ajax functio
    public function usernameValidate()
    {
        $username = $this->input->post('user');

        $response = $this->create_login_model->getUsernameCheck($username);

        if ($response == true) {
            echo 1;
            $_SESSION['username_taken'] = 1;
        } else {
            unset($_SESSION['username_taken']);
        }

    }

//    Login creation
    public function createLogin()
    {

        $empno = $this->input->post('empNo');
        $username = $this->input->post('usrname');
        $pwd = $this->input->post('pwd');
        $urole = $this->input->post('role');
        $createBy = $_SESSION['user'];
        $createDate = date("Y-m-d h:i:s", time());

        $encPwd = md5($pwd);


        if (isset($_SESSION['username_taken']) && $_SESSION['username_taken'] == 1) {

            $this->session->set_flashdata("error", "DUPPLICATE USERNAME, PLEASE APPLY DIFFERENT USERNAME");
            redirect('create_login_controller/createLoginView', 'refresh');

        } else {
            $result = $this->create_login_model->createLogin($empno, $username, $encPwd, $urole, $createBy, $createDate);

            if ($result != false) {

                unset($_SESSION['username_taken']);

                $this->session->set_flashdata("success", "LOGIN CREATED SUCCESSFULLY");
                redirect('create_login_controller/createLoginView', 'refresh');

            } else {
                $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                redirect('create_login_controller/createLoginView', 'refresh');

            }
        }

    }


}