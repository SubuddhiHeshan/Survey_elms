<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/24/2021
 * Time: 3:34 PM
 */
class print_leave_model extends CI_Model
{
    private $tbhty = 'leavehistory';
    private $tblv = 'leaves';

    public function getPrintLeaveDtl($empNo)
    {
//        select leavehistory.id, leavehistory.fromDate, leavehistory.toDate, leavehistory.applyQty, leavehistory.aprdQty, leavehistory.adminRemarkDate,
//        leaves.levName
//        from leavehistory
//        join leaves on leavehistory.leaveType = leaves.levId
//        where leavehistory.empNo = 12361 and leavehistory.status = 1;

        $this->db->select($this->tbhty . '.id,'. $this->tbhty . '.fromDate,' . $this->tbhty . '.toDate,' . $this->tbhty . '.applyQty,' . $this->tbhty . '.aprdQty,' . $this->tbhty . '.adminRemarkDate,'  . $this->tblv . '.levName');
        $this->db->from($this->tbhty);
        $this->db->where('empNo', $empNo);
        $this->db->where('status', 1);
        $this->db->join($this->tblv, $this->tbhty . '.leaveType' . '=' . $this->tblv . '.levId', 'inner');

        //result set
        $query = $this->db->get();

        //get result set as object
        $result = $query->result_array();

        //Check Data exsist if return data object
        return ($query->num_rows() >= 1) ? $result : false;

    }

}
