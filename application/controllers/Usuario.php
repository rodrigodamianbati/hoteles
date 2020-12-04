<?php
                        //extendemos CI_Controller
class Usuario extends CI_Controller{

    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //llamo al helper url
        $this->load->helper("url");  
         
        //llamo o incluyo el modelo
        $this->load->model("Usuario_model");
         
        //cargo la libreria de sesiones
        $this->load->library("session");

    }
     
    //controlador por defecto
    public function index(){
        
        if(!isset($this->session->userdata['logged_in'])){
            redirect('login');
        }

        else{
            // array asociativo con la llamada al metodo del modelo
            
                 $usuario["ver"]=$this->Usuario_model->ver();
                
                // // cargo la vista y le paso los datos
                 $this->load->view("usuario_view",$usuario);
            
        }
        
    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->Usuario_model->add(
                $this->input->post("email"),
                $this->input->post("contraseña"),
                $this->input->post("nombre"),
                $this->input->post("apellido"),
                $this->input->post("dni"),
                $this->input->post("fecha_nacimiento")
                );
        }


      
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usuario añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usuario añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url());
    }


    public function esAdministrador(){
        if((isset($this->session->userdata['logged_in'])) && ($this->session->userdata['rol']=="administrador") ){
            return true;
        }
        else{
            return false;
        }
    }

    //controlador para añadir
    public function registrar(){

        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
            
            if(!$this->esAdministrador()){
                $rol=2;
            }
            else{
                $rol=  $this->input->post("rol");
            }

                // echo $rol;
                //llamo al metodo agregar como admin
                $agregar=$this->Usuario_model->agregar(
                    $this->input->post("email"),
                    $this->input->post("contraseña"),
                    $this->input->post("nombre"),
                    $this->input->post("apellido"),
                    $this->input->post("fecha-nac"),
                    $this->input->post("dni"),
                    $this->input->post("localidad"),
                    $this->input->post("telefono1"),
                    $this->input->post("telefono2"),
                    $rol
                   
                
                );
                
                if(($agregar==true)){
                    if($this->esAdministrador()){
                        echo "Usuario agregado con exito lpmqlp";
                    }
                    else{

                        if(!isset($this->session->userdata['logged_in'])){
                            $this->session->set_flashdata('registro', 'ok');
                            redirect('login');
                        }
                        //echo "Se a registrado correctamente";
                    }
                    
                }
                else{
                    if($this->esAdministrador()){
                        echo "No se pudo agregar el usuario";
                    }
                    else{
                        echo "No ha podido registrarse en el sistema";
                    }
                    
              }

        }
        

}



    public function registro(){
        $this->load->view("registro");
    }

    
    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id){
        if(is_numeric($id)){
          $datos["mod"]=$this->Usuario_model->mod($id);
          $this->load->view("modificar_view",$datos);
          if($this->input->post("submit")){
                $mod=$this->Usuario_model->mod(
                        $id,
                        $this->input->post("submit"),
                        $this->input->post("email"),
                        $this->input->post("contraseña"),
                        $this->input->post("nombre"),
                        $this->input->post("apellido"),
                        $this->input->post("fecha_nacimiento"),
                        $this->input->post("dni")
                        );
                if($mod==true){
                    //Sesion de una sola ejecución
                    $this->session->set_flashdata('correcto', 'Usuario modificado correctamente');
                }else{
                    $this->session->set_flashdata('incorrecto', 'Usuario modificado correctamente');
                }
                redirect(base_url());
            }
        }else{
            redirect(base_url()); 
        }
    }


     public function modificarUsuario()
    {

        
      
       if($this->input->is_ajax_request()){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $dni=$_POST['dni'];
            $fecNac=$_POST['fechaNacimiento'];
            $email=$_POST['email'];

            $this->Usuario_model->modificarUsuario( $id, $nombre, $apellido, $dni, $fecNac, $email);
         
            return 1;
       }
    }


    public function eliminarUsuario(){
        if($this->input->is_ajax_request()){
            $id=$_POST['id'];


            $this->Usuario_model->eliminar($id);
         
            return 1;
       } 
    }




     
    //Controlador para eliminar
    public function eliminar($id){
        if(is_numeric($id)){
          $eliminar=$this->Usuario_model->eliminar($id);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', 'Usuario eliminado correctamente');
          }else{
              $this->session->set_flashdata('incorrecto', 'Usuario eliminado correctamente');
          }
          redirect(base_url());
        }else{
          redirect(base_url());
        }
    }


    public function administrar_contrasenias(){
        $usuario["ver"]=$this->Usuario_model->ver();
        $this->load->view("usuario/tabla_contrasenias", $usuario);
    }


    public function cambiarContrasenia(){

        if($this->input->is_ajax_request()){
            $id=$_POST['id'];
            $contrasenia= $_POST['contrasenia'];


            $this->Usuario_model->modificarContraseña($id, $contrasenia);
         
            return 1;
       }

    }

    public function chat(){
        
        $this->load->view("inicio/head");
                    
        $this->load->view("usuario/usuario_top_nav.php");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("chat_view");
        $this->load->view("inicio/footer");
    }
    
}
?>