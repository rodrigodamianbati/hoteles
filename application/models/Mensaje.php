<?php

class Mensaje extends CI_Model{

    public function __construct()
    {
        //llamamos al constructor de la clase padre
        parent::__construct();
        //$this->load->model('Estado_model');
        $this->load->model('Mensaje');
    }

    public mensajes($id_chat){

        $this->db->select('*');
        $this->db->where('id_chat',$id_chat);
        $consulta = $this->db->get('mensaje');
        //$consulta = $this->db->get('reserva', $limite, $this->uri->segment(3));

        //$consulta = $consulta->custom_result_object("Alojamiento_model");

        //foreach ($consulta as $alojamiento) {
        //    $alojamiento->servicios = $alojamiento->servicios($alojamiento->id);
        //}
        return $consulta->result();
    }
}

?>