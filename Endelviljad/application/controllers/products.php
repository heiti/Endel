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

            $start_row = $this->uri->segment(3);
            $per_page = 9; //number of products shown per page

            if (trim($start_row) == '' || trim($start_row) == 1)
                $start_row = 0;

            $config['base_url'] = base_url() . 'products/index/';
            $config['total_rows'] = $this->productsmodel->getRows();
            $config['per_page'] = $per_page;
            //pagination numbers with bootstrap
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><span>';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '&laquo;';
            $config['prev_link'] = '&lsaquo;';
            $config['last_link'] = '&raquo;';
            $config['next_link'] = '&rsaquo;';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $this->view_data['pagination'] = $this->pagination->create_links();
            $this->view_data['product'] = $this->productsmodel->getData($per_page, $start_row);
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
            $per_page = 9; //number of products shown per page

            if (trim($start_row) == '' || trim($start_row) == 1)
                $start_row = 0;

            /*    <ul class="pagination">
              <li><a href="#">&laquo;</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">&raquo;</a></li>
              </ul>

             */
            
            $config['base_url'] = base_url() . 'products/index/';
            $config['total_rows'] = $databaseinfo['numRows'];
            $config['per_page'] = $per_page;
            //pagination numbers with bootstrap
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><span>';
            $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['first_link'] = '&laquo;';
            $config['prev_link'] = '&lsaquo;';
            $config['last_link'] = '&raquo;';
            $config['next_link'] = '&rsaquo;';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            

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
