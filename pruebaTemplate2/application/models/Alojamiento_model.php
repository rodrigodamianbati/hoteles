<?php
               
               //extendemos CI_Model
class Alojamiento_model extends CI_Model{

    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
        
    }

    public function index(){

    }

    
    
    public function agregar($tipo, $precio, $id_localidad, $direccion_nombre, $direccion_numero){
        $consulta=$this->db->query("SELECT id FROM alojamiento WHERE (direccion_nombre='$direccion_nombre' AND direccion_numero='$direccion_numero')");
        if($consulta->num_rows()==0){
            //$id=$_SESSION['id'];
            $consulta=$this->db->query("INSERT INTO alojamiento VALUES(NULL, '$precio','$id_localidad','$direccion_nombre','$direccion_numero', NULL, '1'/*sesion*/, '$tipo');");
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

        $this->db->select('*');
        $consulta= $this->db->get('tipo_aloj');

    return $consulta->result();
    }

    public function localidades(){

        $this->db->select('*');
        $consulta= $this->db->get('localidad');
    return $consulta->result();
    }

    public function nuevaFoto($id_alojamiento, $path){
        
            //$id=$_SESSION['id'];id	foto_url	id_alojamiento
            $consulta=$this->db->query("INSERT INTO foto_alojamiento VALUES(NULL,'$path','$id_alojamiento');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
       
    }  

    public function id_alojamiento($direccion_nombre, $direccion_numero){
        $consulta=$this->db->query("SELECT id FROM alojamiento WHERE (direccion_nombre='$direccion_nombre' AND direccion_numero='$direccion_numero');");
        //print_r($consulta->first_row());
        //die();
    return $consulta->first_row();
    }

    public function totalAlojamientos(){
        return $this->db->get('alojamiento')->num_rows();
    }

    public function alojamientos($limite){
        //$consulta=$this->db->query("SELECT * FROM alojamiento a JOIN servicio_aloj sa ON (a.id=sa.id_alojamiento) JOIN estado_aloj ea ON (a.id=ea.id_alojamiento) JOIN foto_alojamiento fa ON (a.id=fa.id_alojamiento)");
        $this->db->select('*');
        $this->db->from('alojamiento as a');
        $this->db->join('estado_aloj as ea','a.id_estado=ea.id');
        $this->db->join('servicio_aloj as sa','a.id=sa.id_alojamiento');
        $this->db->join('servicio as s','s.id=sa.id_servicio');
        $this->db->join('tipo_aloj as ta','a.id_tipo=ta.id');
        $this->db->join('foto_alojamiento as fa','a.id=fa.id_alojamiento');
        //SELECT * FROM alojamiento a 
        //JOIN estado_aloj ea ON (a.id_estado=ea.id) 
        //JOIN servicio_aloj sa ON (a.id=sa.id_alojamiento) 
        //JOIN servicio s ON (s.id=sa.id_servicio) 
        //JOIN tipo_aloj ta ON (a.id_tipo=ta.id) 
        //JOIN foto_alojamiento fa ON (a.id=fa.id_alojamiento);
        $consulta= $this->db->get('alojamiento', $limite, $this->uri->segment(3));
        //--------------------->CASTEAR OBJETOS
        return $consulta->result();
    }
    
    public function alojamiento(){
        
    }
}

?>