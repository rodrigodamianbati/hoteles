<?php
               
               //extendemos CI_Model
class Alojamiento_model extends CI_Model{
        /*
        $this->db->from('alojamiento as a');
        $this->db->join('estado_aloj as ea','a.id_estado=ea.id');
        $this->db->join('servicio_aloj as sa','a.id=sa.id_alojamiento');
        $this->db->join('servicio as s','s.id=sa.id_servicio');
        $this->db->join('tipo_aloj as ta','a.id_tipo=ta.id');
        $this->db->join('foto_alojamiento as fa','a.id=fa.id_alojamiento');
        */
        //private $estado = 'Estado_model';
        //private $servicios;



    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 

        //$this->load->model('Estado_model');
        $this->load->model('Alojamiento_model');
        
    }

    public function index(){

    }

    
    
    public function agregar($tipo, $precio, $id_localidad, $direccion_nombre, $direccion_numero){
        $consulta=$this->db->query("SELECT id FROM alojamiento WHERE (direccion_nombre='$direccion_nombre' AND direccion_numero='$direccion_numero')");
        if($consulta->num_rows()==0){
            //$id=$_SESSION['id'];
            $consulta=$this->db->query("INSERT INTO alojamiento VALUES(NULL, '$precio','$id_localidad','$direccion_nombre','$direccion_numero', NULL, '1'/*sesion*/, '$tipo', '/pruebaTemplate2/fotos_alojamientos/default.png');");
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
                $default=$this->db->query("SELECT default_foto FROM alojamiento a WHERE a.id='$id_alojamiento';");
                //print_r($default->first_row()->default_foto);
                //die();
                if (strpos($default->first_row()->default_foto,"default")){
                    $nuevoDefualt=$this->db->query("UPDATE alojamiento a SET default_foto = '$path' WHERE a.id='$id_alojamiento'");
                }
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

    /*
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
    } */

    public function alojamientos($limite){
        
        //$consulta = $this->db->query("SELECT * FROM alojamiento;");
        $consulta= $this->db->get('alojamiento', $limite, $this->uri->segment(3));
        
        //foreach ($consulta->result('Alojamiento_model') as $row) {
        $this->db->select("a.id, e.descripcion as estado, t.descripcion as tipo, a.default_foto as foto, a.precio, l.nombre as localidad");
        $this->db->from("alojamiento a");
        $this->db->join("estado_aloj e", "a.id_estado = e.id");
        $this->db->join("tipo_aloj t", "a.id_tipo = t.id");
        $this->db->join("localidad l", "a.id_localidad = l.id");

        $consulta= $this->db->get('alojamiento', $limite, $this->uri->segment(3));
        //return $this->db->get()->custom_result_object("Alojamiento_model");
        return $consulta->custom_result_object("Alojamiento_model");
    }
        //}
        //$row->id = $row->id; // call attributes
            /*
            $row->id = $row->id;
            $row->precio = $row->precio;
            $row->id_localidad = $row->localidad($row->id_localidad);
            $row->direccion_nombre = $row->direccion_nombre;
            $row->direccion_numero = $row->direccion_numero;
            $row->id_estado = $row->estado($row->id_estado);
            $row->id_usuario = $row->usuario($row->id_usuario);
            $row->id_tipo = $row->tipo($row->id_tipo);
            $row->default_foto = $row->default_foto;
            */
            //print_r($row);
            //die();
        //////////////////////////////////////////////////////////////////////////////

        //print_r($consulta->result('Alojamiento_model'));
        //die();

        /*
        foreach ($consulta->result('Alojamiento_model') as $row) {
            //$row->id = $row->id; // call attributes
            print_r($consulta);
            die();
        }

        print_r($consulta->result());
        die();
        */

       // return $consulta->result('Alojamiento_model');
    //}
    /*   $query = $this->db->query("SELECT * FROM users;");
   
    foreach ($query->result('User') as $row)
    {
        echo $row->name; // call attributes
        echo $row->reverse_name(); // or methods defined on the 'User' class
    }
    */

    
    public function localidad($id_localidad){
        $consulta = $this->db->query("SELECT * FROM localidad l WHERE l.id='$id_localidad';");
        return $consulta->result();
    }

    public function estado($id_estado){
        $consulta = $this->db->query("SELECT * FROM estado_aloj ea WHERE ea.id='$id_estado'");
        return $consulta->result();
    }

    public function usuario($id_usuario){
        $consulta = $this->db->query("SELECT * FROM usuario u WHERE u.id='$id_usuario'");
        return $consulta->result();
    }

    public function tipo($id_tipo){
        $consulta = $this->db->query("SELECT * FROM tipo_aloj t WHERE t.id='$id_tipo'");
        return $consulta->result();
    }
}

?>