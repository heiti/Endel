<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductsModel extends CI_Model{
	
	public function getData(){
		$this->db->select('vili, sort, kogus, hind, aadress '); //valib endelist tooted
                $this->db->where('vili', $searchfield); 
                $this->db->from('Toode');
                $query = $this->db->get();
		return $query->result(); //tagastab eelnevalt queryga määratud tabeli tulemused arrayna
	}



}


?>