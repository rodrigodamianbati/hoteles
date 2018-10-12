<?php

class Login extends CI_Controller{

    public function __construct() {
        
        parent::__construct(); 
         
        $this->load->helper("url");  
         
        $this->load->model("Usuario_model");
         
        $this->load->library("session");

        if (isset($_SESSION['email'])){
            redirect('usuario');
        }
    }
     
    public function index(){
        //cargo la vista y le paso los datos
        /////////////////////////////////////cambiar logged_in por el nombre del array y probar si es eso
    
        if ($this->session->userdata('logged_in'== FALSE)) {
            redirect('login');
        }else{
            redirect('usuario');
        }
        $this->load->view("login");
    }

    public function iniciar_sesion(){
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

                $nuevaSesion = array(
                    'email'  => $email,
                    'logged_in' => TRUE
                );
 
                $this->session->set_userdata($nuevaSesion);
                
                redirect('usuario');
            }else{
                $this->session->set_flashdata('incorrecto', 'Usted no se ha iniciado sesion correctamente');
                redirect();
            }
    }

    public function cerrar_sesion(){
        session_destroy();
        redirect('login');
    }
}
?>