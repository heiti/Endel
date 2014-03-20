<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class AddProduct extends CI_Controller{
    function __construct() {
		parent::__construct();
	}
    
    public function index(){
        $data['message'] = "";
        $this->load->model('add_product_model');
        $this->load->view('templates/header_temp');
        $this->load->view('pages/add_product_view', $data);        
        $this->load->view('templates/footer_temp');
    }
    
    public function insert(){
        $this->form_validation->set_rules('vili', 'Vili', 'required|min_length[3]|max_length[20]|alpha|xss_clean');
        $this->form_validation->set_rules('sort', 'Sort', 'required|min_length[3]|max_length[30]|alpha|xss_clean');
        $this->form_validation->set_rules('hind', 'Hind', 'required|decimal|xss_clean');
        $this->form_validation->set_rules('kogus', 'Kogus', 'required|decimal|xss_clean');
        $this->form_validation->set_rules('asukoht', 'Asukoht', 'required|min_length[3]|max_length[40]|alpha_numeric|xss_clean');
        
        $this->load->model('add_product_model');
        $toode = array(
            'Vili' => $this->input->post('vili'),
            'Sort' => $this->input->post('sort'),
            'Kategooria' => $this->input->post('kategooria'),
            'hind' => $this->input->post('hind'),
            'kogus' => $this->input->post('kogus'),
            'aadress' => $this->input->post('asukoht')
             );
        $this->add_product_model->insertData($toode);
        if($this->form_validation->run() == FALSE){
            $data['message'] = "";
            $this->load->view('templates/header_temp');
            $this->load->view('pages/add_product_view', $data);        
            $this->load->view('templates/footer_temp');
        }
        else
        {
            $data['message'] = "Toode lisatud!";
            
            $this->load->view('templates/header_temp');
            $this->load->view('pages/add_product_view', $data);        
            $this->load->view('templates/footer_temp');
        }
        
        
    }
}
?>