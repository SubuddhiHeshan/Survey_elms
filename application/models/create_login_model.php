<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/2/2021
 * Time: 8:57 PM
 */

class create_login_model extends CI_Model
{


    public function getUserRoles()
    {
        $this->db->select(array('roleId', 'roleType'));
        $this->db->from('userrole');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getLgCrEmpData($EmpNo)
    {
//        select u.fName,u.lName,o.ofzName,d.deptName,dg.dName from user u
//        inner join office o on u.ofzId=o.ofzId
//        inner join department d on u.deptId=d.deptId
//        inner join designation dg on u.dId=dg.dId
//        where u.empNo=12361

        $this->db->select('u.fName,u.lName,o.ofzName,d.deptName,dg.dName');
        $this->db->from('user u');
        $this->db->where('u.empNo', $EmpNo);
        $this->db->join('office o', 'u.ofzId=o.ofzId', 'inner');
        $this->db->join('department d', 'u.deptId=d.deptId', 'inner');
        $this->db->join('designation dg', 'u.dId=dg.dId', 'inner');
        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getUsernameCheck($uname)
    {
        $this->db->select('username');
        $this->db->from('login');
        $this->db->where('username', $uname);

        $query = $this->db->get();

        return ($query->num_rows() == 1) ? true : false;
    }


    public function createLogin($empno, $username, $encPwd, $urole, $createBy, $createDate)
    {
        $this->db->insert('login', array('empNo' => $empno, 'username' => $username, 'password' => $encPwd, 'userRole' => $urole,
            'updateBy' => $createBy, 'updateDate' => $createDate));

        return ($this->db->affected_rows() == 1) ? true : false;

    }


}