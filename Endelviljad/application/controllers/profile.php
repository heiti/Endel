<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function index() {

        $this->load->view('templates/header_temp');
        $this->load->view('pages/profile_view');
        $this->load->view('templates/footer_temp');
    }

}
