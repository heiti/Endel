<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class product extends CI_Controller {

    public function index() {
        $this->load->model('productmodel');
        $data['sale'] = $this->productmodel->getSale($_GET['id']);
        $data['bestbid'] = $this->productmodel->getBids($_GET['id']);
        $sale = $this->productmodel->getSale($_GET['id']);
        $data['product'] = $this->productmodel->getSingleData($sale->toode_id);
        $this->load->view('templates/header_temp');
        $this->load->view('templates/product_temp', $data);
        $this->load->view('templates/footer_temp');
    }

    public function newbid() {
        $this->form_validation->set_rules('amount', 'Amount', 'xss_clean|required|numeric|callback_bid_check[' . $_GET['id'] . ']');
        if ($this->form_validation->run()) {
            $this->load->model('productmodel');
            $data = array(
                'auction_id' => $_GET['id'],
                'bidder_id' => $this->session->userdata['id'],
                'bid' => $this->input->post('amount')
            );
            $this->productmodel->addBid($data);
        }
    }

    public function hasnewbids() {
        $this->load->model('productmodel');
        $bid = $this->productmodel->getBids($_GET['id']);
        echo $bid->bid;
    }
    
    public function delete() {
        $this->load->model('productmodel');
        $this->productmodel->deletesale($_GET['id']);
        $this->session->set_flashdata('deleted', 'Müük kustutatud');
        redirect('mysales');
    }

    public function bid_check($bid, $id) {
        $this->load->model('productmodel');
        $dbBid = $this->productmodel->getBids($id);
        if ($bid > $dbBid->bid) {
            return TRUE;
        } else {
            $this->form_validation->set_message('bid_check', 'Pakkumine ei sobi');
            return FALSE;
        }
    }
    
    public function buy(){
        $data['amount'] = $this->input->post('buyamount');
        $this->load->model('productmodel');
        $data['sale'] = $this->productmodel->getSale($_GET['id']);
        $sale = $this->productmodel->getSale($_GET['id']);
        $data['product'] = $this->productmodel->getSingleData($sale->toode_id);
        $this->load->view('templates/header_temp');
        $this->load->view('templates/purchase_temp', $data);
        $this->load->view('templates/footer_temp');
    }
    
    public function pay(){
        $this->load->model('productmodel');
        $sale = $this->productmodel->getSale($_GET['id']);
        $data = array(
            'seller_id' => $sale->myyja_id,
            'product_id' => $sale->toode_id,
            'buyer_id' => $this->session->userdata['id'],
            'sale_id' => $_GET['id'],
            'amount' => $_GET['amount'],
            'price' => $sale->hind,
            'sum' => $_GET['amount']*$sale->hind
        );
        $this->productmodel->transaction($data);
        redirect('transactions');
    }

}
