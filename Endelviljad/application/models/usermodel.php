<?php

class user_model extends CI_Model {

    public function getData($id) {
        $this->db->where('User.id', $id);
        $query = $this->db->get('User');
        return $query->row();
    }

    public function setData($id) {
        
    }

}
?>