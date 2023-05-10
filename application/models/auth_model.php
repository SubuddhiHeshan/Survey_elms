<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class auth_model extends CI_Model
{

    private $tblog = 'login';
    private $tbusr = 'user';

    public function getLoginData($username, $password)
    {
        //String to encrypted password
        $ect_pwd = md5($password);


        //sql=select login . empNo,login . lockStatus,login . username, login . userRole, user . deptId,user . fName,user . ofzId,user . userCarder,user . userStatus
        //from login
        //join user on login . empNo = user . empNo
        //where login . username = '' and login . password ='';

        //Join query
        $this->db->select($this->tblog . '.empNo,' . $this->tblog . '.username,' . $this->tblog . '.lockStatus,' . $this->tblog . '.userRole,' . $this->tbusr . '.fName,' . $this->tbusr . '.ofzId,' . $this->tbusr . '.deptId,' . $this->tbusr . '.dId,' . $this->tbusr . '.userStatus,' . $this->tbusr . '.userCarder');
        $this->db->from($this->tblog);
        $this->db->where(array('username' => $username, 'password' => $ect_pwd));
        $this->db->join($this->tbusr, $this->tblog . '.empNo' . '=' . $this->tbusr . '.empNo', 'inner');

        //result set
        $query = $this->db->get();

        //get result set as object
        $result = $query->row();

        //Check Data exsist if return data object
        return ($query->num_rows() == 1) ? $result : false;
    }

    public function setFailCount($username)
    {
        $this->db->set('logFailAttemps', 'logFailAttemps+' . 1, false);
        $this->db->where('username', $username);
        $this->db->update('login');

        return ($this->db->affected_rows() == 1) ? true : false;

    }

    public function getFailCount($username)
    {
        $this->db->select('logFailAttemps');
        $this->db->where('username', $username);
        $this->db->from('login');

        $query = $this->db->get();

        $result = $query->row();
        return ($query->num_rows() == 1) ? $result : false;
    }

    public function setLock($username)
    {
        $this->db->set('lockStatus',0, false);
        $this->db->where('username', $username);
        $this->db->update('login');

        return ($this->db->affected_rows() == 1) ? true : false;

    }


}

?>