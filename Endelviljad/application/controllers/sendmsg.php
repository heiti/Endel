<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sendmsg extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {

        $this->sendmsg();
    }

    public function sendmsg() {

        $this->load->view('templates/header_temp');
        $this->load->view('pages/sendmsg_view');
        $this->load->view('templates/footer_temp');
    }

    public function sendemail() {
        
        $this->load->library('email');
        $this->email->from($this->input->post('senderEmail'), $this->input->post('senderName'));
        $this->email->to('curiise@ut.ee');
        $this->email->subject('Endelviljad kiri');

        $this->email->message($this->input->post('senderMessage'));

        if ($this->email->send()) {
            echo ("Täname kirja eest");
        }
        echo $this->email->print_debugger();
        
         
         
    }

}
