<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/29/2021
 * Time: 12:50 AM
 */

class leavehsty_model extends CI_Model
{

    private $tbhty = 'leavehistory';
    private $tblv = 'leaves';

    public function getLeaveHistory($empno)
    {
        //sql = select leavehistory . fromDate, leavehistory . toDate, leavehistory . applyQty,leavehistory . disc,leavehistory . applyDate,
        //leavehistory . adminRemark,leavehistory . adminRemarkDate,leavehistory . status,leaves . levName
        //from leavehistory
        //join leaves on leavehistory . leaveType = leaves . levId
        //where leavehistory . empNo = 12361;

        $this->db->select($this->tbhty . '.id,' . $this->tbhty . '.fromDate,' . $this->tbhty . '.toDate,' . $this->tbhty . '.applyQty,' . $this->tbhty . '.disc,' . $this->tbhty . '.applyDate,' . $this->tbhty . '.adminRemark,' . $this->tbhty . '.adminRemarkDate,' . $this->tbhty . '.status,' . $this->tblv . '.levName');
        $this->db->from($this->tbhty);
        $this->db->where('empNo', $empno);
        $this->db->join($this->tblv, $this->tbhty . '.leaveType' . '=' . $this->tblv . '.levId', 'inner');
        $this->db->order_by($this->tbhty . '.applyDate', 'DESC');

        //result set
        $query = $this->db->get();

        //get result set as object
        $result = $query->result_array();

        //Check Data exsist if return data object
        return ($query->num_rows() >= 1) ? $result : false;


    }

}