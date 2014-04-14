<?php

class Product extends CI_Controller {

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        $this->load->model('productmodel');
        $data['product'] = $this->productmodel->getSingleData($_GET['id']);


        $this->load->view('templates/header_usr');
        $this->load->view('templates/product_temp', $data);
        $this->load->view('templates/footer_temp');
    }

}
?>

