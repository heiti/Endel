<?php

class profilemodel extends CI_Model {

    public function getUserData($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('User');
        return $query->row();
    }

    public function getSalesData($id) {
        $this->db->where('myyja_id', $id);
        $query = $this->db->get('Sale');
        return $query->result_array();
    }

    public function getProductsData($id) {
        $this->db->select('id, Vili, Sort, Kategooria, Asukoht');
        $this->db->where('seller_id', $id);
        $this->db->from('Toode');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getSales($id) {
        $this->db->where('seller_id', $id);
        $query = $this->db->get('transaction_with_buyernames');
        return $query->result();
    }

    public function getBuys($id) {
        $this->db->where('buyer_id', $id);
        $query = $this->db->get('transaction_with_sellernames');
        return $query->result();
    }

}
