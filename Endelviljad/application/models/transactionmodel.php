<?php

class transactionmodel extends CI_Model {

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

    public function getTransaction($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Transaction_view');
        return $query->row();
    }
    public function addRating($id, $rating){
        $this->db->where('id', $id);
        $this->db->update('Transaction', array('rating' => $rating));
    }

}
