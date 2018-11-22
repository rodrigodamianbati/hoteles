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

    public function agregar($tipo, $precio, $id_localidad, $direccion_nombre, $direccion_numero)
    {
        $consulta = $this->db->query("SELECT id FROM alojamiento WHERE (direccion_nombre='$direccion_nombre' AND direccion_numero='$direccion_numero')");
        if ($consulta->num_rows() == 0) {
            //$id=$_SESSION['id'];
            $consulta = $this->db->query("INSERT INTO alojamiento VALUES(NULL, '$precio','$id_localidad','$direccion_nombre','$direccion_numero', '1', '1'/*sesion*/, '$tipo', '/pruebaTemplate2/fotos_alojamientos/default.png');");

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
        }

        return $consulta;
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

    public function modificar_galeria($lista_fotos)
    {

        foreach ($lista_fotos as $id_foto) {
            $this->borrar_foto($id_foto);
        }
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

}
