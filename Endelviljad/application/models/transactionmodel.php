<?php

class transactionmodel extends CI_Model{
    public function getSales($id){
        $this->db->where('seller_id', $id);
        $query = $this->db->get('transaction_with_buyernames');
        return $query->result();
    }
    public function getBuys($id){
        $this->db->where('buyer_id', $id);
        $query = $this->db->get('transaction_with_sellernames');
        return $query->result();
    }
}