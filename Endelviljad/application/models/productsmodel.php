<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ProductsModel extends CI_Model{
	
	public function getData(){
		$query = $this->db->get('Toode'); //valib endelist tooted
		return $query->result(); //tagastab eelnevalt queryga määratud tabeli tulemused arrayna
	}



}


?>