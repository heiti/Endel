<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Logingoogle extends CI_Controller {

    public function Logingoogle() {
        parent::__construct();
    }

    function index() {
        parse_str($_SERVER['QUERY_STRING'], $_GET);
        $this->load->library('LightOpenID');
        try {
            if (!isset($_GET['openid_mode'])) {
                $openid = new LightOpenID(base_url());
                $openid->identity = 'https://www.google.com/accounts/o8/id';
//http://code.google.com/p/lightopenid/wiki/GettingMoreInformation
                $openid->required = array(
                    'namePerson/first',
                    'namePerson/last',
                    'contact/email',
                    'contact/country/home', //Country
                    'pref/language',
                    'namePerson/friendly', //Alias/Username
                );
                
                
                $openid->returnUrl = base_url(); // . 'google_openid'; //Return url to catch response from server
                header('Location: ' . $openid->authUrl());
            } elseif ($_GET['openid_mode'] == 'cancel') {
                echo 'User has canceled authentication!';
            } else {
                $openid = new LightOpenID(base_url());
                if ($openid->validate()) {
                    $data = $openid->getAttributes();
                    $email = $data['contact/email'];
                    $first = $data['namePerson/first'];
                    echo '<pre>';
                    print_r($data);
                } else {
                    redirect('login');
                }
            }
        } catch (ErrorException $e) {
            echo $e->getMessage();
        }
    }

}

?>