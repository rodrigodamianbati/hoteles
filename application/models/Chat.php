<?php

class Chat extends CI_Model{

    public function __construct()
    {
        //llamamos al constructor de la clase padre
        parent::__construct();
        //$this->load->model('Estado_model');
        $this->load->model('Chat');
        $this->load->model('Mensaje');
    }

    public nuevoChat($id_dueño, $id_cliente, $id_reserva){
        $consulta = $this->db->query("SELECT id FROM chat WHERE (id_dueño='$id_dueño' AND id_cliente='$id_cliente')");
        if ($consulta->num_rows() == 0) {
            //$id=$_SESSION['id'];
            $consulta = $this->db->query("INSERT INTO chat VALUES(NULL, $id_dueño, $id_cliente,$id_reserva");

            if ($consulta == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public misMensajes($id_chat){
        
        $misMensajesEnviados = array();
        $misMensajesRecibidos = array();
        $mensajesDelChat = $this->Mensaje->mensajes($id_chat);
        foreach($mensajes as $mensaje){
            if($_SESSION['id'] == $mensaje->id_usuario_envia){
                array_push($misMensajesEnviados, $mensaje);
            }else{
                array_push($misMensajesRecibidos, $mensaje);
            }
        }
        $mensajesDelChat['mensajesEnviados'] = $mensajesEnviados;
        $mensajesDelChat['mensajesRecibidos'] = $misMensajesRecibidos;
    }
}

?>