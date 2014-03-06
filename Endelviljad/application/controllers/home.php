	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Home extends CI_Controller {
	
		public function index($page = 'home_view') {
		
			$this->load->view('templates/header_temp');
			$this->load->view('pages/'.$page);
			$this->load->view('templates/footer_temp');
			
		}
	}
	
	?>