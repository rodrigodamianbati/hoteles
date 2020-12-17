<?php

//extendemos CI_Model
class Alojamiento_model extends CI_Model
{

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

    public function __construct()
    {
        //llamamos al constructor de la clase padre
        parent::__construct();

        //$this->load->model('Estado_model');
        $this->load->model('Alojamiento_model');

    }

    public function index()
    {

    }

    public function agregar($tipo, $precio, $id_localidad, $direccion_nombre, $direccion_numero, $id_usuario)
    {
        $consulta = $this->db->query("SELECT id FROM alojamiento WHERE (direccion_nombre='$direccion_nombre' AND direccion_numero='$direccion_numero')");
        if ($consulta->num_rows() == 0) {
            //$id=$_SESSION['id'];
            $consulta = $this->db->query("INSERT INTO alojamiento VALUES(NULL, '$precio','$id_localidad','$direccion_nombre','$direccion_numero', '1', '$id_usuario'/*sesion*/, '$tipo', 'fotos_alojamientos/default.png');");

            if ($consulta == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function modificar_estado($id, $estado)
    {

        $data = array(
            'id_estado' => $estado,
        );

        $this->db->where('alojamiento.id', $id);
        $this->db->update('alojamiento', $data);

    }

    public function modificar($id, $tipo, $precio, $id_localidad, $direccion_nombre, $direccion_numero)
    {

        //print_r($id_localidad);
        //die();
        $data = array(
            'id_tipo' => $tipo,
            'precio' => $precio,
            'id_localidad' => $id_localidad,
            'direccion_nombre' => $direccion_nombre,
            'direccion_numero' => $direccion_numero,
        );

        $this->db->where('alojamiento.id', $id);
        $this->db->update('alojamiento', $data);

        //$this->db->query("UPDATE alojamiento a SET default_foto = '$path' WHERE a.id='$id_alojamiento'");

    }

    public function tipos()
    {

        $this->db->select('*');
        $consulta = $this->db->get('tipo_aloj');

        return $consulta->result();
    }

    public function estados()
    {

        $this->db->select('*');
        $consulta = $this->db->get('estado_aloj');

        return $consulta->result();
    }

    public function localidades()
    {

        $this->db->select('*');
        $consulta = $this->db->get('localidad');
        return $consulta->result();
    }

    public function provincia_localidades($id_provincia)
    {

        $this->db->select('*');
        $this->db->where('id_provincia', $id_provincia);
        $consulta = $this->db->get('localidad');
        return $consulta->result();
    }

    public function provincias()
    {

        $this->db->select('*');
        $consulta = $this->db->get('provincia');
        return $consulta->result();
    }

    public function localidadesFiltrado($ciu)
    {

        $this->db->select('nombre');
        $this->db->like('nombre', $ciu);
        $consulta = $this->db->get('localidad');
        return $consulta->result();
    }

    public function nuevaFoto($id_alojamiento, $path)
    {

        //$id=$_SESSION['id'];id    foto_url    id_alojamiento

        $consulta = $this->db->query("INSERT INTO foto_alojamiento VALUES(NULL,'$path','$id_alojamiento');");
        if ($consulta == true) {
            $default = $this->db->query("SELECT default_foto FROM alojamiento a WHERE a.id='$id_alojamiento';");
            //print_r($default->first_row()->default_foto);
            //die();
            if (strpos($default->first_row()->default_foto, "default")) {
                $nuevoDefualt = $this->db->query("UPDATE alojamiento a SET default_foto = '$path' WHERE a.id='$id_alojamiento'");
            }
            return true;
        } else {
            return false;
        }

    }

    public function id_alojamiento($direccion_nombre, $direccion_numero)
    {
        $consulta = $this->db->query("SELECT id FROM alojamiento WHERE (direccion_nombre='$direccion_nombre' AND direccion_numero='$direccion_numero');");

        return $consulta->first_row();
    }

    public function totalMisAlojamientos($id)
    {
        /*
        $this->db->select('id');
        $this->db->from('alojamiento');
        $this->db->where('id_usuario',$id);
        $where_clause = $this->db->get_compiled_select();
         */

        $this->db->where("alojamiento.id_usuario", $id);

        return $this->db->get('alojamiento')->num_rows();
    }

    public function total_mis_reservas($id){

        $this->db->where("reserva.id_usuario", $id);
        return $this->db->get('reserva')->num_rows();
    }

    public function mis_reservas_simple($id){

        $this->db->select("reserva.confirmacion_cliente, reserva.confirmacion_dueño, reserva.id as id_reserva, reserva.seña, reserva.precio_total, reserva.pago_seña, reserva.fecha_realizacion, reserva.fecha_inicio, reserva.fecha_fin, reserva.id_estado as id_estado_reserva, reserva.id_alojamiento, reserva.id_usuario, alojamiento.id as id_alojamiento, alojamiento.direccion_nombre, alojamiento.direccion_numero, alojamiento.id_estado as id_estado_alojamiento, alojamiento.id_usuario as id_dueño"); 
        $this->db->where("reserva.id_usuario", $id);
                                                                                                                                                                                                                                                //id`, `precio`, `id_localidad`, `direccion_nombre`, `direccion_numero`, `id_estado`, `id_usuario`, `id_tipo`, `default_foto`
        $this->db->join("alojamiento", "alojamiento.id = reserva.id_alojamiento");  

        $consulta = $this->db->get('reserva');

       //print_r($this->db->last_query());
        //die();

        return $consulta->result();
    }

     
    
    public function reservas_todas(){

        $this->db->select("estado_reserva.descripcion as estado_reserva, usuario.email, usuario.nombre, usuario.apellido, usuario.dni, reserva.confirmacion_cliente, reserva.confirmacion_dueño, reserva.id as id_reserva, reserva.seña, reserva.precio_total, reserva.pago_seña, reserva.fecha_realizacion, reserva.fecha_inicio, reserva.fecha_fin, reserva.id_estado as id_estado_reserva, reserva.id_alojamiento, reserva.id_usuario, alojamiento.id as id_alojamiento, alojamiento.direccion_nombre, alojamiento.direccion_numero, alojamiento.id_estado as id_estado_alojamiento, alojamiento.id_usuario as id_dueño"); 
        //$this->db->where("reserva.id_usuario", $id);                                                                                                                                                                                                                               //id`, `precio`, `id_localidad`, `direccion_nombre`, `direccion_numero`, `id_estado`, `id_usuario`, `id_tipo`, `default_foto`
        $this->db->join("alojamiento", "alojamiento.id = reserva.id_alojamiento");
        $this->db->join("usuario", "usuario.id = reserva.id_usuario");
        $this->db->join("estado_reserva", "estado_reserva.id = reserva.id_estado");

        $consulta = $this->db->get('reserva');

        return $consulta->result();
    }

    public function totalAlojamientos($localidad)
    {

        $this->db->select('id');
        $this->db->from('localidad');
        $this->db->where('nombre', $localidad);
        $where_clause = $this->db->get_compiled_select();

        $this->db->where("alojamiento.id_localidad IN ($where_clause)", null, false);

        return $this->db->get('alojamiento')->num_rows();
    }

    public function totalAlojamientosFiltrado($localidad, $filtros)
    {

        $this->db->select('id');
        $this->db->from('localidad');
        $this->db->where('nombre', $localidad);
        $where_clause = $this->db->get_compiled_select();

        $this->db->select('id_alojamiento');
        $this->db->from('servicio_aloj');
        $this->db->where_in("servicio_aloj.id_servicio", $filtros);
        $where_clause_2 = $this->db->get_compiled_select();
        //print_r($where_clause_2);
        //die();

        if (!empty($filtros)) {
            //$this->db->select("distinct(alojamiento.id), e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
            $this->db->select("distinct(alojamiento.id), e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
            $this->db->where("alojamiento.id_localidad IN ($where_clause)", null, false);
            $this->db->where("alojamiento.id IN ($where_clause_2)", null, false);
            $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
            $this->db->join("servicio s", "s.id = sa.id_servicio");
            $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
            $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
            $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
        } else {
            $this->db->select("distinct(alojamiento.id), e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
            $this->db->where("alojamiento.id_localidad IN ($where_clause)", null, false);
            //$this->db->where("alojamiento.id IN ($where_clause_2)", NULL, FALSE);
            //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
            //$this->db->join("servicio s", "s.id = sa.id_servicio");
            $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
            $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
            $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
        }

        //$this->db->group_by('alojamiento.id');
        //$nuMcolumnas=$this->db->get('alojamiento')->num_rows();

        return $this->db->get('alojamiento')->num_rows();
    }

    public function totalFilasFiltradoLimitePrecio($localidad, $filtros, $limite_precio, $tipo)
    {

        $this->db->select('id');
        $this->db->from('localidad');
        $this->db->where('nombre', $localidad);
        $where_ciudad = $this->db->get_compiled_select();

        $this->db->select('id_alojamiento');
        $this->db->from('servicio_aloj');
        $this->db->where_in("servicio_aloj.id_servicio", $filtros);
        $where_servicios = $this->db->get_compiled_select();

        $this->db->select('alojamiento.id');
        $this->db->from('alojamiento');
        $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
        $this->db->where("t.descripcion", $tipo);
        $where_tipo = $this->db->get_compiled_select();

        ///////////////filtro plata
        if ($limite_precio == "limite_1") {
            $this->db->select('id');
            $this->db->from('alojamiento');
            $this->db->where('alojamiento.precio <', '500');
            $where_plata = $this->db->get_compiled_select();
        } else {
            if ($limite_precio == "limite_2") {
                $this->db->select('id');
                $this->db->from('alojamiento');
                $this->db->where('alojamiento.precio >', '500');
                $this->db->where('alojamiento.precio <', '2500');
                $where_plata = $this->db->get_compiled_select();
            } else {
            }if ($limite_precio == "limite_3") {
                $this->db->select('id');
                $this->db->from('alojamiento');
                $this->db->where('alojamiento.precio >', '2500');
                $this->db->where('alojamiento.precio <', '5000');
                $where_plata = $this->db->get_compiled_select();
            } else {
            }if ($limite_precio == "limite_4") {
                $this->db->select('id');
                $this->db->from('alojamiento');
                $this->db->where('alojamiento.precio >', '5000');
                $this->db->where('alojamiento.precio <', '7500');
                $where_plata = $this->db->get_compiled_select();
            } else {
                if ($limite_precio == "limite_5") {
                    $this->db->select('id');
                    $this->db->from('alojamiento');
                    $this->db->where('alojamiento.precio >', '7500');
                    $this->db->where('alojamiento.precio <=', '10000');
                    $where_plata = $this->db->get_compiled_select();
                }
            }
        }

        if (!empty($filtros)) {
            if ($limite_precio != null) {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    //$this->db->from("alojamiento");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    //$this->db->from("alojamiento");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            } else {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    //$this->db->from("alojamiento");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    //$this->db->from("alojamiento");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            }
        } else {
            if ($limite_precio != null) {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    //$this->db->from("alojamiento");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            } else {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    //$this->db->from("alojamiento");
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");

                    
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    //$this->db->from("alojamiento");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            }
        }
        $consulta = $this->db->get('alojamiento')->num_rows();

        return $consulta;
    }

    public function misAlojamientos($limite, $id)
    {

        $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
        $this->db->where("alojamiento.id_usuario='$id'");
        $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
        $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
        $this->db->join("localidad l", "alojamiento.id_localidad = l.id");

        $consulta = $this->db->get('alojamiento', $limite, $this->uri->segment(3));

        $consulta = $consulta->custom_result_object("Alojamiento_model");

        foreach ($consulta as $alojamiento) {
            $alojamiento->servicios = $alojamiento->servicios($alojamiento->id);
            $alojamiento->fotos = $alojamiento->fotos($alojamiento->id);
        }

        return $consulta;
    }

    public function mis_reservas($limite, $id)
    {

        $this->db->select("reserva.confirmacion_cliente, reserva.confirmacion_dueño, reserva.precio_total, reserva.fecha_fin,reserva.fecha_inicio,reserva.fecha_realizacion, reserva.pago_seña, reserva.id_estado as estado_reserva, reserva.id, e.descripcion as estado_alojamiento, t.descripcion as tipo, a.default_foto as foto, a.precio, l.nombre as localidad, a.direccion_nombre, a.direccion_numero");
        //$this->db->select("*");
        $this->db->where("reserva.id_usuario='$id'");
        $this->db->join("alojamiento a", "reserva.id_alojamiento = a.id");

        $this->db->join("estado_aloj e", "a.id_estado = e.id");
        $this->db->join("tipo_aloj t", "a.id_tipo = t.id");
        $this->db->join("localidad l", "a.id_localidad = l.id");

        $consulta = $this->db->get('reserva', $limite, $this->uri->segment(3));

        //$consulta = $consulta->custom_result_object("Alojamiento_model");

        //foreach ($consulta as $alojamiento) {
        //    $alojamiento->servicios = $alojamiento->servicios($alojamiento->id);
        //}

        return $consulta->result();
    }

    public function alojamientos($limite, $localidad)
    {

        $this->db->select('id');
        $this->db->from('localidad');
        $this->db->where('nombre', $localidad);
        $where_clause = $this->db->get_compiled_select();
        //print_r($where_clause);
        //die();

        //$consulta= $this->db->get('alojamiento', $limite, $this->uri->segment(3));

        $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
        //$this->db->select("a.id, a.default_foto as foto, a.precio");
        //$this->db->from("alojamiento a");
        $this->db->where("alojamiento.id_estado=1");
        $this->db->where("alojamiento.id_localidad IN ($where_clause)", null, false);
        //$this->db->where("a.id_localidad",2);
        $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
        $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
        $this->db->join("localidad l", "alojamiento.id_localidad = l.id");

        //$consulta= $this->db->get('alojamiento', $limite, $this->uri->segment(3));
        $consulta = $this->db->get('alojamiento', $limite, $this->uri->segment(3));
        //print_r($consulta);
        //die();
        //print_r($consulta);
        //die();

        $consulta = $consulta->custom_result_object("Alojamiento_model");

        foreach ($consulta as $alojamiento) {
            $alojamiento->servicios = $alojamiento->servicios($alojamiento->id);
        }
        //return $consulta->custom_result_object("Alojamiento_model");
        return $consulta;
    }

    /*
    public function alojamientosFiltrado($limite, $localidad, $filtros){

    $this->db->select('id');
    $this->db->from('localidad');
    $this->db->where('nombre',$localidad);
    $where_clause = $this->db->get_compiled_select();

    /*
    $this->db->select('id');
    $this->db->from('servicio');
    foreach ($filtros as $filtro) {
    $this->db->where('descripcion',$filtro);
    }
    $where_clause_3 = $this->db->get_compiled_select();
     *

    $this->db->select('id_alojamiento');
    $this->db->from('servicio_aloj');
    foreach ($filtros as $filtro) {
    $this->db->where("servicio_aloj.id_servicio", $filtro);
    }
    $where_clause_2 = $this->db->get_compiled_select();

    //print_r($where_clause_2);
    //die();

    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
    $this->db->where("alojamiento.id_localidad IN ($where_clause)", NULL, FALSE);
    $this->db->where("alojamiento.id_localidad IN ($where_clause_2)", NULL, FALSE);
    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
    $this->db->join("servicio s", "s.id = sa.id_servicio");
    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");

    $consulta= $this->db->get('alojamiento', $limite, $this->uri->segment(3));

    $consulta = $consulta->custom_result_object("Alojamiento_model");

    foreach ($consulta as $alojamiento) {
    $alojamiento->servicios= $alojamiento->servicios($alojamiento->id);
    }

    return $consulta;
    } */

    public function alojamientosFiltrado($limite, $localidad, $filtros)
    {

        $this->db->select('id');
        $this->db->from('localidad');
        $this->db->where('nombre', $localidad);
        $where_clause = $this->db->get_compiled_select();
        /*
        $this->db->select('id_alojamiento');
        $this->db->from('servicio_aloj');
        foreach ($filtros as $filtro) {
        $this->db->where("servicio_aloj.id_servicio", $filtro);
        }
        $where_clause_2 = $this->db->get_compiled_select();
         */
        $this->db->select('id_alojamiento');
        $this->db->from('servicio_aloj');
        $this->db->where_in("servicio_aloj.id_servicio", $filtros);
        $where_clause_2 = $this->db->get_compiled_select();
        //print_r($where_clause_2);
        //die();

        if (!empty($filtros)) {
            //$this->db->select("distinct(alojamiento.id), e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
            $this->db->select("distinct(alojamiento.id), e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
            $this->db->where("alojamiento.id_localidad IN ($where_clause)", null, false);
            $this->db->where("alojamiento.id IN ($where_clause_2)", null, false);
            $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
            $this->db->join("servicio s", "s.id = sa.id_servicio");
            $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
            $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
            $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
        } else {
            $this->db->select("distinct(alojamiento.id), e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
            $this->db->where("alojamiento.id_localidad IN ($where_clause)", null, false);
            //$this->db->where("alojamiento.id IN ($where_clause_2)", NULL, FALSE);
            //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
            //$this->db->join("servicio s", "s.id = sa.id_servicio");
            $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
            $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
            $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
        }

        //$where_clause_3 = $this->db->get_compiled_select();
        //print_r($where_clause_3);
        //die();

        $consulta = $this->db->get('alojamiento', $limite, $this->uri->segment(3));

        $consulta = $consulta->custom_result_object("Alojamiento_model");

        foreach ($consulta as $alojamiento) {
            $alojamiento->servicios = $alojamiento->servicios($alojamiento->id);
        }

        //print_r($consulta);
        //die();
        return $consulta;
    }

    public function servicios_disponibles($id_alojamiento){
        /* SELECT * FROM `servicio` JOIN `servicio_aloj` `sa` ON `servicio`.`id` = `sa`.`id_servicio` WHERE `sa`.`id_alojamiento` = '69'*/

        /*
        $this->db->select("*");
        $this->db->from("servicio_aloj"); 
        $this->db->where("servicio_aloj.id_alojamiento",$id_alojamiento);
        $this->db->join("servicio_aloj sa", "servicio.id = sa.id_servicio");
        $consulta=$this->db->get("servicio");
        print_r($this->db->last_query());
        die();*/
        $consulta = $this->db->query("SELECT * FROM `servicio` JOIN `servicio_aloj` `sa` ON `servicio`.`id` = `sa`.`id_servicio` WHERE `sa`.`id_alojamiento` = '$id_alojamiento'");
        //print_r($this->db->last_query());
        //die();
        return $consulta->result();
    } 

    public function todos_los_servicios(){

        $consulta = $this->db->query("SELECT * FROM servicio");
          
        return $consulta->result();
    }

    public function alojamientosFiltradoLimitePrecio($limite, $localidad, $filtros, $limite_precio, $tipo)
    {

        $this->db->select('id');
        $this->db->from('localidad');
        $this->db->where('nombre', $localidad);
        $where_ciudad = $this->db->get_compiled_select();

        $this->db->select('id_alojamiento');
        $this->db->from('servicio_aloj');
        $this->db->where_in("servicio_aloj.id_servicio", $filtros);
        $where_servicios = $this->db->get_compiled_select();

        $this->db->select('alojamiento.id');
        $this->db->from('alojamiento');
        $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
        $this->db->where("t.descripcion", $tipo);
        $where_tipo = $this->db->get_compiled_select();
        //print_r($where_tipo);
        //die();
        
        ///////////////filtro plata
        if ($limite_precio == "limite_1") {
            $this->db->select('id');
            $this->db->from('alojamiento');
            $this->db->where('alojamiento.precio <', '500');
            $where_plata = $this->db->get_compiled_select();
        } else {
            if ($limite_precio == "limite_2") {
                $this->db->select('id');
                $this->db->from('alojamiento');
                $this->db->where('alojamiento.precio >', '500');
                $this->db->where('alojamiento.precio <', '2500');
                $where_plata = $this->db->get_compiled_select();
            } else {
            }if ($limite_precio == "limite_3") {
                $this->db->select('id');
                $this->db->from('alojamiento');
                $this->db->where('alojamiento.precio >', '2500');
                $this->db->where('alojamiento.precio <', '5000');
                $where_plata = $this->db->get_compiled_select();
            } else {
            }if ($limite_precio == "limite_4") {
                $this->db->select('id');
                $this->db->from('alojamiento');
                $this->db->where('alojamiento.precio >', '5000');
                $this->db->where('alojamiento.precio <', '7500');
                $where_plata = $this->db->get_compiled_select();
            } else {
                if ($limite_precio == "limite_5") {
                    $this->db->select('id');
                    $this->db->from('alojamiento');
                    $this->db->where('alojamiento.precio >', '7500');
                    $this->db->where('alojamiento.precio <=', '10000');
                    $where_plata = $this->db->get_compiled_select();
                }
            }
        }

        if (!empty($filtros)) {
            if ($limite_precio != null) {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            } else {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    $this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    $this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            }
        } else {
            if ($limite_precio != null) {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    $this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    $this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            } else {
                if ($tipo != null) {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                } else {
                    $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
                    $this->db->where("alojamiento.id_localidad IN ($where_ciudad)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_servicios)", null, false);
                    $this->db->where("alojamiento.id IN ($where_tipo)", null, false);
                    //$this->db->where("alojamiento.id IN ($where_plata)", null, false);

                    //$this->db->join("servicio_aloj sa", "alojamiento.id = sa.id_alojamiento");
                    //$this->db->join("servicio s", "s.id = sa.id_servicio");
                    $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
                    $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
                    $this->db->join("localidad l", "alojamiento.id_localidad = l.id");
                }
            }
        }
        //$consulta = $this->db->get_compiled_select('alojamiento');
        //$consulta = $this->db->get_compiled_select();
        //print_r($consulta);
        //die(); 
        
        //$consulta = $this->db->get('alojamiento', $limite, $this->uri->segment(3));

        $consulta = $this->db->get('alojamiento', $limite, $this->uri->segment(3));
        //print_r($consulta); 
        //die();
        $consulta = $consulta->custom_result_object("Alojamiento_model");

        foreach ($consulta as $alojamiento) {
            $alojamiento->servicios = $alojamiento->servicios($alojamiento->id);
        }

        return $consulta;
    }

    public function servicios($id_alojamiento)
    {
        $this->db->select('*');
        $this->db->where("servicio_aloj.id_alojamiento='$id_alojamiento'");
        $this->db->join("servicio s", "s.id=servicio_aloj.id_servicio");
        $consulta = $this->db->get('servicio_aloj');

        return $consulta->result();
    }

    public function fotos($id_alojamiento)
    {
        $this->db->select('*');
        $this->db->where("foto_alojamiento.id_alojamiento='$id_alojamiento'");
        //$this->db->join("servicio s", "s.id=servicio_aloj.id_servicio");
        $consulta = $this->db->get('foto_alojamiento');

        return $consulta->result();
    }

    public function localidad($id_localidad)
    {
        $consulta = $this->db->query("SELECT * FROM localidad l WHERE l.id='$id_localidad';");
        return $consulta->result();
    }

    public function estado($id_estado)
    {
        $consulta = $this->db->query("SELECT * FROM estado_aloj ea WHERE ea.id='$id_estado'");
        return $consulta->result();
    }

    public function usuario($id_usuario)
    {
        $consulta = $this->db->query("SELECT * FROM usuario u WHERE u.id='$id_usuario'");
        return $consulta->result();
    }

    public function tipo($id_tipo)
    {
        $consulta = $this->db->query("SELECT * FROM tipo_aloj t WHERE t.id='$id_tipo'");
        return $consulta->result();
    }

    public function baja($id)
    {
        $this->db->where('alojamiento.id', $id);
        $this->db->delete('alojamiento');
    }

    public function galeria($id)
    {

        $this->db->select("*");
        $this->db->where('foto_alojamiento.id_alojamiento', $id);
        $consulta = $this->db->get('foto_alojamiento');

        return $consulta->result();
    }

    public function modificar_galeria($id_alojamiento,$lista_fotos)
    {

        foreach ($lista_fotos as $id_foto) {
            $this->borrar_foto($id_foto);
        }

        $this->db->select('*');
        $this->db->where('foto_alojamiento.id_alojamiento', $id_alojamiento);
        $consulta = $this->db->get('foto_alojamiento');

        if($consulta->num_rows() == 0){
            $data = array('default_foto'=>'fotos_alojamientos/default.png');

            $this->db->where('alojamiento.id', $id_alojamiento);
            $this->db->update('alojamiento', $data);
        }

    }

    public function agregar_servicios($lista_servicios, $id_alojamiento)
    {

        foreach ($lista_servicios as $id_servicio) {
            $this->agregar_servicio($id_servicio, $id_alojamiento);
        }
    }

    //agregar_servicios($_POST['chequeados'], $_POST['id_alojamiento'])

    public function agregar_servicio($id_servicio, $id_alojamiento)
    {
        $this->db->query("INSERT INTO servicio_aloj (id_alojamiento, id_servicio) VALUES ('$id_alojamiento', '$id_servicio')"); 
        //$this->db->insert('mytable', $data);
        //$this->db->where('foto_alojamiento.id', $id_servicio);
        //$this->db->delete('foto_alojamiento');
    }

    public function borrar_foto($id_foto)
    {

        $this->db->where('foto_alojamiento.id', $id_foto);
        $this->db->delete('foto_alojamiento');
    }





    public function alojamiento($id)
    {

        $this->db->select("alojamiento.id, e.descripcion as estado, t.descripcion as tipo, alojamiento.default_foto as foto, alojamiento.precio, l.nombre as localidad, alojamiento.direccion_nombre, alojamiento.direccion_numero");
        $this->db->where("alojamiento.id='$id'");
        $this->db->join("estado_aloj e", "alojamiento.id_estado = e.id");
        $this->db->join("tipo_aloj t", "alojamiento.id_tipo = t.id");
        $this->db->join("localidad l", "alojamiento.id_localidad = l.id");

        $consulta = $this->db->get('alojamiento');

        $consulta = $consulta->custom_result_object("Alojamiento_model");

        foreach ($consulta as $alojamiento) {
            $alojamiento->servicios = $alojamiento->servicios($alojamiento->id);
        }

        return $consulta;

        /*
    $this->db->where('alojamiento.id', $id);
    $consulta = $this->db->get('alojamiento');

    $alojamientos = $consulta->custom_result_object("Alojamiento_model");

    foreach ($alojamientos as $alojamiento) {
    $alojamiento->servicios= $alojamiento->servicios($alojamiento->id);
    }

    return $alojamientos;7
     */
    }




    public function estado_alojamiento($id_alojamiento){
            $this->db->select('id_estado');
            $this->db->select('id', $id_alojamiento);
            $consulta=$this->db->get('alojamiento');
            return $consulta->first_row();
    }


    public function obtener_alojamiento($id_alojamiento)
    {
        $this->db->select('*');
        $this->db->select('id', $id_alojamiento);
        $consulta=$this->db->get('alojamiento');
        return $consulta->first_row();
    }


    //public function reservar($precioTotal, $fecha_actual, $fecha_desde, $fecha_hasta, $id_estado,  $id_alojamiento, $id_cliente){
    //    return $consulta = $this->db->query("INSERT INTO reserva VALUES(NULL, NULL, '$precioTotal', NULL, NULL, '$fecha_actual',$fecha_desde, $fecha_hasta, $id_estado, $id_alojamiento, $id_cliente)");      
    //}

    public function almacenar_reserva($id_usuario, $id_alojamiento, $precio_total, $fecha_desde, $fecha_hasta){
        
        $f_fecha_actual = date("Y-m-d");
        $f_desde=$fecha_desde->format('Y-m-d');
        $f_hasta=$fecha_hasta->format('Y-m-d');

        $consulta_espacio=$this->db->query("SELECT *
        FROM reserva r
        WHERE r.id_alojamiento='$id_alojamiento' AND (r.fecha_inicio BETWEEN '$f_desde' AND '$f_hasta') 
        OR (r.fecha_fin BETWEEN '$f_desde' AND '$f_hasta')");

        if($consulta_espacio->num_rows() > 0){
            
            return false;
        }

        $this->db->query("INSERT INTO reserva (id, seña, precio_total, pago_seña, pago_resto, fecha_realizacion, fecha_inicio, fecha_fin, id_estado, id_alojamiento, id_usuario) VALUES (NULL, '0', '$precio_total', 'pendiente', '', '$f_fecha_actual', '$f_desde', '$f_hasta', '1', '$id_alojamiento', '$id_usuario')");
        $id_reserva = $this->db->insert_id();
        $this->db->query("UPDATE alojamiento SET id_estado = '1' WHERE alojamiento.id = '$id_alojamiento';");
                                                //SELECT * FROM usuario u WHERE u.id IN (SELECT a.id_usuario FROM alojamiento a WHERE a.id=1)
        $consulta_id_dueño = $this->db->query("SELECT u.id FROM usuario u WHERE u.id IN (SELECT a.id_usuario FROM alojamiento a WHERE a.id='$id_alojamiento')");
        $id_dueño = $consulta_id_dueño->result()[0]->id;
        //print_r($id_dueño);
        //die();
        $consulta = $this->db->query("SELECT id FROM chat WHERE (id_dueño='$id_dueño' AND id_cliente='$id_usuario')");
        if ($consulta->num_rows() == 0) {
            //$id=$_SESSION['id'];
            // $this->db->query("INSERT INTO servicio_aloj (id_alojamiento, id_servicio) VALUES ('$id_alojamiento', '$id_servicio')"); 
            $consulta = $this->db->query("INSERT INTO chat (id, id_dueño, id_cliente, id_reserva)VALUES(NULL, $id_dueño, $id_usuario,$id_reserva)");
        }
        return true;
    }

    public function cliente_corfirmar($id_reserva){

        $this->db->query("UPDATE reserva SET confirmacion_cliente = 'confirmado' WHERE reserva.id = '$id_reserva';");
    
    }  

    public function cliente_corfirmar_duenio($id_reserva){

        $this->db->query("UPDATE reserva SET confirmacion_dueño = 'confirmado' WHERE reserva.id = '$id_reserva';");

        $this->db->query("UPDATE reserva SET id_estado = '2' WHERE reserva.id = '$id_reserva';");

        //$this->db->query("UPDATE estado_reserva SET descripcion = 'hecha' WHERE estado_reserva.id = '$id_reserva';");
        
    }  

    public function reserva_pagar($id_reserva){

        $fecha_hoy = date("Y-m-d");
        $consulta = $this->db->query("SELECT * FROM reserva WHERE (reserva.id='$id_reserva' AND reserva.fecha_inicio>='$fecha_hoy')");
        //print_r($this->db->last_query());
        //die();
        if ($consulta->num_rows() > 0) {
            $this->db->query("UPDATE reserva SET pago_seña = 1 WHERE reserva.id = '$id_reserva';");
            return true;
        }else{
            $this->db->where('reserva.id', $id_reserva);
            $this->db->delete('reserva');
            $this->session->set_flashdata('pago', 'cancelado');
        }
        
        
    
    } 
    
    
    public function reserva_baja($id_reserva){
        
        $this->db->query("DELETE FROM reserva WHERE reserva.id = '$id_reserva';");
    
    }

    public function reservas_clientes($id_dueño){

        $this->db->select('id');
        $this->db->from('alojamiento');
        $this->db->where('id_usuario', $id_dueño);
        $where_clause = $this->db->get_compiled_select();

        $this->db->select("er.descripcion as estado_res, u.dni, u.nombre, u.apellido, u.email, reserva.id_usuario as id_cliente, reserva.precio_total, reserva.fecha_fin,reserva.fecha_inicio,reserva.fecha_realizacion, reserva.pago_seña, reserva.id_estado as estado_reserva, reserva.id as id_reserva, e.descripcion as estado_alojamiento, t.descripcion as tipo, a.default_foto as foto, a.precio, l.nombre as localidad, a.direccion_nombre, a.direccion_numero");
       
        $this->db->where("reserva.id_alojamiento IN ($where_clause)", null, false);
        //$this->db->where("reserva.id_alojamiento='$id'");

        $this->db->join("estado_reserva er", "reserva.id_estado= er.id");
        $this->db->join("alojamiento a", "reserva.id_alojamiento= a.id");
        $this->db->join("estado_aloj e", "a.id_estado = e.id");
        $this->db->join("tipo_aloj t", "a.id_tipo = t.id");
        $this->db->join("localidad l", "a.id_localidad = l.id");

        $this->db->join("usuario u", "reserva.id_usuario = u.id");

        $consulta = $this->db->get('reserva');
        //$this->db->where("alojamiento.id_localidad IN ($where_clause)", null, false);
        return $consulta->result();
    }  

    public function misLugaresVisitados(){
        //fecha_fin---------date("Y-m-d");
        $fechaHoy = date("Y-m-d");
        $id = $_SESSION['id'];
        $this->db->select("a.id as id_alojamiento,reserva.confirmacion_cliente, reserva.confirmacion_dueño, reserva.precio_total, reserva.fecha_fin,reserva.fecha_inicio,reserva.fecha_realizacion, reserva.pago_seña, reserva.id_estado as estado_reserva, reserva.id, e.descripcion as estado_alojamiento, t.descripcion as tipo, a.default_foto as foto, a.precio, l.nombre as localidad, a.direccion_nombre, a.direccion_numero, AVG(v.valoracion) AS valoracion");
        //$this->db->select("*");
        $this->db->where("reserva.id_usuario='$id'");
        $this->db->where("reserva.fecha_fin<'$fechaHoy'");
        $this->db->join("alojamiento a", "reserva.id_alojamiento = a.id");
        $this->db->join("valoracion_cliente_alojamiento v", "v.id_alojamiento = a.id", 'left');

        $this->db->join("estado_aloj e", "a.id_estado = e.id");
        $this->db->join("tipo_aloj t", "a.id_tipo = t.id");
        $this->db->join("localidad l", "a.id_localidad = l.id");
        $this->db->group_by("a.id");

        $consulta = $this->db->get('reserva');
        
       //print_r($this->db->last_query());
        //die();
        return $consulta->result();
    }

    public function puntuar_alojamiento($id_cliente, $id_alojamiento, $rating){
        $consulta = $this->db->query("SELECT '*' FROM valoracion_cliente_alojamiento WHERE (id_cliente='$id_cliente' AND id_alojamiento='$id_alojamiento')");
        if ($consulta->num_rows() == 0) {
            //$id=$_SESSION['id'];
            $consulta = $this->db->query("INSERT INTO valoracion_cliente_alojamiento VALUES('$id_cliente', '$id_alojamiento','$rating');");

            if ($consulta == true) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function prueba(){
        if ($product->estado_reserva == 1) {
            if ($product->confirmacion_cliente == "confirmado") {
                echo "pendiente (Esperando confirmacion del dueño del alojamiento)";
            } else {
                echo "pendiente";
            }
        } else {
            if ($product->estado_reserva == 2) {
                echo "en curso";
            } else {
                echo "cancelada";
            }
        }
    }
    
    public function baja_servicio($id_alojamiento, $id_servicio){
        $this->db->where('servicio_aloj.id_alojamiento', $id_alojamiento);
        $this->db->where('servicio_aloj.id_servicio', $id_servicio);
        $this->db->delete('servicio_aloj');
        return true;
    }
}
