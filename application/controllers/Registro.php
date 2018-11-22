<?php
    class Registro extends CI_Controller{


        public function __construct() {
        
            parent::__construct(); 
            $this->load->model("Alojamiento_model");
            

        }

        public function index() {

            $provincias['prov'] = $this->Alojamiento_model->provincias();
             $localidades['loc'] = $this->Alojamiento_model->localidades(); 
            $data = array_merge($provincias, $localidades);

            if(isset($this->session->userdata['logged_in'])){
                if($this->session->userdata['rol'] == 'administrador'){
                    
                    $this->load->view("usuario/alta_usuario", $data);
                    
                }
               
            }
            else{
                $this->load->view("/registro", $data);
            }
            
        }



        public function provincia_localidades(){
            
            if($this->input->is_ajax_request()){
                $id=$_GET['id_prov'];
                $localidades = $this->Alojamiento_model->provincia_localidades($id); 
                   echo json_encode($localidades);
            }

            
            
        }
    }
?>