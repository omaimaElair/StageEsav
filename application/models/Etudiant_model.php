<?php
class Etudiant_model extends CI_Model {

        public function get_etudiant(){
            $this->db->select('photo, id_etudiant, nom, prenom,cin,cne,date_naissance,email,tel,adresse');
                $query = $this->db->get('etudiant');
                return $query->result();
            }
              public function getetudiant($id){
                $this->db->where('id_etudiant', $id);
            $this->db->select('photo, id_etudiant, nom, prenom,cin,cne,date_naissance,email,tel,adresse');
                $query = $this->db->get('etudiant');
               return $query->result()[0];

            }

            public function getid($annee){
                $this->db->select_max('id_etudiant');
                $this->db->like('id_etudiant', $annee,'after');
                $query = $this->db->get('etudiant');
                $result = $query->row();
                if(empty($result->id_etudiant)){
                       return $annee.'0001';
                    } else {
                        if($result->id_etudiant===null){
                             return $annee.'0001';
                         }else{
                       return $result->id_etudiant+1;
                   }
                    }
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








            function getEvent()
{
    $query = $this->db->get('etudiant');
    return $query->result();
}
    
}
?>