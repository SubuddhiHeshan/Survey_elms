<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/17/2020
 * Time: 10:15 PM
 */

class profile_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('profile_model');

        $this->load->model('includes/header_model');

    }

//User profile view and get data
    public function profileView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $Employee = $_SESSION['emp'];
                $result1 = $this->profile_model->getLogUserData($Employee);
                $result2 = $this->profile_model->getUserLoginData($Employee);


                if ($result1 != false && $result2 != false) {

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $userData['lvCount'] = $response1;
                    $userData['unread'] = $response2;

                    $userData['profile'] = $result1;
                    $userData['usernames'] = $result2;

                    $this->load->view('profile', $userData);
                    //if user data not found
                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }

                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {

                $Employee = $_SESSION['emp'];
                $result1 = $this->profile_model->getLogUserData($Employee);
                $result2 = $this->profile_model->getUserLoginData($Employee);


                if ($result1 != false && $result2 != false) {

                    $userData['profile'] = $result1;
                    $userData['usernames'] = $result2;

                    $this->load->view('profile', $userData);

                    //if user data not found
                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }

                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {


                $Employee = $_SESSION['emp'];
                $result1 = $this->profile_model->getLogUserData($Employee);
                $result2 = $this->profile_model->getUserLoginData($Employee);


                if ($result1 != false && $result2 != false) {

                    $userData['profile'] = $result1;
                    $userData['usernames'] = $result2;

                    $emp = $_SESSION['emp'];

                    $response1 = $this->header_model->getPrntLvCount($emp);
                    $response2 = $this->header_model->getPendingPrintLvs($emp);

                    $userData['prntCount'] = $response1;
                    $userData['WprntLvs'] = $response2;

                    $this->load->view('profile', $userData);
                    //if user data not found
                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $Employee = $_SESSION['emp'];
                $result1 = $this->profile_model->getLogUserData($Employee);
                $result2 = $this->profile_model->getUserLoginData($Employee);


                if ($result1 != false && $result2 != false) {

                    $userData['profile'] = $result1;
                    $userData['usernames'] = $result2;

                    $this->load->view('profile', $userData);
                    //if user data not found
                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }


            }

            //if user trig to view page without login
        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }


    }

    public function editProfileView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {


            //Logged as a Admin
            if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 1) {

                $result1 = $this->profile_model->getLogUserData($_SESSION['emp']);

                if ($result1 != false) {

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $result2 = $this->profile_model->getDesignations();
                    $result3 = $this->profile_model->getUserRoles();
                    $result4 = $this->profile_model->getLogRole($_SESSION['user_role']);
                    $result5 = $this->profile_model->getOffice();
                    $result6 = $this->profile_model->getDepartments();

                    $profileData['regData'] = $result1;
                    $profileData['designations'] = $result2;
                    $profileData['uroles'] = $result3;
                    $profileData['logRole'] = $result4;
                    $profileData['office'] = $result5;
                    $profileData['department'] = $result6;

                    $profileData['lvCount'] = $response1;
                    $profileData['unread'] = $response2;

                    $this->load->view('editProfile', $profileData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }

                //Loged as a Leave_officer
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 2) {

                $result1 = $this->profile_model->getLogUserData($_SESSION['emp']);

                if ($result1 != false) {

                    $result2 = $this->profile_model->getDesignations();
                    $result3 = $this->profile_model->getUserRoles();
                    $result4 = $this->profile_model->getLogRole($_SESSION['user_role']);
                    $result5 = $this->profile_model->getOffice();
                    $result6 = $this->profile_model->getDepartments();

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $profileData['lvCount'] = $response1;
                    $profileData['unread'] = $response2;


                    $profileData['regData'] = $result1;
                    $profileData['designations'] = $result2;
                    $profileData['uroles'] = $result3;
                    $profileData['logRole'] = $result4;
                    $profileData['office'] = $result5;
                    $profileData['department'] = $result6;
                    $this->load->view('editProfile', $profileData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }

                //Loged as a User
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 3) {

                $result1 = $this->profile_model->getLogUserData($_SESSION['emp']);


                if ($result1 != false) {

                    $emp = $_SESSION['emp'];

                    $response1 = $this->header_model->getPrntLvCount($emp);
                    $response2 = $this->header_model->getPendingPrintLvs($emp);

                    $result2 = $this->profile_model->getDesignations();
                    $result3 = $this->profile_model->getUserRoles();
                    $result4 = $this->profile_model->getLogRole($_SESSION['user_role']);
                    $result5 = $this->profile_model->getOffice();
                    $result6 = $this->profile_model->getDepartments();

                    $profileData['prntCount'] = $response1;
                    $profileData['WprntLvs'] = $response2;

                    $profileData['regData'] = $result1;
                    $profileData['designations'] = $result2;
                    $profileData['uroles'] = $result3;
                    $profileData['logRole'] = $result4;
                    $profileData['office'] = $result5;
                    $profileData['department'] = $result6;

                    $this->load->view('editProfile', $profileData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }

                //Loged as a Super Admin
            } elseif (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 4) {

                $result1 = $this->profile_model->getLogUserData($_SESSION['emp']);


                if ($result1 != false) {

                    $result2 = $this->profile_model->getDesignations();
                    $result3 = $this->profile_model->getUserRoles();
                    $result4 = $this->profile_model->getLogRole($_SESSION['user_role']);
                    $result5 = $this->profile_model->getOffice();
                    $result6 = $this->profile_model->getDepartments();

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $profileData['lvCount'] = $response1;
                    $profileData['unread'] = $response2;


                    $profileData['regData'] = $result1;
                    $profileData['designations'] = $result2;
                    $profileData['uroles'] = $result3;
                    $profileData['logRole'] = $result4;
                    $profileData['office'] = $result5;
                    $profileData['department'] = $result6;
                    $this->load->view('editProfile', $profileData);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect("page_controller/dashboardView", "refresh");
                }
            }


        } else {
            $this->session->set_flashdata("error", "Please log in to the system to view this page");
            redirect("page_controller/index", "refresh");
        }
    }

    //Update Profile
    public function updateProfile()
    {
        $curDate = date("Y-m-d h:i:s", time());
        $curEmpNo = $_SESSION['emp'];
        $CurUsername = $_SESSION['user'];

        $fname = $this->input->post('fname');
        $mname = $this->input->post('mname');
        $lname = $this->input->post('lname');
        $UpdEmpno = $this->input->post('empno');
        $desg = $this->input->post('desg');
        $email = $this->input->post('email');
        $tele = $this->input->post('tele');
        $add1 = $this->input->post('add1');
        $add2 = $this->input->post('add2');
        $ucarder = $this->input->post('ucarder');
        $role = $this->input->post('role');
        $office = $this->input->post('office');
        $dept = $this->input->post('dept');
        $Updusername = $this->input->post('username');

        $result1 = $this->profile_model->updateEmployee1($curEmpNo, $fname, $mname, $lname, $UpdEmpno, $desg, $email, $tele, $add1, $add2, $ucarder, $office, $dept, $curDate, $CurUsername);

        $result2 = $this->profile_model->updateEmployee2($curEmpNo, $CurUsername, $role, $Updusername, $curDate);

        if ($result1 == true && $result2 == true) {

            if ($CurUsername == $Updusername) {
                $this->session->set_flashdata("success", "Employee Updated Succesfully!!!");
                redirect("profile_controller/profileView", "refresh");
            } else {
                $this->session->set_flashdata("success", "Username Updated Successfully, Please enter your new Credentials");
                redirect("page_controller/index", "refresh");
            }

        } else {
            $this->session->set_flashdata("error", "Error occured while updating!!!");
            redirect("page_controller/dashboardView", "refresh");
        }

    }
}