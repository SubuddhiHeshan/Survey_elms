<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 4:01 PM
 */

class task_details_model extends CI_Model
{
    public function getTaskDetails($TaskId)
    {
//        select w.workName,w.stage,w.deadline,w.startDate,w.doneDate,w.workRemark,w.assignDate,w.assignDisc,w.priorityLevel,w.worStage,
//        uab.fName as asgnByFname,uab.lName as asgByLname,
//        uat.fName as asgToFname, uat.lName as asgToLname
//        from workassign w
//        inner join login lg on w.assignBy=lg.username
//        inner join user uab on lg.empNo=uab.empNo
//        inner join user uat on w.assignTo=uat.empNo
//        where w.workId=4

        $this->db->select('w.workName,w.stage,w.deadline,w.startDate,w.doneDate,w.workRemark,w.assignDate,w.assignDisc,w.priorityLevel,w.worStage,
        uab.fName as asgnByFname,uab.lName as asgByLname,uat.fName as asgToFname, uat.lName as asgToLname');
        $this->db->from('workassign w');
        $this->db->where('w.workId', $TaskId);

        $this->db->join('login lg', 'w.assignBy=lg.username', 'inner');
        $this->db->join('user uab', 'lg.empNo=uab.empNo', 'inner');
        $this->db->join('user uat', 'w.assignTo=uat.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function setTaskProgress($prgStatus, $rmk, $TaskId)
    {
        $EndDate = date("Y-m-d h:i:s", time());

        if ($prgStatus == 5) {
            $values = array('doneDate' => $EndDate, 'workRemark' => $rmk, 'worStage' => $prgStatus);

        } else {
            $values = array('workRemark' => $rmk, 'worStage' => $prgStatus);

        }

        $this->db->where('workId', $TaskId);

        $this->db->update('workassign', $values);

        return ($this->db->affected_rows() == 1) ? true : false;


    }
}