<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/28/2021
 * Time: 7:20 PM
 */

class leave_report_model extends CI_Model
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

    public function getAllUsers($ofzId, $deptId)
    {
        $this->db->select(array('empNo', 'fName','lName'));
        $this->db->from('user u');
        $this->db->where('u.ofzId', $ofzId);
        $this->db->where('u.deptId', $deptId);


        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }
    public function getAllLeaves()
    {
        $this->db->select(array('levId', 'levName'));
        $this->db->from('leaves');

        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getReportData($office,$dept,$employee,$lType,$lStatus,$fdate,$tdate)
    {
//        select u.fName,u.lName,lv.levName,l.empNo,l.fromDate,l.toDate,l.applyQty,l.status,l.disc from leavehistory l
//        inner join user u on l.empNo=u.empNo
//        inner join leaves lv on l.leaveType=lv.levId
//        inner join office o on u.ofzId=o.ofzId
//        inner join department du on u.deptId=du.deptId
//        inner join department do on o.ofzId=do.ofzid
//        where l.empNo like '%' and l.leaveType like '%' and l.status like '%' and l.applyDate between '2021-04-28' and '2021-04-28'
//        and o.ofzid like '%' and du.deptId like '%'


        $this->db->select('u.fName,u.lName,lv.levName,l.empNo,l.fromDate,l.toDate,l.applyQty,l.status,l.disc');
        $this->db->from('leavehistory l');

        $this->db->where('l.empNo like', $employee);
        $this->db->where('l.leaveType like', $lType);
        $this->db->where('l.status like', $lStatus);
//        $this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $this->db->where('l.applyDate BETWEEN "'. $fdate. '" and "'. $tdate.'"');

        $this->db->where('o.ofzid like', $office);
        $this->db->where('du.deptId like', $dept);

        $this->db->join('user u', 'l.empNo=u.empNo', 'inner');
        $this->db->join('leaves lv', 'l.leaveType=lv.levId', 'inner');
        $this->db->join('office o', 'u.ofzId=o.ofzId', 'inner');
        $this->db->join('department du', 'u.deptId=du.deptId', 'inner');
//        $this->db->join('department do', 'o.ofzId=do.ofzid', 'inner');


        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }
}