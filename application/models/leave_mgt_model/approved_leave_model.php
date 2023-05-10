<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/22/2021
 * Time: 9:23 PM
 */

class approved_leave_model extends CI_Model
{
    private $tbu = 'user';
    private $tlv = 'leaves';
    private $tlvh = 'leavehistory';

    public function getApprovedLeaves($dept,$ofz)
    {
//select user.fName, user.lName, leaves.levName, leavehistory.applyDate, leavehistory.status, leavehistory.empNo
//from user
//join leavehistory on user.empNo = leavehistory.empNo
//join leaves on leavehistory.leaveType = leaves.levId
//where user.deptId = 2 and leavehistory.status = 1;


        $this->db->select($this->tlvh.'.id,' .$this->tbu . '.fName,' . $this->tbu . '.lName,' . $this->tlv . '.levName,' . $this->tlvh . '.applyDate,' . $this->tlvh . '.status,' . $this->tlvh . '.empNo');
        $this->db->from($this->tbu);
        $this->db->where('ofzId', $ofz);
        $this->db->where('deptId', $dept);
        $this->db->where('status', 1);
        $this->db->join($this->tlvh, $this->tbu . '.empNo' . '=' . $this->tlvh . '.empNo');
        $this->db->join($this->tlv, $this->tlvh . '.leaveType' . '=' . $this->tlv . '.levId');

        //result set
        $query = $this->db->get();

        //get result set as object array
        $result = $query->result_array();

        //Check Data exsist if return data object
        return ($query->num_rows() >= 1) ? $result : false;


    }

}