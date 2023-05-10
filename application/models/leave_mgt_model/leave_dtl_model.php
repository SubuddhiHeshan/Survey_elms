<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/18/2021
 * Time: 6:51 PM
 */

class leave_dtl_model extends CI_Model
{

    private $tbu = 'user';
    private $tlv = 'leaves';
    private $tlvh = 'leavehistory';


    public function getLvDtl($lvid)
    {

//        echo $lvid;
//        select user.fName, user.lName, leavehistory.empNo, user.gender, user.email, user.tele, leaves.levName, leavehistory.fromDate,
//        leavehistory.toDate, leavehistory.applyDate, leavehistory.applyQty, leavehistory.disc, leavehistory.status,leavehistory.adminRemark,
//        leavehistory.adminRemarkDate
//        from leavehistory
//        join user on leavehistory.empNo = user.empNo
//        join leaves on leavehistory.leaveType = leaves.levId
//        where leavehistory.id = 3


        $this->db->select($this->tbu . '.fName,' . $this->tbu . '.lName,' . $this->tbu . '.gender,' . $this->tbu . '.email,' . $this->tbu . '.lName,' . $this->tbu . '.tele,' . $this->tlvh . '.empNo,' . $this->tlvh . '.leaveType,' . $this->tlv . '.levName,' . $this->tlvh . '.fromDate,' . $this->tlvh . '.toDate,' . $this->tlvh . '.applyDate,' . $this->tlvh . '.applyQty,' . $this->tlvh . '.disc,' . $this->tlvh . '.adminRemark,' . $this->tlvh . '.adminRemarkDate,' . $this->tlvh . '.status,' . $this->tlvh . '.empNo');
        $this->db->from($this->tlvh);
        $this->db->where('id', $lvid);
        $this->db->join($this->tbu, $this->tbu . '.empNo' . '=' . $this->tlvh . '.empNo');
        $this->db->join($this->tlv, $this->tlvh . '.leaveType' . '=' . $this->tlv . '.levId');

        //result set
        $query = $this->db->get();

        //get result set as object
        $result = $query->row();

        //Check Data exsist if return data object
        return ($query->num_rows() == 1) ? $result : false;


    }

    public function setappdLeave($lid, $actTknBy, $actType, $apdQty, $rmk, $aprdDate)
    {
        $values = array('aprdQty' => $apdQty, 'actnBy' => $actTknBy, 'adminRemark' => $rmk, 'adminRemarkDate' => $aprdDate,
            'status' => $actType);

        $this->db->where('id', $lid);

        $this->db->update('leavehistory', $values);

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function setLevaveBalance($lvType, $emp, $apdQty, $lvYear)
    {
//        $values = array('qty' =>$apdQty, 'year' => $lvYear);

        $this->db->set('qty', 'qty-' . $apdQty, false);
        $this->db->set('year', $lvYear);
        $this->db->where('empNo', $emp);
        $this->db->where('levId', $lvType);

        $this->db->update('leavebalance');

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function setLvRead($lvid, $isRead)
    {

        $this->db->set('l.isRead', $isRead);
        $this->db->where('l.id', $lvid);
        $this->db->update('leavehistory l');

        return ($this->db->affected_rows() == 1) ? true : false;
    }

    public function setPrintStatus($lid, $printStatus)
    {

        $this->db->set('l.rdyPrint', $printStatus);
        $this->db->where('l.id', $lid);
        $this->db->update('leavehistory l');

        return ($this->db->affected_rows() == 1) ? true : false;

    }


}