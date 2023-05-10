<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/28/2021
 * Time: 8:48 PM
 */

class apply_leave_model extends CI_Model
{

    public function getLeaves($emp)
    {
//        select lb.qty,lv.levName,lv.levId from leavebalance lb
//        inner join leaves lv on lb.levId = lv.levId
//        where lb.empNo=2520

        $this->db->select('lb.qty,lv.levName,lv.levId');
        $this->db->from('leavebalance lb');
        $this->db->where('lb.empNo', $emp);
        $this->db->join('leaves lv','lb.levId = lv.levId','inner');

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function setLeaves($empno, $lid, $frmdate, $todate, $applyDate, $applyqty, $rmk, $status, $isread)
    {
        $values = array('empNo' => $empno, 'leaveType' => $lid, 'toDate' => $todate, 'fromDate' => $frmdate, 'applyDate' => $applyDate, 'applyQty' => $applyqty, 'disc' => $rmk, 'status' => $status, 'isRead' => $isread);
        $this->db->insert('leavehistory', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

}