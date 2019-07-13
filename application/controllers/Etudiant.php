<?php
class Etudiant extends CI_Controller {

        public function display()
        {
                $data['etudiant'] = $this->etudiant_model->get_etudiant();
                $this->load->view('etudiantview', $data);
        }


}
?>