<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
class ProductModel extends CI_controller {

    public function getSingleData($id) {
        $this->db->select('Toode.id, Vili, Sort, Kategooria, Kogus, Hind, Asukoht, Pilt');
        $this->db->select('User.name as Seller');
        $this->db->where('Toode.id', $id);
        $this->db->join('User', 'User.id = Toode.seller_id', 'LEFT OUTER');
        $this->db->from('Toode');
        $query = $this->db->get();
        return $query->row();
    }

} 
?>