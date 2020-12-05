<?php

class Chat extends CI_Model{

    public function __construct()
    {
        //llamamos al constructor de la clase padre
        parent::__construct();
        //$this->load->model('Estado_model');
        //$this->load->model('Chat');
        $this->load->model('Mensaje');
        $this->load->model('Usuario_model');
    }

    public function nuevoChat($id_dueño, $id_cliente, $id_reserva){
        //print_r("error");
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

    public function misChats($id_usuario){
        $this->db->select('*');
        $this->db->where('id_dueño',$id_usuario);
        $this->db->or_where('id_cliente', $id_usuario); 
        //$this->db->order_by('time', 'ASC');
        $consulta = $this->db->get('chat');
        $chats = $consulta->result();
        $mensajes;
        $usuario;
        foreach ($chats as $chat){
          // $mensajes = $this->misMensajes($chat->id);
           if($id_usuario == $chat->id_dueño){
                $usuario = $this->Usuario_model->getUsuario($chat->id_cliente)[0];
           }else{
                $usuario = $this->Usuario_model->getUsuario($chat->id_dueño)[0];
           }
           $chat->usuario_entrante = $usuario;
           //$chat->mensajes = $mensajes;
        }
        return $chats;
    }

    public function misMensajes($id_chat){
        
        $misMensajesEnviados = array();
        $misMensajesRecibidos = array();
        $mensajes = $this->Mensaje->mensajes($id_chat);
       // print_r($id_chat);
       // print_r("misMensajes");
        //print_r($mensajes);
        //die();
        $mensajesDelChat = array();
        foreach($mensajes as $mensaje){
            if($_SESSION['id'] == $mensaje->id_usuario_envia){
                array_push($misMensajesEnviados, $mensaje);
            }else{
                array_push($misMensajesRecibidos, $mensaje);
            }
        }
        $mensajesDelChat['mensajesEnviados'] = $misMensajesEnviados;
        $mensajesDelChat['mensajesRecibidos'] = $misMensajesRecibidos;
        return $mensajesDelChat;
        //echo json_encode($mensajesDelChat);
    }
}

?>