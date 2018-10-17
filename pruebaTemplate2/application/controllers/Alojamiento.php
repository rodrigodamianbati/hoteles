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
        //{"success":true}
        /*$estado = array('success' => true );

        $estado_encode = json_encode($estado);
        echo $estado_encode;*/

        /*      $config['upload_path']          = base_url().'fotos_alojamientos';
                                        
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                print_r($_FILES);
                die();

                $foto= $_POST['qqfile'];
                
                if ( ! $this->alojamiento->subir($foto))
                {
                        $estado = array('error' => $this->alojamiento->display_errors());

                        
                }
                else
                {
                        $estado = array('success' => true );
                }
                echo $estado;*/
                //print_r($_FILES);
		//$this->load->library("upload");
		$config['upload_path']          = base_url().'fotos_alojamientos';
                                        
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
		//$variablefile= $_FILES;


		//$_FILES['qqfile']['name'] = $variablefile['qqfile']['name'];
		//$_FILES['qqfile']['type'] = $variablefile['qqfile']['type'];
		//$_FILES['qqfile']['tmp_name'] = $variablefile['qqfile']['tmp_name'];
		//$_FILES['qqfile']['error'] = $variablefile['qqfile']['error'];
        //$_FILES['qqfile']['size'] = $variablefile['qqfile']['size'];
        
        $this->load->library('upload', $config);
        //$this->upload->initialize($config);
        //print_r($_FILES["qqfile"]["name"]);
        //die();
       
        

		if ($this->upload->do_upload($_FILES['qqfile'])) {
			$estado = array('success' => true );
		}
		else{
            $estado = array('success' => false );
            $error = array('error' => $this->upload->display_errors()); 
            print_r($error);
        }
        
        $estado_encode = json_encode($estado);
        echo $estado_encode;
    }
}
?>