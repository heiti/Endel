<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users_model extends CI_Model {

    
    public function can_log_in() {
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', $this->input->post('password'));
        
        $query=$this->db->get('User_profile');
        
        if ($query->num_rows()==1){
            return true;
        }else{
            return false;
        }
    }

}
