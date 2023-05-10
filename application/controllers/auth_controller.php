<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('auth_model');
    }

    public function userLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        //Push data for get login details
        $result = $this->auth_model->getLoginData($username, $password);


        //if username and password match
        if ($result == !false) {
            //if user account is locked or disabled
            if ($result->lockStatus == 0 || $result->userStatus == 0) {
                $this->session->set_flashdata("error", "Your Account is Locked or Deactivated Please contact your Administrator");
                redirect("page_controller/index", "refresh");

                //If active user
            } else {
                $_SESSION['user_logged'] = true;
                $_SESSION['emp'] = $result->empNo;
                $_SESSION['user'] = $result->username;
                $_SESSION['user_role'] = $result->userRole;
                $_SESSION['fname'] = $result->fName;
                $_SESSION['ofz'] = $result->ofzId;
                $_SESSION['dept'] = $result->deptId;
                $_SESSION['deg'] = $result->dId;
                $_SESSION['user_carder'] = $result->userCarder;

                $this->session->set_flashdata("log_success", "You are logged in");
                redirect("page_controller/dashboardView", "refresh");
            }


            //When username and the password incorrect
        } else {

            //If username match setFailCount
            $failResult = $this->auth_model->setFailCount($username);

            //If FailCount set Successed
            if ($failResult == true) {

                //Get Fail; Count
                $chkLgResults = $this->auth_model->getFailCount($username);

                if ($chkLgResults->logFailAttemps == 3) {

                    //If FailCount is 3 Set Lock Status
                    $this->auth_model->setLock($username);

                    $this->session->set_flashdata("error", "Account is Locked, Please Contact your Administrator");
                    redirect("page_controller/index", "refresh");

                } else {
                    $this->session->set_flashdata("error", "Your Username or Password Incorrect");
                    redirect("page_controller/index", "refresh");

                }


            } else {
                $this->session->set_flashdata("error", "Your Username or Password Incorrect");
                redirect("page_controller/index", "refresh");

            }


        }
    }


    //Logout user
    public function logout()
    {
        unset($_SESSION);
        session_destroy();
        redirect("page_controller/index");
    }
}


?>