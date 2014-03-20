<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
class Add_Product_Model extends CI_Model{
    
    public function insertData($data){
            $this->db->insert('Toode', $data);
            echo "Lisatud";
    }
    
}


?>

