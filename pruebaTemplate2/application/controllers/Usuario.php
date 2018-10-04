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
         
        //array asociativo con la llamada al metodo
        //del modelo
        $usuario["ver"]=$this->Usuario_model->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("Usuario_view",$usuario);
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

    //controlador para añadir
    public function registrar(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo agregar
        $agregar=$this->Usuario_model->agregar(
                $this->input->post("email"),
                $this->input->post("contraseña"),
                $this->input->post("nombre"),
                $this->input->post("apellido"),
                $this->input->post("fecha_nacimiento")
                );
        }
        if($agregar==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Usted se ha registrado correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Usted se ha registrado correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url());
    }
    
    public function registro(){
        $this->load->view("registro");
    }

    //controlador para modificar al que 
    //le paso por la url un parametro
    public function mod($id){
        if(is_numeric($id)){
          $datos["mod"]=$this->Usuario_model->mod($id);
          $this->load->view("Modificar_view",$datos);
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
}
?>