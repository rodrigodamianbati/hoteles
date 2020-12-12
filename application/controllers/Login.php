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
        
        //si el usuario se encuentra logueado se redirecciona a su perfil o home o lo que sea
        //$this->session->flashdata('registro');
        //print_r($this->session->flashdata('ultima_url'));
        //die();
        if(isset($this->session->userdata['logged_in'])){
            if($this->session->flashdata('ultima_url') != ""){
               // print_r("entro");
                //die();
                redirect($this->session->flashdata('ultima_url'));
            }else{
                //print_r("no entro");
                redirect('inicio');
            }
            
        }else{
            $this->load->view("login");
        }
        
    }

    public function seguridad(){
        if(isset($this->session->userdata['logged_in'])){
            redirect('usuario');
        }else{
            $this->load->view("login");
        }
    }

    
    public function iniciar_sesion(){
        if($this->input->post("submit")){
         
                $usuario=$this->Usuario_model->estaRegistrado(
                    $this->input->post("email"),
                    $this->input->post("contraseña")
                    );
            }
            if($usuario!=null){
                
                $this->session->set_flashdata('correcto', 'Usted ha iniciado sesion correctamente');

                $rol = $this->Usuario_model->getRol($usuario->id_rol);
                $nuevaSesion = array(
                    'id' => $usuario->id,
                    'email'  => $this->input->post("email"),
                    'logged_in' => TRUE,
                    'rol' => $rol->nombre
                );
                $this->session->set_userdata($nuevaSesion);
                //print_r($this->session->flashdata('ultima_url'));
                //die();
                if($this->session->flashdata('ultima_url') != ""){
                   // print_r($this->session->flashdata('ultima_url'));
                    //die();
                     redirect($this->session->flashdata('ultima_url'));
                 }else{
                    // print_r("no entro");
                     //die();
                     redirect('inicio');
                 }
                 
            }else{
                $this->session->set_flashdata('incorrecto', 'Usted no se ha iniciado sesion correctamente');
                redirect();
            }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();
        redirect('inicio');
    }

    /*
    public function iniciar_sesion(){
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
            //verifico que se trate del usuario correcto
            // $id=$this->Usuario_model->id(
            //         $this->input->post("email"),
            //         $this->input->post("contraseña")
            //         );
            // }
            // if($id!=null){

                //Sesion de una sola ejecución
                // $this->session->set_flashdata('correcto', 'Usted ha iniciado sesion correctamente');


                // $nuevaSesion = array(
                //     'id' => $id,
                //     'email'  => $email,
                //     'logged_in' => TRUE
                // );
 

                $usuario=$this->Usuario_model->estaRegistrado(
                    $this->input->post("email"),
                    $this->input->post("contraseña")
                    );
            }
            if($usuario!=null){
                
                //Sesion de una sola ejecución
                $this->session->set_flashdata('correcto', 'Usted ha iniciado sesion correctamente');

            
                $rol = $this->Usuario_model->getRol($usuario->id_rol);

                // print_r($rol);
                // die();

                $nuevaSesion = array(
                    'id' => $usuario->id,
                    'email'  => $this->input->post("email"),
                    'logged_in' => TRUE,
                    'rol' => $rol->nombre
                );


                // print_r($nuevaSesion);
                // die();
                $this->session->set_userdata($nuevaSesion);
                //$url
                //redirect($url);
                redirect('inicio');
            }else{
                $this->session->set_flashdata('incorrecto', 'Usted no se ha iniciado sesion correctamente');
                redirect();
            }
    }

    public function cerrar_sesion(){
        $this->session->sess_destroy();
        redirect('inicio');
    }*/
}
?>