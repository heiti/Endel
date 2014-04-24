<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class product extends CI_Controller{
    
    public function index(){
        $this->load->model('productmodel');
        $data['sale'] = $this->productmodel->getSale($_GET['id']);
        $data['bestbid'] = $this->productmodel->getBids($_GET['id']);
        $sale = $this->productmodel->getSale($_GET['id']);
        $data['product'] = $this->productmodel->getSingleData($sale->toode_id);
        $this->load->view('templates/header_temp');
        $this->load->view('templates/product_temp', $data);
        $this->load->view('templates/footer_temp');
    }
    public function newbid(){
        $this->form_validation->set_rules('amount', 'Amount' ,'xss_clean|required|numeric');
        if ($this->form_validation->run()){
            $this->load->model('productmodel');
            $data = array(
                'auction_id' => $_GET['id'],
                'bidder_id' => $this->session->userdata['id'],
                'bid' => $this->input->post('amount')
                );
            $this->productmodel->addBid($data);
        }
    }
    public function hasnewbids(){
        $this->load->model('productmodel');
        $bid = $this->productmodel->getBids($_GET['id']);
        echo $bid->bid;
    }
}


