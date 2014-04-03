<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index() {

        if ($this->session->userdata('is_logged_in')) {
            $this->load->library('javascript');
            $this->load->model('productsmodel');
            $this->load->view('templates/header_temp');
            
            
            //pagination + products_view         
            $databaseinfo = $this->productsmodel->getData('', array());

            $start_row = $this->uri->segment(3);
            $per_page = 4; //number of products shown per page

            if (trim($start_row) == '' || trim($start_row) == 1)
                $start_row = 0;

            $config['base_url'] = base_url() . 'products/index/';
            $config['total_rows'] = $databaseinfo['numRows'];
            $config['per_page'] = $per_page;
            //$config['full_tag_open'] = '<p class="prod_pagination">';
            //$config['full_tag_close'] = '</p>';
            //$config['use_page_numbers'] = TRUE;

            $this->pagination->initialize($config);
            $this->view_data['pagination'] = $this->pagination->create_links();
            $this->view_data['product'] = $this->productsmodel->getLimitedData('', array(), $per_page, $start_row);

            $this->load->view('pages/products_view', $this->view_data); //$data);

            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'products'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

    public function search() {
        if ($this->session->userdata('is_logged_in')) {
            $this->form_validation->set_rules('search', 'Search', 'trim|xss_clean|alpha');
            $this->form_validation->set_rules('vili[]', 'Vili', 'trim');
            $searchfield = $this->input->post('search');
            $viljad = $this->input->post("vili");
            $sort = $this->input->post('sorting');
            $this->load->model('productsmodel');

            $this->load->view('templates/header_temp');

            //pagination + products_view         
            $databaseinfo = $this->productsmodel->getData($searchfield, $viljad);

            $start_row = $this->uri->segment(3);
            $per_page = 4; //number of products shown per page

            if (trim($start_row) == '' || trim($start_row) == 1)
                $start_row = 0;

            $config['base_url'] = base_url() . 'products/index/';
            $config['total_rows'] = $databaseinfo['numRows'];
            $config['per_page'] = $per_page;
            //$config['full_tag_open'] = '<p class="prod_pagination">';
            //$config['full_tag_close'] = '</p>';
            //$config['use_page_numbers'] = TRUE;

            $this->pagination->initialize($config);
            $this->view_data['pagination'] = $this->pagination->create_links();
            $this->view_data['product'] = $this->productsmodel->getLimitedData($searchfield, $viljad, $per_page, $start_row);

            $this->load->view('pages/products_view', $this->view_data); //$data);


            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'products'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

}
