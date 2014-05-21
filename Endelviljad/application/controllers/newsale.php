<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class newsale extends CI_Controller {

    public function index() {
        $this->load->model('productmodel');
        $data['product'] = $this->productmodel->getSingleData($_GET['id']);
        $this->load->view('templates/header_temp');
        $this->load->view('templates/sale_temp', $data);
        $this->load->view('templates/footer_temp');
    }

    public function addsale() {
        $this->load->model('productmodel');
        $this->form_validation->set_rules('kogus', 'required|xss_clean|numeric');
        if ($this->input->post('tyyp') == 'myyk') {
            $this->form_validation->set_rules('hind', 'required|xss_clean|numeric');
            if ($this->form_validation->run()) {
                $data = array(
                    'toode_id' => $_GET['id'],
                    'type' => 'sale',
                    'myyja_id' => $this->session->userdata['id'],
                    'kogus' => $this->input->post('kogus'),
                    'hind' => $this->input->post('hind'),
                    'date' => date("Y-m-d H:i:s")
                );
                $this->productmodel->newSale($data);
            }
        } else if ($this->input->post('tyyp') == 'oksjon') {
            $this->form_validation->set_rules('ostakohe', 'required|xss_clean|numeric');
            $this->form_validation->set_rules('alghind', 'required|xss_clean|numeric');

            if ($this->form_validation->run()) {
                $data = array(
                    'toode_id' => $_GET['id'],
                    'type' => 'auction',
                    'myyja_id' => $this->session->userdata['id'],
                    'alghind' => $this->input->post('alghind'),
                    'ostakohe' => $this->input->post('ostakohe'),
                    'kogus' => $this->input->post('kogus'),
                    'date' => date("Y-m-d H:i:s"),
                    'enddate' => date("Y-m-d H:i:s", strtotime(date("Y-m-d H:i:s") . '+ ' . $this->input->post('kestus') . ' days'))
                );
                $this->productmodel->newSale($data);
            }
        }
        redirect('newsale?id=' . $_GET['id']);
    }

}

?>