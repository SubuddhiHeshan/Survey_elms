<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/26/2021
 * Time: 11:52 AM
 */

class header_model extends CI_Model
{

    public function getUnredLvCount($lgusrDept)
    {
        $this->db->select('*');
        $this->db->from('leavehistory l');
        $this->db->where('l.isRead', 0);
        $this->db->where('u.deptId',$lgusrDept);
        $this->db->join('user u ', 'l.empNo = u.empNo', 'inner');

        $query = $this->db->get();

        $result = $query->num_rows();

        return ($query->num_rows() >=1)?$result : false;

    }
    public function getUnredLvs($lgusrDept)
    {

//    select u.fName,u.lName, l.applyDate from leavehistory l
//    inner join user u on l.empNo = u.empNo
//    where l.isRead = 0;

        $this->db->select('u.fName,u.lName, l.applyDate, l.empNo, l.id');
        $this->db->from('leavehistory l');
        $this->db->where('l.isRead', 0);
        $this->db->where('u.deptId',$lgusrDept);
        $this->db->join('user u ', 'l.empNo = u.empNo', 'inner');
        $this->db->order_by('l.id' ,'DESC');
        $this->db->limit('3');

        //result set
        $query = $this->db->get();

        $result = $query->result_array();
        return ($query->num_rows() >= 1) ? $result : false;

    }

    public function getPrntLvCount($emp)
    {
        $this->db->select('*');
        $this->db->from('leavehistory l');
        $this->db->where('l.rdyPrint', 0);
        $this->db->where('l.empNo',$emp);

        $query = $this->db->get();

        $result = $query->num_rows();

        return ($query->num_rows() >=1)?$result : false;

    }

    public function getPendingPrintLvs($emp)
    {
//        select u.fName,u.lName,u.empNo,l.adminRemarkDate,l.id from leavehistory l
//        inner join login lg on lg.username = l.actnBy
//        inner join user u on lg.empNo = u.empNo
//        where l.rdyPrint=0 and l.empNo = 12361
//        order by l.id desc limit 3

        $this->db->select('u.fName,u.lName,u.empNo,l.adminRemarkDate,l.id');
        $this->db->from('leavehistory l');
        $this->db->join('login lg','lg.username = l.actnBy','inner');
        $this->db->join('user u','lg.empNo = u.empNo','inner');
        $this->db->where('l.rdyPrint', 0);
        $this->db->where('l.empNo',$emp);
        $this->db->order_by('l.adminRemarkDate' ,'DESC');
        $this->db->limit('3');

        //result set
        $query = $this->db->get();

        $result = $query->result_array();

        return ($query->num_rows() >= 1) ? $result : false;


    }
}