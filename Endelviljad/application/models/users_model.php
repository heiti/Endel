<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    public function can_log_in() {
        $this->db->select('id', 'email', 'name', 'city', 'address', 'seller', 'buyer');
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));

        $query = $this->db->get('User');

        if ($query->num_rows() == 1) {

            return true;
        } else {
            return false;
        }
    }

    public function getuserinfo($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('User');
        return $query->row();
    }

}
