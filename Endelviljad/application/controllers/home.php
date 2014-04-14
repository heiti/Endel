<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index($page = 'home') {
		
		if ($this->session->userdata('is_logged_in')) {
        	$this->load->view('templates/header_usr');
        } 
    	else {
            $this->load->view('templates/header_guest');
        }
		$this->load->view('pages/'.$page.'_view');
		$this->load->view('templates/footer_temp');
		
	}

}

?>
