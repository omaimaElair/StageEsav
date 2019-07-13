<?php
class Etudiant_model extends CI_Model {

        public function get_etudiant(){

                $query = $this->db->get('etudiant');
                return $query->result();
            }
            public function insert_etudiant($data){
            	$query=$this->db->insert('etudiant',$data);
            }
            public function update_etudiant($id,$data){
            	$this->db->where('id_etudiant', $id);
            	$query = $this->db->update('etudiant', $data);
            }
            public function delete_etudiant($id){
            	$this->db->where('id_etudiant',$id);
            	$this->db->delete('etudiant');
            }
}
?>