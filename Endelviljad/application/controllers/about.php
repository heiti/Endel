<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller {

    public function index() {
        
        if ($this->session->userdata('is_logged_in')) {
            $this->load->view('templates/header_temp');
            $this->load->view('pages/about_view');
            $this->load->view('templates/footer_temp');
        } else{
            $this->session->set_userdata('redirect', 'about'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
            
        }
        
    }

}

?>