<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/18/2021
 * Time: 6:45 PM
 */

class leave_dtl_controller extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();

        $this->load->model('leave_mgt_model/leave_dtl_model');

        $this->load->model('includes/header_model');


    }

    public function detailsView()
    {

        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $lvid = $_GET['leaveid'];

            //When Admin read the Notification
            if (isset($_GET['read']) && $_GET['read'] == 1) {

                $isRead = 1;

                $response = $this->leave_dtl_model->getLvDtl($lvid);

                if ($response != false) {

                    //Set Leave read cpming through notification
                    $this->leave_dtl_model->setLvRead($lvid, $isRead);

                    $LeaveDtl['dtl'] = $response;
                    $LeaveDtl['id'] = $lvid;

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $LeaveDtl['lvCount'] = $response1;
                    $LeaveDtl['unread'] = $response2;


                    $this->load->view('leave_management/leaveDetails', $LeaveDtl);

                } else {

                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leave_mgt_control/pending_leave_controller/pendingLeavesView', 'refresh');

                }

                //Loged as a Admin
            } elseif ($_SESSION['user_role'] == 1) {
                $response = $this->leave_dtl_model->getLvDtl($lvid);

                if ($response != false) {

                    $LeaveDtl['dtl'] = $response;
                    $LeaveDtl['id'] = $lvid;

                    $lgusrDept = $_SESSION['dept'];

                    $response1 = $this->header_model->getUnredLvCount($lgusrDept);
                    $response2 = $this->header_model->getUnredLvs($lgusrDept);

                    $LeaveDtl['lvCount'] = $response1;
                    $LeaveDtl['unread'] = $response2;


                    $this->load->view('leave_management/leaveDetails', $LeaveDtl);

                } else {

                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leave_mgt_control/all_leave_controller/allLeavesView', 'refresh');

                }

                //Loged as a Leave Officer
            } elseif ($_SESSION['user_role'] == 2) {

                $response = $this->leave_dtl_model->getLvDtl($lvid);
                if ($response != null) {

                    $LeaveDtl['dtl'] = $response;
                    $LeaveDtl['id'] = $lvid;

                    $this->load->view('leave_management/leaveDetails', $LeaveDtl);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leave_mgt_control/all_leave_controller/allLeavesView', 'refresh');

                }

                //Loged as a User
            } elseif ($_SESSION['user_role'] == 3) {

                $response = $this->leave_dtl_model->getLvDtl($lvid);

                if ($response != null) {

                    $emp = $_SESSION['emp'];

                    $response1 = $this->header_model->getPrntLvCount($emp);
                    $response2 = $this->header_model->getPendingPrintLvs($emp);

                    $LeaveDtl['prntCount'] = $response1;
                    $LeaveDtl['WprntLvs'] = $response2;

                    $LeaveDtl['dtl'] = $response;
                    $LeaveDtl['id'] = $lvid;

                    $this->load->view('leave_management/leaveDetails', $LeaveDtl);

                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leave_mgt_control/all_leave_controller/allLeavesView', 'refresh');

                }

            }


        } else {

            $this->session->set_flashdata("error", "PLEASE LOG IN TO THE SYSTEM TO VIEW THIS PAGE");
            redirect('page_controller/index', 'refresh');
        }

    }

    //Set Aproved Leave
    public function appdLeave()
    {
        if (isset($_SESSION['user_logged']) && $_SESSION['user_logged'] == true) {

            $lid = $_GET['leaveid'];
            $lvType = $_GET['id'];
            $emp = $_GET['emp'];
            $actTknBy = $_SESSION['user'];
            $actType = $this->input->post('actionType');
            $apdQty = $this->input->post('appdQty');
            $rmk = $this->input->post('dsc');
            $aprdDate = date("Y-m-d h:i:s", time());


            $lvYear = date("Y");

            //Update Leave Status
            $response1 = $this->leave_dtl_model->setappdLeave($lid, $actTknBy, $actType, $apdQty, $rmk, $aprdDate);

            //When Leave status is approved and update leave balance
            if ($response1 != false && $actType == 1) {

                $printStatus = 0;


//                Update Leave Balance
                $response2 = $this->leave_dtl_model->setLevaveBalance($lvType, $emp, $apdQty, $lvYear);

                //Update Print Status when Leave is approved
                $this->leave_dtl_model->setPrintStatus($lid, $printStatus);

                //When Leave Balance Update successfully
                if ($response2 != false) {
                    $this->session->set_flashdata("success", "ACTION TAKEN");
                    redirect('leave_mgt_control/all_leave_controller/allLeavesView', 'refresh');

                    //When Error occured in Leave Balance Updation
                } else {
                    $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                    redirect('leave_mgt_control/all_leave_controller/allLeavesView', 'refresh');
                }

                //When Leave status update successfully
            } elseif ($response1 != false) {
                $this->session->set_flashdata("success", "ACTION TAKEN");
                redirect('leave_mgt_control/all_leave_controller/allLeavesView', 'refresh');

                //When Leave Status update Failed
            } else {
                $this->session->set_flashdata("error", "ERROR OCCURED, PLEASE TRY AGAIN LATER");
                redirect('leave_mgt_control/all_leave_controller/allLeavesView', 'refresh');

            }


        } else {

            $this->session->set_flashdata("error", "PLEASE LOG IN TO THE SYSTEM TO VIEW THIS PAGE");
            redirect('page_controller/index', 'refresh');
        }
    }
}