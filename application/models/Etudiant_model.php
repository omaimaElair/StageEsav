<?php
class Etudiant_model extends CI_Model {

        public function get_etudiant(){

                $query = $this->db->get('etudiant');
                return $query->result();
            }
}
?>