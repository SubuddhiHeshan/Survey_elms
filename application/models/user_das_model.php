<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/2/2021
 * Time: 1:00 AM
 */
class user_das_model extends CI_Model
{

    private $tbu = 'user';
    private $tlv = 'leaves';
    private $tlvh = 'leavehistory';

    public function getCasulLvCount($emp)
    {
//        select sum(l.aprdQty) as apdCount, sum(l.applyQty) as aplyCount  from leavehistory l
//        where l.empNo=12361 and l.leaveType = 1

        $this->db->select('sum(l.aprdQty) as apdCount, sum(l.applyQty) as aplyCount');
        $this->db->from('leavehistory l');
        $this->db->where('l.empNo', $emp);
        $this->db->where('l.leaveType', 1);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getRestLvCount($emp)
    {
//        select sum(l.aprdQty) as apdCount, sum(l.applyQty) as aplyCount  from leavehistory l
//        where l.empNo=12361 and l.leaveType = 2

        $this->db->select('sum(l.aprdQty) as apdCount, sum(l.applyQty) as aplyCount');
        $this->db->from('leavehistory l');
        $this->db->where('l.empNo', $emp);
        $this->db->where('l.leaveType', 2);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getLastRestLvCount($emp)
    {
//        select sum(l.aprdQty) as apdCount, sum(l.applyQty) as aplyCount  from leavehistory l
//        where l.empNo=12361 and l.leaveType = 3

        $this->db->select('sum(l.aprdQty) as apdCount, sum(l.applyQty) as aplyCount');
        $this->db->from('leavehistory l');
        $this->db->where('l.empNo', $emp);
        $this->db->where('l.leaveType', 3);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getTotAssignTasks($emp)
    {
//        select count(*) as totTskCnt
//        from workassign w
//        where w.assignTo= 2520

        $this->db->select('count(*) as totTskCnt');
        $this->db->from('workassign');
        $this->db->where('assignTo', $emp);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;
    }

    public function getTotDoneTasks($emp)
    {
//        select count(*) as totDoneCnt
//        from workassign w
//        where w.assignTo= 2520 and w.worStage = 5

        $this->db->select('count(*) as totDoneCnt');
        $this->db->from('workassign');
        $this->db->where('assignTo', $emp);
        $this->db->where('worStage', 5);

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;

    }

    public function getLeavesSummary($emp)
    {
        {
            $this->db->select($this->tlvh . '.id,' . $this->tbu . '.fName,' . $this->tbu . '.lName,' . $this->tlv . '.levName,' . $this->tlvh . '.applyDate,' . $this->tlvh . '.status,' . $this->tlvh . '.empNo');
            $this->db->from($this->tlvh);
            $this->db->where($this->tlvh . '.empNo', $emp);
            $this->db->join($this->tbu, $this->tlvh . '.empNo' . '=' . $this->tbu . '.empNo');
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
}