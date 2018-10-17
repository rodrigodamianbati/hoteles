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
        $this->load->view("alta_alojamiento_view");

    }

    public function subir(){
        
		$config['upload_path']          = '/var/www/html/pruebaTemplate2/fotos_alojamientos/';
        
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
        
        $this->load->library('upload', $config);
        
		if (!$this->upload->do_upload('qqfile')) {
            $estado = array('success' => false );
            $error = array('error' => $this->upload->display_errors()); 
            print_r($error);
		}
		else{
            $estado = array('success' => true );
        }
        
        $estado_encode = json_encode($estado);
        echo $estado_encode;
    }
}
?>