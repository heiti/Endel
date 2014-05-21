<?php

class mysalesmodel extends CI_Model{
    
    public function getMySales($id){
        $this->db->select('Sale.id, type, Sale.kogus, Sale.hind, alghind, ostakohe, enddate, Sale.date');
        $this->db->select('Toode.Vili, Toode.Asukoht, Toode.Sort');
        $this->db->where('Sale.myyja_id', $id);
        $this->db->join('Toode', 'Sale.toode_id=Toode.id');
        $query = $this->db->get('Sale');
        return $query->result();
    }
    
    public function delete($id){
        $this->db->delete('Sale', array('id' => $id));
    }
}

