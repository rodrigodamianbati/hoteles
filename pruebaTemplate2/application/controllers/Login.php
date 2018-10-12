<?php

class Login extends CI_Controller{

    public function __construct() {
        
        parent::__construct(); 
         
        $this->load->helper("url");  
         
        $this->load->model("Usuario_model");
         
        $this->load->library("session");
    }
     
    public function index(){
        //cargo la vista y le paso los datos
        $this->load->view("login");
    }

    public function iniciar_sesion($email, $contraseña){
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
            //verifico que se trate del usuario correcto
            $identificar=$this->Usuario_model->esUsuario(
                    $this->input->post("email"),
                    $this->input->post("contraseña")
                    );
            }
            if($identificar==true){
                //Sesion de una sola ejecución
                $this->session->set_flashdata('correcto', 'Usted ha iniciado sesion correctamente');
            }else{
                $this->session->set_flashdata('incorrecto', 'Usted no se ha iniciado sesion correctamente');
            }
            //recargo la pagina
            redirect();
    }

    public function cerrar_sesion(){
        
    }
}
?>