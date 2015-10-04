<?php

ini_set('display_errors', 'On');
ini_set('html_errors', 'On');
error_reporting(E_ALL);

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function user_layout($data) {

        $temp['data'] = $data;
        $temp['header'] = $data['header'];
        $temp['page'] = $data['template'];
        $this->load->view('user/layout/index', $temp);
    }

    public function enduser_layout($data) {
        if ($this->session->userdata('enduserid') != "") {
            $temp['data'] = $data;
            $temp['header'] = $data['header'];
            $temp['page'] = $data['template'];
            $this->load->view('user/layout/index', $temp);
        } else {
            redirect(site_url());
        }
    }

    public function get_angluar() {
        return json_decode(file_get_contents("php://input"), true);
    }

    public function admin_layout($data) {
        if ($this->session->userdata('adminuserid') != "") {

            $temp['title'] = 'Admin';
            $temp['data'] = $data;

            $this->load->view('layout/index', $temp);
        } else {
            $this->load->view('layout/login');
        }
    }

    public function prof_layout($data) {
        if ($this->session->userdata('profuserid') != "") {
            $temp['title'] = 'Professional';
            $temp['data'] = $data;
            $this->load->view('layout/index', $temp);
        } else {
            $this->load->view('admin/layout/prof-login');
        }
    }

    function sendMail($to, $sub, $msg, $from = 'support@lacaco.com') {
        $config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $message = '';
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from($from); // change it to yours
        $this->email->to($to); // change it to yours
        $this->email->subject($sub);
        $this->email->message($msg);
        return $this->email->send();
    }

    function getImage($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb");
        $data = explode(',', $base64_string);
        fwrite($ifp, base64_decode($data[1]));
        fclose($ifp);
        return $output_file;
    }

}
