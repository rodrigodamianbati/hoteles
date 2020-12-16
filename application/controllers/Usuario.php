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
        $this->load->model("Alojamiento_model");
        $this->load->model("Chat");
        $this->load->model("Mensaje");
        //cargo la libreria de sesiones
        $this->load->library("session");
        

    }
     
    //controlador por defecto
    public function index(){
        
        if(!isset($this->session->userdata['logged_in'])){
            redirect('login');
        }

        else{
            if($this->session->userdata['rol'] == 'administrador'){
            // array asociativo con la llamada al metodo del modelo
                 $usuario["ver"]=$this->Usuario_model->ver();
                // // cargo la vista y le paso los datos
                 $this->load->view("usuario_view",$usuario);
            }else{
                redirect('inicio');
            }
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
                        redirect('inicio');
                        //echo "Usuario agregado con exito lpmqlp";
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
        
        if(isset($this->session->userdata['logged_in'])){

            $this->session->set_flashdata('ultima_url', current_url());
            
            if($this->session->userdata['rol'] == 'administrador'){
                $provincias['prov'] = $this->Alojamiento_model->provincias();
                $localidades['loc'] = $this->Alojamiento_model->localidades(); 
                $roles['rol']=$this->Usuario_model->roles();
                // array asociativo con la llamada al metodo del modelo
//$usuario["ver"]=$this->Usuario_model->ver();
                    // // cargo la vista y le paso los datos
                    $data = array_merge($provincias, $localidades,$roles);
                    $this->load->view("usuario/alta_usuario", $data);
                }
        }else{
            redirect('inicio');
        }
        
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
        //print_r("modificar usuario");
        //die();
       if($this->input->is_ajax_request()){
            $id=$_POST['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $dni=$_POST['dni'];
            $fecNac=$_POST['fechaNacimiento'];
            $email=$_POST['email'];

            //print_r($_POST);
            //die();
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
        $id_usuario = $_SESSION['id'];
        $usuario = $this->Usuario_model->getUsuario($id_usuario);
        $chats = $this->Chat->misChats($id_usuario);
        $data['usuario'] = $usuario;
        $data['chats'] = $chats;
        $this->load->view("inicio/head");
                    
        $this->load->view("usuario/usuario_top_nav.php");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("chat_view", $data);
        $this->load->view("inicio/footer");
        //echo json_encode($data);
    }
    
    public function mensajes(){
        //echo json_encode($_POST);
        $id_chat = $_POST['id_chat'];
        //print_r($id_chat);
        $mensajesDelChat = $this->Mensaje->mensajes($id_chat);
        $mensajesDelChat['id_session'] = $_SESSION['id'];
        echo json_encode($mensajesDelChat);
        //$response = array('status' => 'OK');
        //Content-Type: application/javascript
        //$data = json_decode($_POST);
        //$this->input->raw_input_stream;

        //$data = $_POST['id_chat'];
        //print_r($data);
        //echo json_encode($data);
        /*
        $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($data))
        ->_display();
        //, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
        exit;*/   
    }

    public function nuevo_mensaje(){
        //echo json_encode($_POST);
        //die();
//print_r($_POST['id_chat']);
       // die();
       //print_r($_POST);
       //die();
        $id_chat = $_POST['id_chat'];
        $id_usuario_envia = $_SESSION['id'];
        $texto = $_POST['texto'];
        $nuevoMensaje = $this->Mensaje->nuevoMensaje($id_chat, $id_usuario_envia, $texto);
        echo json_encode($nuevoMensaje);
    }

    public function lugares(){
        //$this->load->library('pagination');
        $id = $_SESSION['id'];
        //$config['total_rows'] = $this->total_mis_reservas($id);
        //$config['base_url'] = base_url().'alojamiento/mis_reservas';

        //$config = $this->configurarPaginado($config);
        //$this->pagination->initialize($config);
        //$data['products'] = $this->reservas($config['per_page'], $id);
        $data['products'] = $this->Alojamiento_model->misLugaresVisitados();
        //mis_reservas

        //print_r($data);
        //die();
        $this->load->view("usuario/usuario_head");
       
        $this->load->view("usuario/usuario_top_nav");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("usuario/lugares", $data);
        $this->load->view("usuario/usuario_footer");
    }
}
?>