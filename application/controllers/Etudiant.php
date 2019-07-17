<?php
class Etudiant extends CI_Controller {

        function index(){
        // Load the member list view
        $this->load->view('etudiantview');
    }
        public function display()
        {
                $data['etudiant'] = $this->etudiant_model->get_etudiant();
                $this->load->view('etudiantview', $data);
        }
        public function insert(){
               // $data= array(
                   //     'id_etudiant' => 'test3', 'cne' => 'test3', 'cin' => 'test3', 'email' => 'test3', 'tel' => 'test3', 'date_naissance' => 'test3', 'photo'=> 'test3'
               // );
               // $this->etudiant_model->insert_etudiant($data);
                $id = $this->etudiant_model->getid($annee);
                $data['nom'] = $this->input->post('nom');
                $data['prenom'] = $this->input->post('prenom');
                $data['email'] = $this->input->post('email');
                $data['tel'] = $this->input->post('tel');
                $data['adr'] = $this->input->post('adr');
                $data['cin'] = $this->input->post('cin');
                $data['cne'] = $this->input->post('cne');
                $data['date'] = $this->input->post('date');

                $config['upload_path']          = './images/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);


                        $data = array('upload_data' => $this->upload->data());

                        $this->load->view('upload_success', $data);
                



                echo  '<script>console.log("'.$data["user_image"].'******'.$data["prenom"].'")</script>';
              //echo '<script>console.log("'.$this->input->post('nom').'")</script>';
        }
        public function update(){
 $data= array(
                        'cne' => 'cne5555'
                );
                $this->etudiant_model->update_etudiant('1',$data);
        }
        public function delete($id){
                $this->etudiant_model->delete_etudiant($id);
        }
function fetch_user(){  
  $data = $this->etudiant_model->get_etudiant();
 echo json_encode($data);
      } 
      public function getetudiant($id){
         $data = $this->etudiant_model->getetudiant($id);
 echo json_encode($data);
      }
      public function get_id($annee){
         $data = $this->etudiant_model->getid($annee);
         echo json_encode($data);
      }













      public function getEventDatatable()
{
        $getdata = $this->etudiant_model->getEvent();
        $data = array();
        foreach ($getdata as $value)
        {
                $row = array();
                $row[] ='<img src="'.base_url().'images/'.$value->photo.'"  width="50" height="75" />';
                $row[] = $value->id_etudiant;
                $row[] = $value->nom;
                $row[] = $value->prenom;
                $row[] = $value->cin;
                $row[] = $value->cne;
                $row[] = $value->date_naissance;
                $row[] = $value->email;
                $row[] = $value->tel;
                $row[] = $value->adresse;
                $row[] = '<div><button type="button" onClick="supprimer(this.id)" id="'.$value->id_etudiant.'" class="btn btn-primary">Supprimer</button>
        <button type="button" id="'.$value->id_etudiant.'" class="btn btn-success" data-toggle="modal" data-target="#userModal" onclick="modifier(this.id)">Modifier</button>
        <button type="button" id="'.$value->id_etudiant.'" class="btn btn-info"  data-toggle="modal" data-target="#userModal2" onclick="details(this.id)">Afficher</button></div>';
                $data[] = $row;
        }

        $output = array(
                "data" => $data,
        );

        echo json_encode($output);
}


function do_upload(){
        $config['upload_path']="./assets/images";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
 
            $title= $this->input->post('title');
            $image= $data['upload_data']['file_name']; 
             
            $result= $this->upload_model->save_upload($title,$image);
            echo json_decode($result);
        }
 
     }


}
?>