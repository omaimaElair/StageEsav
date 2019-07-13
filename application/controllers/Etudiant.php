<?php
class Etudiant extends CI_Controller {

        public function display()
        {
                $data['etudiant'] = $this->etudiant_model->get_etudiant();
                $this->load->view('etudiantview', $data);
        }
        public function insert(){
                $data= array(
                        'id_etudiant' => 'test3', 'cne' => 'test3', 'cin' => 'test3', 'email' => 'test3', 'tel' => 'test3', 'date_naissance' => 'test3', 'photo'=> 'test3'
                );
                $this->etudiant_model->insert_etudiant($data);
        }
        public function update(){
 $data= array(
                        'cne' => 'cne5555'
                );
                $this->etudiant_model->update_etudiant('1',$data);
        }
        public function delete(){
                $this->etudiant_model->delete_etudiant('1');
        }

}
?>