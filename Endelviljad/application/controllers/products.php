	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Products extends CI_Controller {
	
		public function index() {
		
			$this->load->view('templates/header_temp');
			$this->load->view('pages/products_view');
			$this->load->view('templates/footer_temp');
			
		}
	}
	
	?>