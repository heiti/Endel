<?php

class CartModel extends CI_Model {

    public function getCart($buyer_id) {
        $this->db->select('Toode.id, Toode.Vili, Toode.Sort, Toode.Kategooria, Toode.Kogus as kogusmax, Toode.Hind, Toode.Asukoht, Toode.Date, Cart.kogus as kogus, User.name as Username');
        $this->db->where('Cart.ostja_id', $buyer_id);
        $this->db->join('Cart', 'Toode.id = Cart.toode_id');
        $this->db->join('User', 'Toode.seller_id = User.id');
        $query = $this->db->get('Toode');
        return $query->result();
    }
    
    
    public function editAmount($productId, $newAmount, $buyerId){
        $data = array(
            'kogus' => $newAmount
        );
        $this->db->where('toode_id', $productId);
        $this->db->where('ostja_id', $buyerId);
        $this->db->update('Cart', $data);
    }

}

?>
