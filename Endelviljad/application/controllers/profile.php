<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index() {
        $this->load->model('profilemodel');
        $data['user'] = $this->profilemodel->getUserData($_GET['id']);
        $data['products'] = $this->profilemodel->getProductsData($_GET['id']);
        $data['sales'] = $this->profilemodel->getSalesData($_GET['id']);
        $buys = $this->profilemodel->getBuys($_GET['id']);
        $sales = $this->profilemodel->getSales($_GET['id']);
        $data['transactioncount'] = count($buys) + count($sales);
        $this->load->view('templates/header_temp');
        $this->load->view('pages/profile_view', $data);
        $this->load->view('templates/footer_temp');
    }

}
