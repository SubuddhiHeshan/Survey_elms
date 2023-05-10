<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 11:54 PM
 */
class create_desg_model extends CI_Model
{
    public function getAllDesignations()
    {
        $this->db->select('dName,createDate');
        $this->db->from('designation');
        $this->db->order_by('createDate', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function setDesig($DName,$CreateBy)
    {
        $values = array('dName' => $DName, 'createBy' => $CreateBy);
        $this->db->insert('designation', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }
}