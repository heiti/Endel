<?php 
if ( ! defined('BASEPATH')) 
	exit('No direct script access allowed');

class Cache extends CI_Controller {

	public function index() {
		
		$this->load->view('templates/header_cache');
        $this->load->view('pages/home_view');
		$this->load->view('templates/footer_temp');		
	}
}
?>