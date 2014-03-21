<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class AddProduct extends CI_Controller{
    function __construct() {
	parent::__construct();
    }
    
    public function index(){
        $data = array(
                    'error' => "",
                    'message' => ""           
                   );
        $this->load->model('add_product_model');
        $this->load->view('templates/header_temp');
        $this->load->view('pages/add_product_view', $data);        
        $this->load->view('templates/footer_temp');
    }
    
    public function insert(){
        
        $this->form_validation->set_rules('vili', 'Vili', 'required|min_length[3]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('sort', 'Sort', 'required|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('hind', 'Hind', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('kogus', 'Kogus', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('asukoht', 'Asukoht', 'required|min_length[3]|max_length[40]|alpha_numeric|xss_clean');
        $config['upload_path'] = "./product_images/";
        $config['allowed_types'] = 'jpg|jpeg|gif|png';
        $this->load->library('upload', $config);
        
        $this->load->model('add_product_model');
        $toode = array(
            'Vili' => $this->input->post('vili'),
            'Sort' => $this->input->post('sort'),
            'Kategooria' => $this->input->post('kategooria'),
            'hind' => $this->input->post('hind'),
            'kogus' => $this->input->post('kogus'),
            'aadress' => $this->input->post('asukoht')
             );
        
        if($this->form_validation->run() == FALSE){
            $data = array(
                    'error' => $this->upload->display_errors(),
                    'message' => ""           
                   );
            $this->load->view('templates/header_temp');
            $this->load->view('pages/add_product_view', $data);        
            $this->load->view('templates/footer_temp');
        }
        else
        {
            if($this->upload->do_upload()){
                $data = array(
                        'error' => $this->upload->display_errors(),
                        'message' => "Toode lisatud"           
                       );
                $this->add_product_model->insertData($toode);
            }else{
                $data = array(
                        'error' => $this->upload->display_errors(),
                        'message' => ""           
                       );
            }
                $this->load->view('templates/header_temp');
                $this->load->view('pages/add_product_view', $data);        
                $this->load->view('templates/footer_temp');
        }
        
    }
}
?>