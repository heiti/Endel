<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transactions extends CI_Controller {
    private $sessiondata = array();
    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            
        $this->load->model('users_model');
        $this->sessiondata = array(
            'id' => $this->session->userdata('id'),
            'name' => $this->session->userdata('name'),
            'email' => $this->session->userdata('email'),
            'city' => $this->session->userdata('city'),
            'address' => $this->session->userdata('address'),
            'seller' => $this->session->userdata('seller'),
            'buyer' => $this->session->userdata('buyer'),
            'isLoggedIn' => $this->session->userdata('is_logged_in'),
        );
           //$data['info'] = $this->users_model->getuserinfo($this->session->userdata('email'));

            $this->load->view('templates/header_usr');
            $this->load->view('pages/transactions_view', $this->sessiondata);
            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'transactions'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

}

?>