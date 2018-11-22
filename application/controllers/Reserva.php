<?php

class Reserva extends CI_controller{


    public function __construct(){
        parent::__construct();

        $this->load->model("Alojamiento_model");

    }

    public function index() { 
        

        $idAloj = $id_alojamiento=$_GET['idAloj'];
        
        if(isset($this->session->userdata['logged_in'])){
            $this->load->view("realizar_reserva_view", $idAloj);
        }
        else{
            $this->load->view("login");
        }
         
        // $this->load->helper("url");  
         
        // $this->load->model("Usuario_model");
         
        // $this->load->library("session"); 
     } 

    private function diferenciaDias($inicio, $fin)
        {
            $inicio = strtotime($inicio);
            $fin = strtotime($fin);
            $dif = $fin - $inicio;
            $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
            return ceil($diasFalt);
        }

     

      function generar_reserva() {

        $cantDias=$this->diferenciaDias($this->input->post("fecha-desde"), $this->input->post("fecha-hasta"));
        // echo $cantDias;

        $id_alojamiento=$_GET['id'];

        $alojamiento= $this->Alojamiento_model->obtener_alojamiento($id_alojamiento);

        //  $consultar=$this->Alojamiento_model->estado_alojamiento($id_alojamiento);
         if (($alojamiento->id_estado == 3) || ($alojamiento->id_estado == 2)) { //3 = reservado

         }
         else{
            $precioTotal = ($cantDias*$alojamiento->precio);
            //date() 
            //id estado 1


            $this->db->Alojamiento_model->reservar($precioTotal, date(), $this->input->post("fecha-desde"), $this->input->post("fecha-hasta"), 1,
            $id_alojamiento, $_SESSION['id'] );
         }
        
     }

    }
       
     



?>