<?php

class admin_controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['template'] = 'home';
        $this->admin_layout($data);
    }

    public function list_Admin_User() {
        $data['template'] = 'list_Admin_User';
        $this->admin_layout($data);
    }

    public function add_Admin_Users() {
        $data['template'] = 'add_Admin_Users';
        $this->admin_layout($data);
    }

    public function list_agent_do() {
        $data['template'] = 'list_agents_do';
        $this->admin_layout($data);
    }

    public function add_agent_do() {
        $data['template'] = 'add_professional';
        $this->admin_layout($data);
    }

    public function changepass() {
        $data['template'] = 'changepassword';
        $this->admin_layout($data);
    }

    public function admin_changepass() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->admin_changepass($data);
        if ($rs) {
            echo json_encode(array('status' => 1, 'msg' => 'Password Change Successfully.'));
        } else {
            echo json_encode(array('status' => 2, 'msg' => 'Password Changing Failed.'));
        }
    }

    public function admin_checkpass() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->admin_checkpass($data);
        if (!$rs) {
            echo json_encode(array('status' => 2, 'msg' => 'Old Password Did not match.'));
        } else {
            echo json_encode(array('status' => 1, 'msg' => 'Password match.'));
        }
    }

    public function checkmail() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->checkmail($data['email']);
        if (!$rs) {
            echo json_encode(array('status' => 2, 'msg' => 'Email Dose Not exist'));
        } else {
            echo json_encode(array('status' => 1, 'msg' => 'Email Exist'));
        }
    }

    public function checkmail_prof() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->checkmail_prof($data['email']);
        if (!$rs) {
            echo json_encode(array('status' => 2, 'msg' => 'Email Dose Not exist'));
        } else {
            echo json_encode(array('status' => 1, 'msg' => 'Email Exist'));
        }
    }

    public function lost_pass_change() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->lost_pass_change($data);
        if ($rs) {
            echo json_encode(array('status' => 1, 'msg' => 'Change Password Successfully'));
        } else {
            echo json_encode(array('status' => 2, 'msg' => 'Change Password failed'));
        }
    }

    public function lost_pass_change_prof() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->lost_pass_change_prof($data);
        if ($rs) {
            echo json_encode(array('status' => 1, 'msg' => 'Change Password Successfully'));
        } else {
            echo json_encode(array('status' => 2, 'msg' => 'Change Password failed'));
        }
    }

    public function lost_pass() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->lost_pass($data['email']);
        $da['username'] = $rs->name;
        $da['link'] = SITEURL . "ChangePasswordAdmin/" . $rs->id;
        $msg = $this->load->view('admin/email/lost_pass', $da, true);
        $this->sendMail($data['email'], 'LACACO Lost Password.', $msg);
        if (!$rs) {
            echo json_encode(array('status' => 2, 'msg' => 'Email Sending Failed.'));
        } else {
            echo json_encode(array('status' => 1, 'msg' => 'Email Send. Please Check your mail.'));
        }
    }

    public function lost_pass_p() {
        $data = $this->get_angluar();
        $rs = $this->admin_model->lost_pass_prof($data['email']);
        $da['username'] = $rs->txt_Fname;
        $da['link'] = SITEURL . "ChangePasswordProf/" . $rs->id;
        $msg = $this->load->view('admin/email/lost_pass', $da, true);
        $this->sendMail($data['email'], 'LACACO Lost Password.', $msg);
        if (!$rs) {
            echo json_encode(array('status' => 2, 'msg' => 'Email Sending Failed.'));
        } else {
            echo json_encode(array('status' => 1, 'msg' => 'Email Send. Please Check your mail.'));
        }
    }

    public function lost_pass_admin($id) {
        $data['rs'] = $this->admin_model->getAdmin($id);
        $this->load->view('admin/layout/lost_pass', $data);
    }

    public function lost_pass_prof($id) {
        $data['rs'] = $this->admin_model->getProf($id);
        $this->load->view('admin/layout/lost_pass_prof', $data);
    }

    public function getdashboard() {
        $data = array(
            'totalusers' => $this->admin_model->getTotalUser(),
            'totalprofessional' => $this->admin_model->getTotalprof(),
            'totalprofessionalexec' => $this->admin_model->getTotalprof_Exec(),
            'totalprofessionalad' => $this->admin_model->getTotalprofAD(),
            // new count reports
            'totalActivationPending' => $this->admin_model->getPendingForApp(),
            'getOnlineApp' => $this->admin_model->getOnlineApp(),
            'getOfflineApp' => $this->admin_model->getOfflineApp(),
            'totalActiveUsers' => $this->admin_model->totalActiveUsers(),
            'totalActiveLawProf' => $this->admin_model->totalActiveLawProf(),
            'totalActiveCAProf' => $this->admin_model->totalActiveCAProf(),
            'totalActiveCSProf' => $this->admin_model->totalActiveCSProf(),
            'totalPendingForOper' => $this->admin_model->totalPendingForOper(),
            'totalprofOffline' => $this->admin_model->totalprofOffline(),
            'totalprofOnline' => $this->admin_model->totalprofOnline()
        );
        echo json_encode($data);
    }

    public function login() {
        $admin = $this->get_angluar();
        $result = $this->admin_model->login($admin);
        if ($result->num_rows()) {
            $ses = array(
                'adminuserid' => $result->row()->id,
                'adminusername' => $result->row()->username,
                'adminname' => $result->row()->name
            );
            $this->session->set_userdata($ses);
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function logout() {
        $result = $this->admin_model->logout();
        if ($result) {
            $this->session->sess_destroy();
        }
        redirect(site_url() . 'admin');
    }

    public function backup() {
        $this->load->dbutil();
        $backup = & $this->dbutil->backup();
// Load the download helper and send the file to your desktop
        $this->load->helper('download');
        force_download(FCPATH . '/assets/backup/dbbackup_' . date("Y_m_d_h_i_s") . '.gz', $backup);
    }

}
