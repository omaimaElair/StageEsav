<?php  
 defined('BASEPATH') OR exit('No direct script access allowed');  
 class Crud extends CI_Controller {  
      //functions  
      function index(){  
           $data["title"] = "Codeigniter Ajax CRUD with Data Tables and Bootstrap Modals";  
           $this->load->view('crud_view', $data);  
      }  
      function fetch_user(){  
           $this->load->model("crud_model");  
           $fetch_data = $this->crud_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array();  
                $sub_array[] = '<img src="'.base_url().'upload/'.$row->photo.'" class="img-thumbnail" width="50" height="35" />';  
                $sub_array[] = $row->cne;  
                $sub_array[] = $row->cin;  
                $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">Update</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';  
                $data[] = $sub_array;  
           }  
           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->crud_model->get_all_data(),  
                "recordsFiltered"     =>     $this->crud_model->get_filtered_data(),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      }  
      function user_action(){  
           if($_POST["action"] == "Add")  
           {  
                $insert_data = array(  
                     'cne'          =>     $this->input->post('cne'),  
                     'cin'               =>     $this->input->post("cin"),  
                     'photo'                    =>     $this->upload_photo()  
                );  
                $this->load->model('crud_model');  
                $this->crud_model->insert_crud($insert_data);  
                echo 'Data Inserted';  
           }  
           if($_POST["action"] == "Edit")  
           {  
                $user_photo = '';  
                if($_FILES["user_photo"]["name"] != '')  
                {  
                     $user_photo = $this->upload_photo();  
                }  
                else  
                {  
                     $user_photo = $this->input->post("hidden_user_photo");  
                }  
                $updated_data = array(  
                     'cne'          =>     $this->input->post('cne'),  
                     'cin'               =>     $this->input->post('cin'),  
                     'photo'                    =>     $user_photo  
                );  
                $this->load->model('crud_model');  
                $this->crud_model->update_crud($this->input->post("user_id"), $updated_data);  
                echo 'Data Updated';  
           }  
      }  
      function upload_photo()  
      {  
           if(isset($_FILES["user_photo"]))  
           {  
                $extension = explode('.', $_FILES['user_photo']['name']);  
                $new_name = rand() . '.' . $extension[1];  
                $destination = './upload/' . $new_name;  
                move_uploaded_file($_FILES['user_photo']['tmp_name'], $destination);  
                return $new_name;  
           }  
      }  
      function fetch_single_user()  
      {  
           $output = array();  
           $this->load->model("crud_model");  
           $data = $this->crud_model->fetch_single_user($_POST["user_id"]);  
           foreach($data as $row)  
           {  
                $output['cne'] = $row->cne;  
                $output['cin'] = $row->cin;  
                if($row->photo != '')  
                {  
                     $output['user_photo'] = '<img src="'.base_url().'upload/'.$row->photo.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_photo" value="'.$row->photo.'" />';  
                }  
                else  
                {  
                     $output['user_photo'] = '<input type="hidden" name="hidden_user_photo" value="" />';  
                }  
           }  
           echo json_encode($output);  
      }  
 }  