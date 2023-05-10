<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/25/2021
 * Time: 12:12 PM
 */

class print_lev_dtls_model extends CI_Model
{

    public function getPrintLvDtls($levId)
    {
//        select u.fName as aplyFname,u.lName as aplyLname,u.gender,a.fName as apdFname,a.lName as apdLname,
//        lv.levName,
//        apf.ofzName,
//        apd.deptName,
//        apdg.dName as aplyDeg, addg.dName as aprdDeg,
//        l.fromDate,l.toDate,l.applyQty,l.aprdQty,l.applyDate,l.disc,l.status,l.adminRemark,l.adminRemarkDate
//        from leavehistory l
//
//        #applied user
//        inner join user u on l.empNo=u.empNo
//        inner join office apf on u.ofzId=apf.ofzId
//        inner join department apd on apd.deptId=u.deptId
//        inner join leaves lv on l.leaveType=lv.levId
//        inner join designation apdg on u.dId=apdg.dId
//
//        #apprd user
//        inner join login lg on l.actnBy=lg.username
//        inner join user a on lg.empNo=a.empNo
//        inner join designation addg on a.dId=addg.dId
//
//        where l.id='2';

        $this->db->select('u.fName as aplyFname,u.lName as aplyLname,u.empNo as aplyEmp,u.gender,a.fName as apdFname,a.lName as apdLname,
        lv.levName,apf.ofzName,adf.ofzName as aprdOfz,apd.deptName,apdg.dName as aplyDeg, addg.dName as aprdDeg,
        l.fromDate,l.toDate,l.applyQty,l.aprdQty,l.applyDate,l.disc,l.status,l.adminRemark,l.adminRemarkDate');
        $this->db->from('leavehistory l');
        $this->db->where('l.id', $levId);

        #applied user
        $this->db->join('user u', 'l.empNo=u.empNo', 'inner');
        $this->db->join('office apf', 'u.ofzId=apf.ofzId', 'inner');
        $this->db->join('department apd', 'apd.deptId=u.deptId', 'inner');
        $this->db->join('leaves lv', 'l.leaveType=lv.levId', 'inner');
        $this->db->join('designation apdg', 'u.dId=apdg.dId', 'inner');

        #apprd user
        $this->db->join('login lg', 'l.actnBy=lg.username', 'inner');
        $this->db->join('user a', 'lg.empNo=a.empNo', 'inner');
        $this->db->join('office adf', 'a.ofzId=adf.ofzId', 'inner');
        $this->db->join('designation addg', 'a.dId=addg.dId', 'inner');

        $query = $this->db->get();

        $result = $query->row();

//        var_dump($result);

        return ($query->num_rows() == 1) ? $result : false;


    }

    public function setLvPrintStatus($lvid, $printStatus)
    {

        $this->db->set('l.rdyPrint', $printStatus);
        $this->db->where('l.id', $lvid);
        $this->db->update('leavehistory l');

        return ($this->db->affected_rows() == 1) ? true : false;
    }
}