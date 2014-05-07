<?php

class Testing extends CI_Controller{
    
    public function index(){
        echo $this->input->get('select1');
        $query = $this->db->get('Viljad');
        $data['query'] = $query->result();
        $this->load->view('templates/header_temp');
        $this->load->view('pages/testing_view', $data);
        $this->load->view('templates/footer_temp');
    }
}
