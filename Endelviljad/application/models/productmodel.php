<?php

class ProductModel extends CI_controller {

    public function getSingleData($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Toode');
        return $query->row();
    }

} 
?>