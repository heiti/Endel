<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class MySales extends CI_Controller {

    public function index() {
        $this->load->model('mysalesmodel');
        $data['sales'] = $this->mysalesmodel->getMySales($this->session->userdata['id']);
        $this->load->view('templates/header_temp');
        $this->load->view('pages/my_sales_view', $data);
        $this->load->view('templates/footer_temp');
    }
    public function deletesale(){
        $this->load->model('mysalesmodel');
        $this->mysalesmodel->delete($_GET['id']);
    }

}
