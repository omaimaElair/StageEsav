<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {


	public function index()
	{
        $this->load->view('welcome_message');
    }

    public function AddClasse()
	{
        $this->load->model("Classe_model");
        $data["data_filiere"] = $this->Classe_model->Get_Filiere();
       

        $this->load->view("AddClasse",$data);
    }
}
