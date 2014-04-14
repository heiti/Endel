<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller {

    public function index() {
        $this->load->model('aboutmodel');
        $data['info'] = $this->aboutmodel->getInfo();
        
        if ($this->session->userdata('is_logged_in')) {
        	$this->load->view('templates/header_usr');
        } 
    	else {
            $this->load->view('templates/header_guest');
        }
		$this->load->view('pages/about_view', $data);
		$this->load->view('templates/footer_temp');
    }

}

?>