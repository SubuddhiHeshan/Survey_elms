<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/27/2021
 * Time: 2:41 PM
 */
class leave_model extends CI_Model
{
    private $tbhty = 'leavehistory';
    private $tblv = 'leaves';


    public function createLeave($leaveName, $leaveQty, $leaveDesc, $leaveCarder, $upBy)
    {
        $values = array('levName' => $leaveName, 'levQty' => $leaveQty, 'userCarder' => $leaveCarder, 'levDisc' => $leaveDesc, 'createBy' => $upBy);

        $this->db->insert('leaves', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function getLeaves()
    {
        $this->db->select(array('levId', 'levName', 'levQty', 'userCarder', 'levDisc'));
        $this->db->from('leaves');
        $this->db->where('leaveStatus', 1);

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function editLeaveView($lvid)
    {

        $this->db->select($this->tblv . '.levId,' . $this->tblv . '.levName, ' . $this->tbhty . '.fromDate,' . $this->tbhty . '.toDate,' . $this->tbhty . '.applyQty,' . $this->tbhty . '.disc,');
        $this->db->from($this->tbhty);
        $this->db->where('id', $lvid);
        $this->db->join($this->tblv, $this->tbhty . '.leaveType' . '=' . $this->tblv . '.levId', 'inner');

        //result set
        $query = $this->db->get();

        //get result set as object
        $result = $query->row();

        //Check Data exsist if return data object
        return ($query->num_rows() == 1) ? $result : false;


    }

    public function editLeaveSubmit($empno, $lid, $todate, $frmdate, $applyDate, $applyqty, $rmk, $status, $isread, $lvId)
    {


        $values = array('empNo' => $empno, 'leaveType' => $lid, 'toDate' => $todate, 'fromDate' => $frmdate, 'applyDate' => $applyDate, 'applyQty' => $applyqty, 'disc' => $rmk, 'status' => $status, 'isRead' => $isread);

        $this->db->where('id', $lvId);
        $this->db->update('leavehistory', $values);

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function setLeaveDelete($lvId)
    {
        $this->db->where('id', $lvId);
        $this->db->delete('leavehistory');

        return ($this->db->affected_rows() == 1) ? true : false;

    }


}