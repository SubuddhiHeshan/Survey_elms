<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/27/2021
 * Time: 11:27 PM
 */

class register_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('register_model');

        $this->load->model('includes/header_model');

    }

    public function RegisterEmployeeView()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $result1 = $this->register_model->getDesignations();
            $result3 = $this->register_model->getOfz();
            $result4 = $this->register_model->getDept();
            $result5 = $this->register_model->getLeaves();

            $registerData['designation'] = $result1;
            $registerData['offices'] = $result3;
            $registerData['departments'] = $result4;
            $registerData['leaves'] = $result5;

            $lgusrDept = $_SESSION['dept'];

            $response1 = $this->header_model->getUnredLvCount($lgusrDept);
            $response2 = $this->header_model->getUnredLvs($lgusrDept);

            $registerData['lvCount'] = $response1;
            $registerData['unread'] = $response2;


            $this->load->view('register', $registerData);

        } else {
            $this->session->set_flashdata("error", "Please Log in to the system to view this page!!!");
            redirect("page_controller/index", "refresh");
        }
    }

    public function createEmployee()
    {
        $fname = $this->input->post('fname');
        $mname = $this->input->post('mname');
        $lname = $this->input->post('lname');
        $gen = $this->input->post('gender');
        $empno = $this->input->post('empno');
        $desig = $this->input->post('desg');
        $email = $this->input->post('email');
        $tele = $this->input->post('tele');
        $add1 = $this->input->post('add1');
        $add2 = $this->input->post('add2');
        $ucarder = $this->input->post('ucarder');
        $ofz = $this->input->post('office');
        $dept = $this->input->post('dept');
        $leaves = $this->input->post('leaves');
        $crBy = $_SESSION['user'];
        $curDate = date("Y-m-d h:i:s", time());


        $userCheck = $this->register_model->checkUserExsist($empno);

        //Check User Exsist
        if ($userCheck == true) {

            $this->session->set_flashdata("error", "THIS EMPLOYEE NO ALREADY EXSIST IN THE SYSTEM");
            redirect("register_controller/RegisterEmployeeView", "refresh");

            //If user not exsist
        } else {
            //Assign Leave Eligibility
            if ($leaves != null) {

                $result = $this->register_model->createUser($fname, $mname, $lname, $gen, $empno, $desig, $email, $tele, $add1, $add2, $ucarder, $ofz, $dept, $crBy, $curDate);

                if ($result != false) {

                    $data = $this->register_model->getLeaves();
                    foreach ($data as $d) {
                        foreach ($leaves as $slev) {
                            if ($slev == $d['levId']) {
                                $eligible = $d['levQty'];

                                $response = $this->register_model->assignLeaves($empno, $slev, $eligible);

                            }
                        }
                    }

                    //All Data insertion Success
                    if ($response != false) {

                        $this->session->set_flashdata("success", "Employee Created Successfully");
                        redirect("register_controller/RegisterEmployeeView", "refresh");

                    } else {
                        $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                        redirect("register_controller/RegisterEmployeeView", "refresh");

                    }


                } else {
                    $this->session->set_flashdata("error", "Error Occured during insertion, Please Try again!!!");
                    redirect("register_controller/RegisterEmployeeView", "refresh");

                }

            } else {
                $this->session->set_flashdata("error", "Please Select Eligible Leaves");
                redirect("register_controller/RegisterEmployeeView", "refresh");

            }
        }

    }
}