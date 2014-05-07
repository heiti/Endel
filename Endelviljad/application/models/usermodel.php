<?php

class usermodel extends CI_Model {

    public function getData($id) {
        $this->db->select('*');
        $this->db->where('User.id', $id);
        $query = $this->db->get('User');
        return $query->row();
    }

    public function setData($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('User', $data);
    }

}
?>