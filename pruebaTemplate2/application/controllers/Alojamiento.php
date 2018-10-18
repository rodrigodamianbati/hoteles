<?php

class Alojamiento extends CI_Controller{

    public function __construct() {
        
        parent::__construct(); 
         
        $this->load->helper(array('form', 'url'));
         
        $this->load->model("Alojamiento_model");
         
        $this->load->library("session");

        //$this->load->library('upload');

    }

    public function index(){
        
        /*
        if(!isset($this->session->userdata['logged_in'])){
            redirect('login');
        }
        */
        $tipos = $this->tipos();
        

        $this->load->view("alta_alojamiento_view", $tipos);

    }

    public function alta(){
        
    }

    public function tipos(){

        $consulta['tipos']=$this->Alojamiento_model->tipos();
    
        return $consulta;
    }

    public function subir_foto(){
        
		$config['upload_path']          = '/var/www/html/pruebaTemplate2/fotos_alojamientos/';
        
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('qqfile')) {

            $estado = array('error' => $this->upload->display_errors() );
            
            http_response_code(500);
		}
		else{
            $estado = array('success' => true );
        }
        
        $estado_encode = json_encode($estado);
    
        echo $estado_encode;
    }
}
?>