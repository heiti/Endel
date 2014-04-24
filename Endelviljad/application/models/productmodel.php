<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class ProductModel extends CI_Model {

    public function getSingleData($id) {
        $this->db->select('Toode.id, Vili, Sort, Kategooria, Hind, Kogus, Asukoht, Pilt');
        $this->db->select('User.name as Seller');
        $this->db->where('Toode.id', $id);
        $this->db->join('User', 'User.id = Toode.seller_id', 'LEFT OUTER');
        $this->db->from('Toode');
        $query = $this->db->get();
        return $query->row();
    }

    public function addToCart($productId, $amount, $buyerId) {
        $data = array(
            'toode_id' => $productId,
            'kogus' => $amount,
            'ostja_id' => $buyerId
        );
        $this->db->insert('Cart', $data);
    }

    public function newSale($data) {
        $this->db->insert('Sale', $data);
    }

    public function getSale($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('Sale');
        return $query->row();
    }

    public function getBids($id) {
        $this->db->select('MAX(bid) as bid FROM Bid WHERE auction_id='.$id);
        $query = $this->db->get();
        return $query->row();
    }

    public function addBid($data) {
        $this->db->insert('Bid', $data);
    }

}

?>