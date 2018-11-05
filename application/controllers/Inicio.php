<?php
    class Inicio extends CI_Controller{


        public function __construct() {
        
            parent::__construct(); 
            $this->load->model("Alojamiento_model");

        }

        public function index() {

            if(isset($this->session->userdata['logged_in'])){
                
            }
            else{
                 
                // $this->load->view("inicio/header");

                // $this->load->view("inicio/inicio_view");

                $this->load->view("inicio/footer");
            }
          
        }


        public function getCiudades(){
            $resultado= $this->Alojamiento_model->localidades();
            echo json_encode($resultado);
        }

    }

?>