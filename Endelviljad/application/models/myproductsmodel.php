<?php

class MyProductsModel extends CI_Model {

    function getMyProducts($id) {
        $this->db->select('id, Vili, Sort, Kategooria, Kogus, Hind, Asukoht');
        $this->db->where('seller_id', $id);
        $this->db->from('Toode');
        $query = $this->db->get();
        return $query->result_array();
    }

}
?>

