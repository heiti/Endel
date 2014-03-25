	<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Products extends CI_Controller {
                
		public function index() {
			$this->load->model('ProductsModel');
                        $data['product'] = $this->ProductsModel->getData('', array());
                        
                        
                        $this->load->view('templates/header_temp');
			$this->load->view('pages/products_view', $data);
			$this->load->view('templates/footer_temp');         
		}
                
                public function search(){
                    $this->form_validation->set_rules('search', 'Search', 'trim|xss_clean|alpha' );
                    $this->form_validation->set_rules('vili[]', 'Vili', 'trim');
                    $searchfield = $this->input->post('search');
                    $viljad = array();
                    $viljad = $this->input->post("vili");
                    $this->load->model('ProductsModel');
                    $data['product'] = $this->ProductsModel->getData($searchfield, $viljad);
                    $this->load->view('templates/header_temp');
                    $this->load->view('pages/products_view', $data);
                    $this->load->view('templates/footer_temp'); 
                    

                    
                    
                }
               
	}
	
	?>