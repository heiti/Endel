<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductsModel extends CI_Model {

    public function getData($limit, $start_row) {
        $this->db->select('Toode.id as toode_id, Sale.type, Sale.alghind, Sale.ostakohe, Sale.id as sale_id, Toode.Vili, Toode.Sort, Kategooria, Sale.kogus as Kogus, Sale.hind as Hind, Toode.Asukoht, Toode.Pilt, Sale.enddate');
        $this->db->select('User.name as username');
        $this->db->from('Sale');
        /*if (!empty($selected)) {
            foreach ($selected as $select) {
                $this->db->or_like('Kategooria', $select);
            }
        }
        if ($search != '') {
            $this->db->where("Toode.Vili like '%" . $search . "%' OR Toode.Sort like '%" . $search . "%'");
        }*/
        $this->db->join('Toode', 'Toode.id = Sale.toode_id');
        $this->db->join('User', 'User.id = Sale.myyja_id', 'LEFT OUTER');
        $this->db->limit($limit,$start_row); //for the pagination
             
       $query=$this->db->get();
   
        return $query->result(); //tagastab eelnevalt queryga määratud tabeli tulemused arrayna
    }
    public function getRows(){
        $query=$this->db->get('Sale');
        return $query->num_rows();
    }
    public function getProduct($id){
        $this->db->where('id', $id);
        $query = $this->db->get('Toode');
        return $query->row();
    }
    
    

    public function getLimitedData($search, $selected, $limit, $start_row) {
        $this->db->select('Toode.id, Toode.Vili, Toode.Sort, Kategooria, Sale.kogus as Kogus, Sale.hind as Hind, Toode.Asukoht, Toode.Pilt');
        $this->db->select('User.name as username');
        $this->db->from('Sale');
        /*if (!empty($selected)) {
            foreach ($selected as $select) {
                $this->db->or_like('Kategooria', $select);
            }
        }
        if ($search != '') {
            $this->db->where("Toode.Vili like '%" . $search . "%' OR Toode.Sort like '%" . $search . "%'");
        }*/
        $this->db->join('Toode', 'Toode.id = Sale.toode_id');
        $this->db->join('User', 'User.id = Sale.myyja_id', 'LEFT OUTER');
        $this->db->limit($limit,$start_row); //for the pagination
             
       $query=$this->db->get();
   
        return $query->result(); //tagastab eelnevalt queryga määratud tabeli tulemused arrayna
   
   }
   
    
 

}

?>