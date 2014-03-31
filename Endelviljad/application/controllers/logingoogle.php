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
                    $attr_data = $openid->getAttributes();
                    $mail = $attr_data['contact/email'];
                   // $first = $attr_data['namePerson/first'];
                    //echo '<pre>';
                   // print_r($data);
                    
                    //andmebaasist google emaili järgi kasutaja info pärimine
                    $this->load->model('users_model');
                    $g_userinfo = $this->users_model->getuserinfo($mail);
                    $data = array(
                        'id' => $userinfo->id,
                        'name' => $userinfo->name,
                        'email' => $userinfo->email,
                        'city' => $userinfo->city,
                        'address' => $userinfo->address,
                        'seller' => $userinfo->seller,
                        'buyer' => $userinfo->buyer,
                        'is_logged_in' => 1,
                    );
                    $this->session->set_userdata($data);
                    if ($this->session->userdata('redirect')) { //kui sisselogimisele satuti piiratud lehe kaudu
                        redirect($this->session->userdata('redirect'));
                    } else {
                        redirect('about');
                    }
                    
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