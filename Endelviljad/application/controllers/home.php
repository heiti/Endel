<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
	
		$this->load->view('templates/header_temp');
		$this->load->view('pages/home_view');
		$this->load->view('templates/footer_temp');
		
	}

}

?>
