<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 9:42 PM
 */

class create_dept_model extends CI_Model
{

    public function getAllDepts()
    {
//        select d.deptName,d.createDate,o.ofzId,o.ofzName from department d
//        inner join office o on d.ofzid=o.ofzId

        $this->db->select('d.deptName,d.createDate,d.deptId,o.ofzId,o.ofzName');
        $this->db->from('department d');
        $this->db->join('office o', 'd.ofzid=o.ofzId', 'inner');
        $this->db->order_by('d.deptId', 'DESC');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getAllOffices()
    {
        $this->db->select('ofzId,ofzName');
        $this->db->from('office');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function setDepartment($ofzId, $dept, $createBy, $deptId)
    {
        $values = array('deptId' => $deptId, 'deptName' => $dept, 'ofzid' => $ofzId, 'createBy' => $createBy);
        $this->db->insert('department', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function getDeptChck($DeptId)
    {
        $this->db->select('*');
        $this->db->from('department');
        $this->db->where('deptId', $DeptId);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;


    }

}