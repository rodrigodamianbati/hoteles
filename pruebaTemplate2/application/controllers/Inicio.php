<?php
    class Inicio extends CI_Controller{


        public function __construct() {
        
            parent::__construct(); 
            $this->load->model("Usuario_model");

        }

        public function index() {

            if(isset($this->session->userdata['logged_in'])){
                $this->load->view("inicio/head");

                // recupero nombre y apellido de la base
                $id=$this->session->userdata['id'];
               
                $result= $this->Usuario_model->getUsuario($id->id);
                // print_r($result);
                // die();

                
                $this->load->view("inicio/header_no_log", $result);

                $this->load->view("inicio/inicio_view");

                $this->load->view("inicio/footer");
            }
            else{
                 
                $this->load->view("inicio/head");
                $this->load->view("inicio/header");

                $this->load->view("inicio/inicio_view");

                $this->load->view("inicio/footer");
            }
          
        }


        public function getCiudades(){
            $resultado= $this->Alojamiento_model->localidades();
            echo json_encode($resultado);
        }

    }

?>