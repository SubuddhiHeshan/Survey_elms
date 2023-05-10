<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 4:44 PM
 */
class user_management_model extends CI_Model
{

    public function getAllUsers($lgusrDept, $lgusrOfz)
    {
//        select u.fName,u.lName,u.empNo,u.userStatus,u.createDate,r.roleType,lg.lockStatus,lg.username from user u
//        inner join login lg on u.empNo=lg.empNo
//        inner join userrole r on lg.userRole=r.roleId
//        where u.ofzId=1009 and u.deptId=2

        $this->db->select('u.fName,u.lName,u.empNo,u.userStatus,u.createDate,r.roleType,lg.lockStatus,lg.username');
        $this->db->from('user u');
        $this->db->where('u.ofzId', $lgusrOfz);
        $this->db->where('u.deptId', $lgusrDept);
        $this->db->join('login lg', 'u.empNo=lg.empNo', 'inner');
        $this->db->join('userrole r', 'lg.userRole=r.roleId', 'inner');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }

    public function setUserStatus($emp, $upStatus)
    {
        $this->db->set('userStatus', $upStatus);
        $this->db->where('empNo', $emp);
        $this->db->update('user');

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setLockStatus($username, $upStatus)
    {
        $this->db->set('lockStatus', $upStatus);
        $this->db->set('logFailAttemps', 0);
        $this->db->where('username', $username);
        $this->db->update('login');

        return ($this->db->affected_rows() == 1) ? true : false;


    }

}