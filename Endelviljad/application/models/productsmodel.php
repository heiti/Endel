<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProductsModel extends CI_Model {

    public function getData($search, $selected, $sortby) {
        $this->db->select('Vili, Sort, Kategooria, Kogus, Hind, Asukoht, Pilt');
        $this->db->select('User.name as username');
        $this->db->from('Toode');
        if (!empty($selected)) {
            foreach ($selected as $select) {
                $this->db->or_like('Kategooria', $select);
            }
        }
        if ($search != '') {
            $this->db->where("Toode.Vili like '%" . $search . "%' OR Toode.Sort like '%" . $search . "%'");
        }
        $this->db->join('User', 'User.id = Toode.seller_id', 'LEFT OUTER');
        $query = $this->db->get();
        return $query->result(); //tagastab eelnevalt queryga määratud tabeli tulemused arrayna
    }

}

?>