<?php

class Buscador extends CI_Controller {


    public function __construct() {

        parent::__construct();
        $this->load->model('Alojamiento_model');
    }

    public function index(){

    }

    public function buscador() {

        $this->load->library('pagination');
        
        $config['base_url'] = base_url().'buscador/listado';
        $config['total_rows'] = $this->totalFilas();
        $config['per_page'] = 5;

        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';

        $config['first_tag_open'] = '<li>';
        $config['last_tag_open'] = '<li>';

        $config['next_tag_open'] = '<li>';
        $config['prev_tag_open'] = '<li>';

        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '</li>';

        $config['next_tag_close'] = '</li>';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li><span><b>';
        $config['cur_tag_close'] = '</b></span></li>';

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
}

?>