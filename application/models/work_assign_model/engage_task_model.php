<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/5/2021
 * Time: 10:58 PM
 */
class engage_task_model extends CI_Model
{
    public function getAssignTasks($emp)
    {
//        select w.workId,w.workName,w.priorityLevel,w.deadline,
//        u.fName,u.lName,dg.dName,dp.deptName
//        from workassign w
//        inner join login lg on w.assignBy=lg.username
//        inner join user u on lg.empNo=u.empNo
//        inner join designation dg on u.dId=dg.dId
//        inner join department dp on u.deptId=dp.deptId
//        where w.assignTo=3030

        $this->db->select('w.workId,w.workName,w.priorityLevel,w.deadline,
        u.fName,u.lName,dg.dName,dp.deptName');
        $this->db->from('workassign w');
        $this->db->where('w.assignTo', $emp);
        $this->db->where('w.stage', 0);
        $this->db->join('login lg', 'w.assignBy=lg.username', 'inner');
        $this->db->join('user u', 'lg.empNo=u.empNo', 'inner');
        $this->db->join('designation dg', 'u.dId=dg.dId', 'inner');
        $this->db->join('department dp', 'u.deptId=dp.deptId', 'inner');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function setEngageTask($workId, $startDate)
    {
        $this->db->set('stage', 1);
        $this->db->set('worStage', 1);
        $this->db->set('startDate', $startDate);
        $this->db->where('workId', $workId);
        $this->db->update('workassign');

        return ($this->db->affected_rows() == 1) ? true : false;
    }
}