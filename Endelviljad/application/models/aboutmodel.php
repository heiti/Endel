<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off

class AboutModel extends CI_Model {

    public function getInfo() {
        $this->db->select('User.name, COUNT(Toode.id) as Summa');
        $this->db->group_by('seller_id');
        $this->db->join('User', 'User.id = Toode.seller_id');
        $query = $this->db->get('Toode');
        return $query->result_array();
    }

}
?>

