<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class AddProduct extends CI_Controller {

    var $original_path;
    var $thumbs_path;

    function __construct() {
        parent::__construct();
        $this->original_path = realpath(APPPATH . '../uploads/original/');
        $this->thumbs_path = realpath(APPPATH . '../uploads/thumbs/');
    }

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
        $data = array(
            'error' => ""
        );
        $this->load->model('add_product_model');
        $this->load->view('templates/header_temp');
        $this->load->view('pages/add_product_view', $data);
        $this->load->view('templates/footer_temp');
        
        }else{
            $this->session->set_userdata('redirect', 'addproduct'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

    public function insert() {
        if ($this->session->userdata('is_logged_in')) {
        $this->load->model('add_product_model');
        $this->load->library('image_lib');

        $this->form_validation->set_rules('vili', 'Vili', 'required|min_length[3]|max_length[20]|xss_clean');
        $this->form_validation->set_rules('sort', 'Sort', 'required|min_length[3]|max_length[30]|xss_clean');
        $this->form_validation->set_rules('hind', 'Hind', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('kogus', 'Kogus', 'required|numeric|xss_clean');
        $this->form_validation->set_rules('asukoht', 'Asukoht', 'required|min_length[3]|max_length[40]|xss_clean');

        $filename = date('h-i-s-j-m-y');
        $config = array(//Config for uploading the pictures
            'allowed_types' => 'jpg|jpeg|gif|png',
            'max_size' => 2048,
            'upload_path' => $this->original_path,
            'file_name' => $filename
        );
        $this->load->library('upload', $config);
        




        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'error' => $this->upload->display_errors()
            );
            $this->load->view('templates/header_temp');
            $this->load->view('pages/add_product_view', $data);
            $this->load->view('templates/footer_temp');
        } else {
            if ($this->upload->do_upload()) {
                $image_data = $this->upload->data();
                $toode = array(//Array of the product for the database   
                    'Vili' => $this->input->post('vili'),
                    'Sort' => $this->input->post('sort'),
                    'Kategooria' => $this->input->post('kategooria'),
                    'seller_id' => $this->session->userdata['id'],
                    'Hind' => $this->input->post('hind'),
                    'Kogus' => $this->input->post('kogus'),
                    'Asukoht' => $this->input->post('asukoht'),
                    'Pilt' => $image_data['file_name']
                );
                $data = array(
                    'error' => $this->upload->display_errors()
                );
                $this->add_product_model->insertData($toode);
                $this->session->set_flashdata('confirmation', 'Toode lisatud');
                redirect(current_url());
            } else {
                $data = array(
                    'error' => $this->upload->display_errors()
                );
                $this->load->view('templates/header_temp');
                $this->load->view('pages/add_product_view', $data);
                $this->load->view('templates/footer_temp');
            }
        }
        
        } else {
            $this->session->set_userdata('redirect', 'addproduct'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

}

?>