<?php
               
               //extendemos CI_Model
class Alojamiento_model extends CI_Model{

    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
        
    }

    public function index(){

    }

    public function tipos(){

        $this->db->select('descripcion');
        $consulta= $this->db->get('tipo_aloj');
    return $consulta->result();
    }
}



?>