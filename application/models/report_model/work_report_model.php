<?php

/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 10:57 AM
 */
class work_report_model extends CI_Model
{
    public function getAllOffice()
    {
        $this->db->select(array('ofzId', 'ofzName'));
        $this->db->from('office');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getAllDepartments()
    {
        $this->db->select(array('deptId', 'deptName'));
        $this->db->from('department');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;
    }

    public function getAssignByUsers($ofzId, $deptId)
    {
//        select u.empNo,u.fName,u.lName from user u
//        inner join login lg on u.empNo=lg.empNo
//        where u.ofzId = 1009 and u.deptId=2 and lg.userRole=1

        $this->db->select('u.empNo,u.fName,u.lName,lg.username');
        $this->db->from('user u');
        $this->db->where('u.ofzId', $ofzId);
        $this->db->where('u.deptId', $deptId);
        $this->db->where('lg.userRole', 1);
        $this->db->join('login lg', 'u.empNo=lg.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getAssignToUsers($ofzId, $deptId)
    {

        $this->db->select('u.empNo,u.fName,u.lName');
        $this->db->from('user u');
        $this->db->where('u.ofzId', $ofzId);
        $this->db->where('u.deptId', $deptId);
        $this->db->where('lg.userRole', 3);
        $this->db->join('login lg', 'u.empNo=lg.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getReportData($office, $dept, $asgnBy, $asTo, $tStatus, $priority, $prog, $fdate, $tdate)
    {
//        select w.workName,w.stage,w.priorityLevel,w.worStage,w.assignDate,w.doneDate,w.workRemark,
//        ut.fName as Tfname,ut.lName as Tlname,
//        ub.fName as Bfname, ub.lName as Blname
//        from workassign w
//        #Accept user details
//        inner join user ut on w.assignTo=ut.empNo
//        #Assig user
//        inner join login lg on w.assignBy=lg.username
//        inner join user ub on lg.empNo=ub.empNo
//        inner join office o on ub.ofzId=o.ofzId
//        inner join department dt on o.ofzId=dt.ofzid
//        where w.assignBy like '%' and w.assignTo like '%' and w.stage like '%' and w.priorityLevel like '%'
//        and w.worStage like '%' and w.assignDate between '2021-05-01' and '2021-05-08'
//        and o.ofzid like '%' and dt.deptId like '%';

        $this->db->select('w.workName,w.stage,w.priorityLevel,w.worStage,w.assignDate,w.doneDate,w.workRemark,ut.fName as Tfname,ut.lName as Tlname,ub.fName as Bfname, ub.lName as Blname');
        $this->db->from('workassign w');

        $this->db->where('w.assignBy like', $asgnBy);
        $this->db->where('w.assignTo like', $asTo);
        $this->db->where('w.stage like', $tStatus);
        $this->db->where('w.priorityLevel like', $priority);
        $this->db->where('w.worStage like', $prog);

//        $this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $this->db->where('w.assignDate BETWEEN "' . $fdate . '" and "' . $tdate . '"');

        $this->db->where('o.ofzid like', $office);
        $this->db->where('du.deptId like', $dept);

        $this->db->join('user ut', 'w.assignTo=ut.empNo', 'inner');
        $this->db->join('login lg', 'w.assignBy=lg.username', 'inner');
        $this->db->join('user ub', 'lg.empNo=ub.empNo', 'inner');
        $this->db->join('office o', 'ub.ofzId=o.ofzId', 'inner');
        $this->db->join('department du', 'ub.deptId=du.deptId', 'inner');
//        $this->db->join('department do', 'o.ofzId=do.ofzid', 'inner');


        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }
}