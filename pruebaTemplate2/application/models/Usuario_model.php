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

    public function agregar($email,$contraseña,$nombre,$apellido){
        $consulta=$this->db->query("SELECT email FROM usuario WHERE email LIKE '$email'");
        if($consulta->num_rows()==0){
            $consulta=$this->db->query("INSERT INTO usuario VALUES(NULL, NULL,'$nombre','$apellido','$email','$contraseña', NULL, NULL, NULL, NULL, NULL);");
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
     
    public function eliminar($id){
       $consulta=$this->db->query("DELETE FROM usuario WHERE id=$id");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
    public function esUsuario($email, $contraseña){
        $consulta=$this->db->query("SELECT FROM usuario WHERE (email='$email' AND contraseña='$contraseña')");
        if($consulta==true){
            return true;
        }else{
            return false;
        }
    }
 
}
?>