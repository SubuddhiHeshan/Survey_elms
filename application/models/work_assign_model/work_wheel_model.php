<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 12:40 PM
 */

class work_wheel_model extends CI_Model
{
    public function getEngageTasks($emp)
    {

//        select w.workId,w.workName,w.assignDisc,w.deadline,w.stage,w.priorityLevel,
//        w.worStage
//        from workassign w
//        where w.assignTo=2520 and w.stage = 1
//        order by w.deadline asc

        $this->db->select('w.workId,w.workName,w.assignDisc,w.deadline,w.priorityLevel,w.worStage');
        $this->db->from('workassign w');
        $this->db->where('w.assignTo', $emp);
        $this->db->where('w.stage', 1);
        $this->db->order_by('w.deadline', 'asc');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }
}