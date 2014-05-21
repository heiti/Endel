<?php

class Cart extends CI_Controller {

    public function index() {
        if ($this->session->userdata('is_logged_in')) {
            $this->load->model('cartmodel');
            $data['cart'] = $this->cartmodel->getCart($this->session->userdata['id']);
            $this->load->view('templates/header_temp');
            $this->load->view('pages/cart_view', $data);
            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'cart'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }
    
    public function editCart(){
        if ($this->session->userdata('is_logged_in')) {
            $this->load->model('cartmodel');
            $data['cart'] = $this->cartmodel->getCart($this->session->userdata['id']);
            foreach($data['cart'] as $car){
                if ($car->kogus != $this->input->post('kogus'.$car->id)){
                    $this->cartmodel->editAmount($car->id,$this->input->post('kogus'.$car->id), $this->session->userdata['id']);
                }
            }
            $data['cart'] = $this->cartmodel->getCart($this->session->userdata['id']);
            $this->load->view('templates/header_temp');
            $this->load->view('pages/cart_view', $data);
            $this->load->view('templates/footer_temp');
        } else {
            $this->session->set_userdata('redirect', 'cart'); //salvestab selle lehe, et logimisel tagasi redirectiks
            $this->session->set_flashdata('autherror', 'Antud lehe nägemiseks on vajalik sisselogimine:');
            redirect('login');
        }
    }

}
