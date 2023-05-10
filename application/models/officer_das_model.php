<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/2/2021
 * Time: 12:08 PM
 */

class officer_das_model extends CI_Model
{
    private $tbu = 'user';
    private $tlv = 'leaves';
    private $tlvh = 'leavehistory';


    public function getBrAprdCount($ofzId, $deptId)
    {
//        select sum(l.aprdQty) as brApdCount from leavehistory l
//        inner join user u on l.empNo = u.empNo
//        where u.deptId = 1 and u.ofzId=1009 and l.status = 1

        $this->db->select('sum(l.aprdQty) as brApdCount');
        $this->db->from('leavehistory l');
        $this->db->where('u.deptId', $deptId);
        $this->db->where('u.ofzId', $ofzId);
        $this->db->where('l.status', 1);
        $this->db->join('user u', 'l.empNo=u.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getBrNtAprdCount($ofzId, $deptId)
    {
//        select sum(l.applyQty) as brApdCount from leavehistory l
//        inner join user u on l.empNo = u.empNo
//        where u.deptId = 1 and u.ofzId=1009 and l.status = 2

        $this->db->select('sum(l.applyQty) as brNApdCount');
        $this->db->from('leavehistory l');
        $this->db->where('u.deptId', $deptId);
        $this->db->where('u.ofzId', $ofzId);
        $this->db->where('l.status', 2);
        $this->db->join('user u', 'l.empNo=u.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getBrPendingCount($ofzId, $deptId)
    {
//        select sum(l.aprdQty) as brApdCount from leavehistory l
//        inner join user u on l.empNo = u.empNo
//        where u.deptId = 1 and u.ofzId=1009 and l.status = 0

        $this->db->select('sum(l.applyQty) as brPendCount');
        $this->db->from('leavehistory l');
        $this->db->where('u.deptId', $deptId);
        $this->db->where('u.ofzId', $ofzId);
        $this->db->where('l.status', 0);
        $this->db->join('user u', 'l.empNo=u.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getTotRegEmpUsr($ofzId, $deptId)
    {
//        select count(u.empNo) as regEmpCount from user u
//        inner join login lg on u.empNo = lg.empNo
//        where lg.userRole = 3 and u.deptId= 1 and u.ofzId = 1009

        $this->db->select('count(u.empNo) as regEmpCount');
        $this->db->from('user u');
        $this->db->where('u.deptId', $deptId);
        $this->db->where('u.ofzId', $ofzId);
        $this->db->where('lg.userRole', 3);
        $this->db->join('login lg', 'u.empNo = lg.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getBranchLVSummary($ofzId, $deptId)
    {
        $this->db->select($this->tlvh . '.id,' . $this->tbu . '.fName,' . $this->tbu . '.lName,' . $this->tlv . '.levName,' . $this->tlvh . '.applyDate,' . $this->tlvh . '.status,' . $this->tlvh . '.empNo');
        $this->db->from($this->tbu);
        $this->db->where('deptId', $deptId);
        $this->db->where('ofzId', $ofzId);
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
}