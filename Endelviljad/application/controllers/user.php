<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User extends CI_Controller {

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->model('usermodel');
            $data['andmed'] = $this->usermodel->getData($this->session->userdata('id'));
            $this->load->view('templates/header_usr');
            $this->load->view('pages/user_view', $data);
            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'user'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

    public function updatedata() {
        $andmed = $this->session->userdata('id');
    }

}
?>

