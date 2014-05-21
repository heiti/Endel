<?php

class transaction extends CI_Controller{
    public function index(){
        $this->load->model('transactionmodel');
        $data['transaction'] = $this->transactionmodel->getTransaction($_GET['id']);
        $this->load->view('templates/header_temp');
        $this->load->view('templates/transaction_temp', $data);
        $this->load->view('templates/footer_temp');
    }
    public function rating(){
        $this->load->model('transactionmodel');
        $this->transactionmodel->addRating($_GET['id'], $this->input->post('rating'));
    }
}