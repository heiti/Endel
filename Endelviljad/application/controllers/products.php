<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller {

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->model('ProductsModel');
            $data['product'] = $this->ProductsModel->getData('', array());

            $this->load->view('templates/header_temp');
            $this->load->view('pages/products_view', $data);
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
            $this->load->model('ProductsModel');
            $data['product'] = $this->ProductsModel->getData($searchfield, $viljad, $sort);
            $this->load->view('templates/header_temp');
            $this->load->view('pages/products_view', $data);
            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'products'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

}

?>