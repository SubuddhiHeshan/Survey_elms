<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/17/2020
 * Time: 10:19 PM
 */

class profile_model extends CI_Model
{
    private $ofz = 'office';
    private $deg = 'designation';
    private $dept = 'department';
    private $usr = 'user';
    private $log = 'login';
    private $role = 'userrole';

    public function getLogUserData($empNo)
    {
        //sql = select *,office.ofzName,designation.dName,department.deptName,userrole.roleType from  user
        //join office on user.ofzId = office.ofzId
        //join designation on user.dId = designation.dId
        //join department on user.deptId = department.deptId
        //where user.empNo = '';

        $this->db->select($this->usr . '.fName,' . $this->usr . '.mName,' . $this->usr . '.lName,' . $this->usr . '.address1,' . $this->usr . '.address2,' . $this->usr . '.createDate,'
            . $this->usr . '.userStatus,' . $this->usr . '.tele,' . $this->usr . '.email,' . $this->usr . '.userCarder,' . $this->ofz . '.ofzName,' . $this->dept . '.deptName,'
            . $this->deg . '.dName');
        $this->db->from($this->usr);
        $this->db->where('empNo', $empNo);
        $this->db->join($this->ofz, $this->usr . '.ofzId' . '=' . $this->ofz . '.ofzID', 'inner');
        $this->db->join($this->dept, $this->usr . '.deptId' . '=' . $this->dept . '.deptId', 'inner');
        $this->db->join($this->deg, $this->usr . '.dId' . '=' . $this->deg . '.dId', 'inner');

        $query = $this->db->get();

        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function getUserLoginData($empNo)
    {
//        sql = select username,lockStatus , userrole.roleType
////from login
////join userrole on login.userRole = userRole.roleId
////where login.empNo = '';

        $this->db->select($this->log . '.username,' . $this->log . '.lockStatus,' . $this->role . '.roleType');
        $this->db->from($this->log);
        $this->db->where('empNo', $empNo);
        $this->db->join($this->role, $this->log . '.userRole' . '=' . $this->role . '.roleId', 'inner');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getLogRole($role)
    {
        $this->db->select('roleType');
        $this->db->from($this->role);
        $this->db->where('roleId', $role);

        $query = $this->db->get();
        $result = $query->row();

        return ($query->num_rows() == 1) ? $result : false;
    }

    public function getDesignations()
    {
        $this->db->select(array('dId', 'dName'));
        $this->db->from('designation');

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getUserRoles()
    {
        $this->db->select(array('roleId', 'roleType'));
        $this->db->from('userrole');

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getOffice()
    {
        $this->db->select(array('ofzId', 'ofzName'));
        $this->db->from($this->ofz);

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getDepartments()
    {
        $this->db->select(array('deptId', 'deptName'));
        $this->db->from($this->dept);

        $query = $this->db->get();
        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function updateEmployee1($curEmpNo, $fname, $mname, $lname, $empno, $desg, $email, $tele, $add1, $add2, $ucarder, $office, $dept, $curDate, $CurUsername)
    {

        $values1 = array('fName' => $fname, 'mName' => $mname, 'empNo' => $empno, 'lName' => $lname, 'dId' => $desg, 'email' => $email, 'tele' => $tele, 'address1' => $add1,
            'address2' => $add2, 'userCarder' => $ucarder, 'ofzId' => $office, 'deptId' => $dept, 'updateBy'=>$CurUsername, 'updateDate'=> $curDate );

        $this->db->where('empNo', $curEmpNo);
        $this->db->update('user', $values1);

        return ($this->db->affected_rows() == 1 ) ? true : false;


    }

    public function updateEmployee2($curEmpNo, $CurUsername, $role, $Updusername, $curDate)
    {

        $values2 = array('userRole' => $role, 'username' => $Updusername, 'updateBy'=> $CurUsername, 'updateDate'=> $curDate);

        $this->db->where(array('empNo' => $curEmpNo, 'username' => $CurUsername));
        $this->db->update('login', $values2);

        return ($this->db->affected_rows() == 1) ? true : false;

    }
}