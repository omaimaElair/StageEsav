<?php 

class Classe_model extends CI_Model{

    public function test_classe()
    {
        echo "calsse model";
    }

     function Get_Filiere()
    {
        $this->load->database();
        $query = $this->db->get('filiere');

        return $query;
    }
}