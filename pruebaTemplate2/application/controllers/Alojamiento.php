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
        $localidades = $this->localidades();

        $data = array_merge($tipos, $localidades);
        
        $this->load->view("alta_alojamiento_view", $data);

    }

    public function tipos(){

        $consulta['tipos']=$this->Alojamiento_model->tipos();
    
        return $consulta;
    }

    public function localidades(){

        $consulta['localidades']=$this->Alojamiento_model->localidades();
    
        return $consulta;
    }

    
    /////////////////////////////////////---------ALTA-ALOJAMIENTO
    public function alta(){
        if($this->input->post("submit")){
         
            //llamo al metodo agregar
            $agregar=$this->Alojamiento_model->agregar(
                    $this->input->post("tipo"),
                    $this->input->post("precio"),
                    $this->input->post("id_localidad"),
                    $this->input->post("direccion_nombre"),
                    $this->input->post("direccion_numero")
                    );
            }
            if($agregar==true){
                //Sesion de una sola ejecución
                $this->session->set_flashdata('correcto', 'Usted se ha registrado correctamente');
                $data = $this->id_alojamiento($this->input->post("direccion_nombre"),$this->input->post("direccion_numero"));
                //print_r($idalojamiento);
                //die(); <--------------------------------------------------------acaaaaaaaaaaaaaaaaaaaaaaaa va la prueba
                $this->load->view("alta_alojamiento_fotos_view", array('id_alojamiento' => $data));
                
            }else{
                $this->session->set_flashdata('incorrecto', 'Usted se ha registrado correctamente');
            }
            //redirecciono la pagina a la url por defecto
            
    }

    private function id_alojamiento($direccion_nombre, $direccion_numero){
        return $this->Alojamiento_model->id_alojamiento($direccion_nombre, $direccion_numero);
    }
    ///////////////////////////////////////////////////////////


    ///////////////////////////////////-------SUBIDOR-DE-FOTOs
    public function subir_foto(){
        
		$config['upload_path']          = '/var/www/html/pruebaTemplate2/fotos_alojamientos/';
        
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        //$new_name = time().$_FILES["userfiles"]['name'];
        $numRandom = rand();
        $numRandom1 = rand();
        $nombre = $numRandom.$numRandom1.$_FILES['qqfile']['name'];
        $config['file_name'] = $nombre;
        
        $this->load->library('upload', $config);


		if (!$this->upload->do_upload('qqfile')) {

            $estado = array('error' => $this->upload->display_errors() );
            
            http_response_code(500);
		}
		else{
            
            $path = '/var/www/html/pruebaTemplate2/fotos_alojamientos/'.$nombre;
            
            $id = $_GET['id'];

            //print_r($_GET['id']);
            //die();
    
            $this->nuevoPathFoto($id, $path);
            $estado = array('success' => true );
            
        }
        
        $estado_encode = json_encode($estado);
    
        echo $estado_encode;
    }

    private function nuevoPathFoto($id_alojamiento, $path){
        $this->Alojamiento_model->nuevaFoto($id_alojamiento, $path);
    }
    ////////////////////////////////////////////////////////////


    /////////////////////////////////////////////////////////////////Buscador

    public function buscador() {

        $this->load->library('pagination');
        
        $config['base_url'] = base_url().'alojamiento/buscador';
        $config['total_rows'] = $this->totalFilas();
        $config['per_page'] = 9;

        /*
        $config['full_tag_open'] = '<nav aria-label="Page navigation example"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_tag_open'] = '<li class="page-item"><a class="page-link">';
        //<a class="page-link">3</a>
        $config['last_tag_open'] = '<li class="page-item"><a class="page-link">';

        $config['next_tag_open'] = '<li class="page-item"><a class="page-link">';
        $config['prev_tag_open'] = '<li class="page-item"><a class="page-link">';

        $config['num_tag_open'] = '<li class="page-item"><a class="page-link">';
        $config['num_tag_close'] = '</a></li>';

        $config['first_tag_close'] = '</a></li>';
        $config['last_tag_close'] = '</a></li>';

        $config['next_tag_close'] = '</a></li>';
        $config['prev_tag_close'] = '</a></li>';

        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link" active>';
        $config['cur_tag_close'] = '</a></li>';

        //$config['num_links'] = 10;
        //$config['uri_segment'] = 3;
        */
        $config['full_tag_open'] = "<ul class='pagination'>";
    $config['full_tag_close'] ="</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['first_link'] = 'Primero';
    $config['last_link'] = 'Ultimo';
        $data['products'] = $this->alojamientos($config['per_page']);

        $this->pagination->initialize($config);

        $this->load->view('buscador_resultado', $data);
    }


    public function totalFilas(){
        return $this->Alojamiento_model->totalAlojamientos();
    }

    private function alojamientos($limite){
        return $this->Alojamiento_model->alojamientos($limite);
    }

    /////////////////////////////////////////////////////////////////////////
}
?>