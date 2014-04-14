<?php 

if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');

class Fallback extends CI_Controller {

	public function index() {
	
		$this->load->view('templates/header_temp');
		$this->load->view('pages/fallback_view');
		$this->load->view('templates/footer_temp');
		
	}

}

?>
