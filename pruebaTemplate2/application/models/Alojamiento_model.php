<?php
               
               //extendemos CI_Model
class Alojamiento_model extends CI_Model{

    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
        
    }

    public function index(){

    }

    public function agregar(){
        $consulta=$this->db->query("SELECT id FROM alojamiento WHERE (direccion_nombre='$direccion_nombre' AND direccion_numero='$direccion_numero')");
        if($consulta->num_rows()==0){
            $sesion=$_SESSION['id'];
            $consulta=$this->db->query("INSERT INTO alojamiento VALUES(NULL, '$precio','$direccion_nombre','$direccion_numero', NULL, '$session'/*sesion*/, '$tipo');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function tipos(){

        $this->db->select('descripcion');
        $consulta= $this->db->get('tipo_aloj');
    return $consulta->result();
    }
}



?>