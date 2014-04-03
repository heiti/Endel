<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends CI_Controller {

    public function index() {
        $this->load->model('aboutmodel');
        $data['info'] = $this->aboutmodel->getInfo();
        $this->load->view('templates/header_temp');
        $this->load->view('pages/about_view', $data);
        $this->load->view('templates/footer_temp');
    }

}

?>