<?php
               //extendemos CI_Model
class Usuario_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct(); 
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM usuario;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($email,$contraseña,$nombre,$apellido,$dni,$fecha_nacimiento){
        $consulta=$this->db->query("SELECT email FROM usuario WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO usuario VALUES(NULL,'$dni','$nombre','$apellido','$email','$contraseña','$fecha_nacimiento');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function  agregar($email,$contraseña,$nombre,$apellido, $fecha_nac, $dni, $id_localidad, $telefono1, $telefono2, $rol){
        $consulta=$this->db->query("SELECT email FROM usuario WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO usuario VALUES(NULL, '$dni','$nombre','$apellido','$email','$contraseña', '$fecha_nac', '$telefono1', '$telefono2', $id_localidad, $rol);");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
        }else{
            return false;
        }  
    }
     
    public function mod($id,$modificar="NULL",$email="NULL",$contraseña="NULL",$nombre="NULL",$apellido="NULL",$fecha_nacimiento="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM usuario WHERE id=$id");
            return $consulta->result();
        }else{
          $consulta=$this->db->query("
              UPDATE usuario SET email='$email', contraseña='$contraseña',
              nombre='$nombre', apellido='$apellido' WHERE id=$id;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }

    //VER DESPUES si se puede usar la funcion anterior
    public function modificarUsuario($id, $nombre, $apellido, $dni, $fechaNac, $email){
       // $data  =  array ( 'nombre'  =>  $nombre , 'apellido'  =>  $apellido , 'dni'  =>  $dni , 'fecha_nacimiento'  =>  $fechaNac ,'email'  =>  $email);

       $this->db->set('nombre', $nombre);
       $this->db->set('apellido', $apellido);
       $this->db->set('dni', $dni);
       $this->db->set('fecha_nacimiento', $fechaNac);
       $this->db->set('email', $email);
       $this->db->where('id', $id);
      return  $this->db->update('usuario');
        
    }
     
    public function eliminar($id){
    //    $consulta=$this->db->query("DELETE FROM usuario WHERE id=$id");

        $this->db->where('id', $id);
        $this->db->delete('usuario');
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
    public function estaRegistrado($email, $contraseña){
       
        $this->db->select('id, id_rol');
        $this->db->where('email',$email);
        $this->db->where('contraseña',$contraseña);
        $consulta= $this->db->get('usuario');
        
        if($consulta->num_rows()>0){
            return $consulta->first_row();
        }else{
            return null;
        }
    }

     public function getUsuario($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $consulta= $this->db->get('usuario');
        return $consulta->result();

    }


    public function getRol($id_rol)
    {
        $this->db->select('nombre');
        $this->db->where('id',$id_rol);
        $consulta= $this->db->get('rol');
        return $consulta->first_row();

    }

    public function modificarContraseña($id, $contraseña){
        $this->db->set('contraseña', $contraseña);
        $this->db->where('id', $id);
       return  $this->db->update('usuario'); 
    }


    


    public function roles(){
        $this->db->select('*');
        $consulta= $this->db->get('rol');
         return $consulta->result();
    }


    public function id_rol_de_usuario($rol){
        $this->db->select('id');
        $this->db->where('nombre', $rol);
        $consulta=$this->db->get('rol');
        return $consulta->result();

    }

 
}
?>