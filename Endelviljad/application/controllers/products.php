	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Products extends CI_Controller {
	
		public function index() {
			$this->load->model('ProductsModel');
			$data['product'] = $this->ProductsModel->getData(); //tagastab array (nimega product)
			
			$this->load->view('templates/header_temp');
			$this->load->view('pages/products_view', $data);
			$this->load->view('templates/footer_temp');
			
		}
	}
	
	?>