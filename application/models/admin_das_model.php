<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/1/2021
 * Time: 8:16 PM
 */
class admin_das_model extends CI_Model
{
    private $tbu = 'user';
    private $tlv = 'leaves';
    private $tlvh = 'leavehistory';

    public function getDashLeaveData($lgusrDept)
    {
        $this->db->select($this->tlvh . '.id,' . $this->tbu . '.fName,' . $this->tbu . '.lName,' . $this->tlv . '.levName,' . $this->tlvh . '.applyDate,' . $this->tlvh . '.status,' . $this->tlvh . '.empNo');
        $this->db->from($this->tbu);
        $this->db->where('deptId', $lgusrDept);
        $this->db->join($this->tlvh, $this->tbu . '.empNo' . '=' . $this->tlvh . '.empNo');
        $this->db->join($this->tlv, $this->tlvh . '.leaveType' . '=' . $this->tlv . '.levId');
        $this->db->order_by($this->tlvh . '.id', 'DESC');
        $this->db->limit('5');

        //result set
        $query = $this->db->get();

        //get result set as object array
        $result = $query->result_array();

        //Check Data exsist if return data object
        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getAprdCount($username)
    {
//        select sum(l.aprdQty) as aprdCount from leavehistory l
//        where l.actnBy = 'test' and l.status = 1

        $this->db->select('SUM(l.aprdQty) as aprdCount');
        $this->db->from('leavehistory l');
        $this->db->where('l.actnBy', $username);
        $this->db->where('l.status', 1);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getNotAprdCount($username)
    {
//        select sum(l.applyQty) as notaprdCount from leavehistory l
//        where l.actnBy = 'test' and l.status = 2

        $this->db->select('sum(l.applyQty) as notaprdCount');
        $this->db->from('leavehistory l');
        $this->db->where('l.actnBy', $username);
        $this->db->where('l.status', 2);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getPendingCount($lgusrDept)
    {
//        select sum(l.applyQty) as wAprvl from leavehistory l
//        inner join user u on l.empNo = u.empNo
//        where u.deptId=2 and l.status = 0

        $this->db->select('sum(l.applyQty) as wAprvl');
        $this->db->from('leavehistory l');
        $this->db->where('u.deptId', $lgusrDept);
        $this->db->where('l.status', 0);
        $this->db->join('user u', 'l.empNo=u.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getAssignTaskCount($user)
    {
//        select count(*) as tskCount from workassign w
//        where w.assignBy = 'test'

        $this->db->select('count(*) as tskCount');
        $this->db->from('workassign w');
        $this->db->where('w.assignBy', $user);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

}