<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->login();
    }

    public function login() {

        $this->load->view('templates/header_temp');
        $this->load->view('pages/login_view');
        $this->load->view('templates/footer_temp');
    }

    public function login_validation() {
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|xss_clean|callback_validate_credentials');
        $this->form_validation->set_rules('password', 'Parool', 'required|md5|trim|xss_clean');

        if ($this->form_validation->run()) {

            $this->load->model('users_model');
            
            $userinfo = $this->users_model->getuserinfo($this->input->post('email'));
            $data = array(
                'id'=> $userinfo->id,
                'name'=> $userinfo->name,
                'email' => $userinfo->email,
                'city'=> $userinfo->city,
                'address'=> $userinfo->address,
                'seller'=> $userinfo->seller,
                'buyer'=> $userinfo->buyer,
                'is_logged_in' => 1,
            );
            $this->session->set_userdata($data);
            if ($this->session->userdata('redirect')) {
                redirect($this->session->userdata('redirect'));
            }else {
            redirect('home');
            }
        } else {

            $this->login();
        }
    }

    public function validate_credentials() {
        $this->load->model('users_model');

        if ($this->users_model->can_log_in()) {
            return true;
        } else {
            $this->form_validation->set_message('validate_credentials', 'Sisestasid vale parooli/emaili');
            return false;
        }
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */