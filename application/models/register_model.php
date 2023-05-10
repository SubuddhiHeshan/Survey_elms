<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/28/2021
 * Time: 12:05 AM
 */
class register_model extends CI_Model
{

    private $ofz = 'office';
    private $deg = 'designation';
    private $dept = 'department';
    private $role = 'userrole';
    private $lve = 'leaves';


    public function getDesignations()
    {
        $this->db->select(array('dId', 'dName'));
        $this->db->from($this->deg);

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }


    public function getOfz()
    {
        $this->db->select(array('ofzId', 'ofzName'));
        $this->db->from($this->ofz);

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getDept()
    {
        $this->db->select(array('deptId', 'deptName'));
        $this->db->from($this->dept);

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getLeaves()
{
    $this->db->select(array('levId', 'levName', 'levQty'));
    $this->db->from($this->lve);

    $query = $this->db->get();
    $result = $query->result_array();
    return ($query->num_rows() >= 1) ? $result : false;

}

    public function checkUserExsist($empno)
    {
        $this->db->select('u.fName');
        $this->db->from('user u');
        $this->db->where('u.empNo',$empno);

        $query = $this->db->get();

        return($query->num_rows() == 1)? true : false;
    }

    public function createUser($fname, $mname, $lname, $gen, $empno, $desig, $email, $tele, $add1, $add2, $ucarder, $ofz, $dept, $crBy, $curDate)
    {
        $values = array('empNo' => $empno, 'fName' => $fname, 'mName' => $mname, 'lName' => $lname, 'gender' => $gen, 'address1' => $add1, 'address2' => $add2, 'dId' => $desig, 'ofzId' => $ofz, 'deptId' => $dept, 'createBy' => $crBy, 'tele' => $tele, 'email' => $email, 'userCarder' => $ucarder, 'createDate' => $curDate);
        $this->db->insert('user', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function assignLeaves($empno, $slev, $eligible)
    {
        $this->db->insert('leavebalance', array('levId' => $slev, 'empNo' => $empno, 'qty' => $eligible));

        return ($this->db->affected_rows() == 1) ? true : false;


    }
}