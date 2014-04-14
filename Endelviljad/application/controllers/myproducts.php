<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Myproducts extends CI_Controller {

    public function index() {
        $this->load->model('myproductsmodel');
        $data = array(
            'message' => ''
        );
        $data['products'] = $this->myproductsmodel->getMyProducts($this->session->userdata['id']);
        if (count($data['products']) == 0) {
            $data['message'] = 'Sul pole tooteid müügil';
        }

        if ($this->session->userdata('is_logged_in')) {
            $this->load->view('templates/header_usr');
            $this->load->view('pages/my_products_view', $data);
            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'myproducts'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

}

?>