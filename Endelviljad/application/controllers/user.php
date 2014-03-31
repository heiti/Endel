<?php

class User extends CI_Controller {

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->view('templates/header_temp');
            $this->load->view('pages/user_view');
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

