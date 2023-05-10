<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 8:12 PM
 */
class create_office_model extends CI_Model
{
    public function getAllOffices()
    {
        $this->db->select('o.ofzId, o.ofzName, o.address1, o.address2,o.createDate');
        $this->db->from('office o');
        $this->db->order_by('o.createDate','DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getOfzChck($oId)
    {
        $this->db->select('*');
        $this->db->from('office');
        $this->db->where('ofzId', $oId);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;
    }

    public function setOffice($OId, $OName, $add1, $add2, $CreateBy)
    {
        $values = array('ofzId' => $OId, 'ofzName' => $OName, 'address1' => $add1, 'address2' => $add2, 'createby' => $CreateBy);
        $this->db->insert('office', $values);

        return ($this->db->affected_rows() == 1) ? true : false;


    }

}