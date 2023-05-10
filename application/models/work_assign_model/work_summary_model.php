<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 8:54 PM
 */

class work_summary_model extends CI_Model
{
    public function getAllTasks($username)
    {
        $this->db->select('w.workId,w.workName,w.assignDisc,w.deadline,w.priorityLevel,w.worStage');
        $this->db->from('workassign w');
        $this->db->where('w.assignBy', $username);
        $this->db->order_by('w.deadline', 'asc');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }
}