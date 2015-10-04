<?php

class admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($data) {
        $data['status'] = 'Active';

        $result = $this->db->get_where('system_user', $data);
        if ($result->num_rows()) {
//            $r = $this->db->update('system_user', array('login_in' => 'On'), $data);
            return $result;
        }
    }

    public function checkmail($email) {
        $rs = $this->db->get_where('system_user', array('username' => $email));
        if ($rs->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkmail_prof($email) {
        $rs = $this->db->get_where('register', array('txt_Email' => $email));
        if ($rs->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function lost_pass($email) {
        $rs = $this->db->get_where('system_user', array('username' => $email));
        return $rs->row();
    }

    public function lost_pass_prof($email) {
        $rs = $this->db->get_where('register', array('txt_Email' => $email));
        return $rs->row();
    }

    public function lost_pass_change($data) {
        unset($data['repass']);
        $id = $data['id'];
        unset($data['id']);
        $rs = $this->db->update('system_user', array('username' => $data['username'], 'pass' => md5($data['pass'])), array('id' => $id));
//        echo $this->db->last_query();
        return $rs;
    }

    public function lost_pass_change_prof($data) {
        unset($data['repass']);
        $id = $data['id'];
        unset($data['id']);
        $rs = $this->db->update('register', array('txt_Email' => $data['username'], 'pass' => md5($data['pass'])), array('id' => $id));
//        echo $this->db->last_query();
        return $rs;
    }

    public function getAdmin($id) {
        $rs = $this->db->get_where('system_user', array('id' => $id));
        return $rs->row();
    }

    public function getProf($id) {
        $rs = $this->db->get_where('register', array('id' => $id));
        return $rs->row();
    }

    public function logout() {
        return $this->db->update('system_user', array('login_in' => 'Off'), array('id' => $this->session->userdata('adminuserid')));
    }

    public function getTotalUser() {
        $this->db->cache_on();
        return $this->db->count_all('end_user');
    }

    public function getTotalprof() {
        $this->db->cache_on();
        return $this->db->count_all('register');
    }

    public function getTotalprof_Exec() {
        $this->db->cache_on();
//        $this->db->where('txt_Gender', 'Male');
        return $this->db->get('exec_form')->num_rows();
    }

    public function totalActiveUsers() {
        $this->db->cache_on();
        $this->db->where('status', 'Active');
        return $this->db->get('register')->num_rows();
    }

    public function admin_changepass($data) {
        $id = $this->session->userdata('adminuserid');
        return $this->db->update('system_user', array('pass' => md5($data['newpass'])), array('id' => $id));
    }

    public function prof_changepass($data) {
        $id = $this->session->userdata('profuserid');
        return $this->db->update('register', array('pass' => md5($data['newpass'])), array('id' => $id));
    }

    public function prof_checkpass($data) {
        $id = $this->session->userdata('profuserid');
        $r = $this->db->get_where('register', array('pass' => md5($data['oldpass']), 'id' => $id))->result_array();
        if (!empty($r)) {
            return true;
        } else {
            return false;
        }
    }

    public function admin_checkpass($data) {
        $id = $this->session->userdata('adminuserid');
        $r = $this->db->get_where('system_user', array('pass' => md5($data['oldpass']), 'id' => $id))->result_array();
        if (!empty($r)) {
            return true;
        } else {
            return false;
        }
    }

    public function totalActiveLawProf() {
        $this->db->cache_on();
        $this->db->select('rg.txt_Category,rg.data_entry_id,rg.modify_date')
                ->from('register rg')
//                ->join('category cat', 'rg.data_entry_id=cat.id')
                ->where('rg.txt_Category', 3)
                ->where('rg.status', 'Active');
        $var = $this->db->get()->num_rows();
//        echo $var . "<br>";
//        echo $this->db->last_query();
//        die();
        return $var;
    }

    public function totalActiveCAProf() {
        $this->db->cache_on();

        $this->db->select('rg.txt_Category,rg.data_entry_id,rg.modify_date')
                ->from('register rg')
//                ->join('category cat', 'rg.data_entry_id=cat.id')
                ->where('rg.txt_Category', 1)
                ->where('rg.status', 'Active');
        $var = $this->db->get()->num_rows();
        return $var;
    }

    public function totalActiveCSProf() {
        $this->db->cache_on();

        $this->db->select('rg.txt_Category,rg.data_entry_id,rg.modify_date')
                ->from('register rg')
//                ->join('category cat', 'rg.data_entry_id=cat.id')
                ->where('rg.txt_Category', 2)
                ->where('rg.status', 'Active');
        $var = $this->db->get()->num_rows();
        return $var;
    }

    public function totalprofOffline() {
        $this->db->cache_on();
        $this->db->where('data_entry_id IS NOT NULL');
        return $this->db->get('register')->num_rows();
    }

    public function totalprofOnline() {
        $this->db->cache_on();
        $this->db->where('data_entry_id IS NULL');
        return $this->db->get('register')->num_rows();
    }

    public function totalPendingForOper() {
        $this->db->cache_on();
        $this->db->where('status', 'Deactive');
        return $this->db->get('exec_form')->num_rows();
    }

    public function getTotalprofAD() {
        $this->db->cache_on();
        $this->db->where('status', 'Deactive');
        return $this->db->get('register')->num_rows();
    }

    public function getPendingForApp() {
        $this->db->cache_on();
        $this->db->where('status', 'Deactive');
        return $this->db->get('register')->num_rows();
    }

    public function getOnlineApp() {
        $this->db->cache_on();
        $this->db->where('data_entry_id', 'NULL');
        return $this->db->get('register')->num_rows();
    }

    public function getOfflineApp() {
        $this->db->cache_on();
        $this->db->where('data_entry_id', '');  // remaining 
        return $this->db->get('register')->num_rows();
    }

}
