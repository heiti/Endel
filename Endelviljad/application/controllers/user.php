<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class User extends CI_Controller {

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->model('usermodel');
            $data['andmed'] = $this->usermodel->getData($this->session->userdata('id'));
            $this->load->view('templates/header_temp');
            $this->load->view('pages/user_view', $data);
            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'user'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

    public function updatedata() {
        $andmed = $this->session->userdata('id');
        $muutused = array();
        if ($this->input->post('name')!= ''){
            $muutused['name'] = $this->input->post('name');
        }
        if ($this->input->post('email')){
            $muutused['email'] = $this->input->post('email');
        }
        if ($this->input->post('city')){
            $muutused['email'] = $this->input->post('city');
        }
        if ($this->input->post('address')){
            $muutused['email'] = $this->input->post('address');
        }
        if (count($muutused)==0){
            $this->session->set_flashdata('userdata_update', 'Sa ei täitnud ühtegi välja');
            redirect('user');
        }else{
            $this->load->model('usermodel');
            $this->usermodel->setData($this->session->userdata['id'], $muutused);
             $this->session->set_flashdata('userdata_update', 'Andmed muudetud');
             redirect('user');
        }
        
    }

}
?>

