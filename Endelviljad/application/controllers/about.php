	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class About extends CI_Controller {
	
		public function index() {
		
			$this->load->view('templates/header_temp');
			$this->load->view('pages/about_view');
			$this->load->view('templates/footer_temp');
			
		}
	}
	
	?>