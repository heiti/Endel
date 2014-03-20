<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductsModel extends CI_Model{


    public function getData($search){
                if ($search == ''){
                    $this->db->select('Vili, Sort, Kategooria, kogus, hind, aadress');
                    $this->db->select('User.name as username');
                    $this->db->from('Toode');
                    $this->db->join('User', 'User.id = Toode.seller_id', 'LEFT OUTER');
                    $query = $this->db->get();
                }else{
                    $this->db->select('Vili, Sort, Kategooria, kogus, hind, aadress');
                    $this->db->select('User.name as username');
                    $this->db->from('Toode');
                    $this->db->where('Vili', $search);
                    $this->db->join('User', 'User.id = Toode.seller_id', 'LEFT OUTER');
                    $query = $this->db->get();
                }
		return $query->result(); //tagastab eelnevalt queryga määratud tabeli tulemused arrayna
	}
        



}


?>