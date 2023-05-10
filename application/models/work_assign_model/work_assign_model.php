<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/4/2021
 * Time: 10:11 PM
 */

class work_assign_model extends CI_Model
{


    public function getTaskUsers($lguOfz, $lgusrDept)
    {
//        select u.empNo,u.fName,u.lName from user u
//        where u.ofzId=1009 and u.deptId=2
        $this->db->select('u.empNo,u.fName,u.lName');
        $this->db->from('user u');
        $this->db->where('u.ofzId', $lguOfz);
        $this->db->where('u.deptId', $lgusrDept);

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function setCreateTask($tname, $assignTo, $Prio, $Dead, $rmk, $assignBy, $stage, $assignDate)
    {
        $values = array('workName' => $tname, 'assignBy' => $assignBy, 'assignTo' => $assignTo, 'stage' => $stage, 'deadline' => $Dead, 'assignDisc' => $rmk, 'assignDate' => $assignDate, 'priorityLevel' => $Prio);
        $this->db->insert('workassign', $values);

        return ($this->db->affected_rows() == 1) ? true : false;
    }
}

