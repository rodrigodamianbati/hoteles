<?php

class Alojamiento extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->helper("form");

        $this->load->helper("url");

        $this->load->model("Alojamiento_model");

        $this->load->library("session");

        $this->load->model("Usuario_model");

        //$this->load->library('upload');

    }

    public function index()
    {

        /*
        if(!isset($this->session->userdata['logged_in'])){
        redirect('login');
        }
         */
        //print_r($_SESSION);
        //die();
        redirect(base_url());
        //$this->load->view("buscador");
    }

    public function seguridad(){
        if(!isset($this->session->userdata['logged_in'])){
            $this->session->set_flashdata('ultima_url', current_url());
            redirect('login');
        }
        if($this->session->userdata['rol'] == 'administrador'){
            redirect('usuario');
         }

        /*else{
            if($this->session->userdata['rol'] == 'administrador'){
            // array asociativo con la llamada al metodo del modelo
                 $usuario["ver"]=$this->Usuario_model->ver();
                // // cargo la vista y le paso los datos
                
                 $this->load->view("usuario_view",$usuario);
            }
            
        }*/
    }

    public function crear_alojamiento()
    {
        $this->seguridad();
        $tipos = $this->tipos();
        $localidades = $this->localidades();
        //print_r($_SESSION['id']);
        //die();
        //$id_usuario = $_SESSION['id'];

        $data = array_merge($tipos, $localidades);

        $this->load->view("alta_alojamiento_view", $data);
    }

    public function tipos()
    {
        
        $consulta['tipos'] = $this->Alojamiento_model->tipos();

        return $consulta;
    }

    public function localidades()
    {

        $consulta['localidades'] = $this->Alojamiento_model->localidades();

        return $consulta;
    }

    public function localidadesFiltrado($ciu)
    {

        $consulta['localidades'] = $this->Alojamiento_model->localidadesFiltrado($ciu);

        return $consulta;
    }

    /////////////////////////////////////---------ALTA-ALOJAMIENTO
    public function alta()
    {
        $this->seguridad();
        if ($this->input->post("submit")) {

            //llamo al metodo agregar
            $agregar = $this->Alojamiento_model->agregar(
                $this->input->post("tipo"),
                $this->input->post("precio"),
                //$this->input->post("id_localidad"),
                $this->input->post("localidad"),
                $this->input->post("direccion_nombre"),
                $this->input->post("direccion_numero"),
                $_SESSION['id']
            );
        }
        if ($agregar == true) {
            //Sesion de una sola ejecución
            //$this->session->set_flashdata('correcto', 'Usted se ha registrado correctamente');
            $id_alojamiento = $this->id_alojamiento($this->input->post("direccion_nombre"), $this->input->post("direccion_numero"));
            //print_r($idalojamiento);
            //die(); <--------------------------------------------------------acaaaaaaaaaaaaaaaaaaaaaaaa va la prueba

            //print_r($data);
            //die();

             //if($this->input->post("agregar_fotos")){
            //$id_alojamiento = $this->input->post("agregar_fotos");

            //$data['id_alojamiento'] = $id_alojamiento;

            //$this->load->view("usuario/fine_uploader_head");
            //$this->load->view("usuario/usuario_top_nav");
            //$this->load->view("usuario/usuario_side_nav");
            //$this->load->view("usuario/agregar_fotos", $data);
            //$this->load->view("usuario/usuario_footer");
            
            //$this->load->view("alta_alojamiento_fotos_view", array('id_alojamiento' => $data));
                redirect("alojamiento/mis_alojamientos"); 
        } else {
            //print_r("no anduvo");
            $this->session->set_flashdata('incorrecto', 'Usted se ha registrado correctamente');
        }
        //redirecciono la pagina a la url por defecto

    }

    private function id_alojamiento($direccion_nombre, $direccion_numero)
    {
        return $this->Alojamiento_model->id_alojamiento($direccion_nombre, $direccion_numero);
    }
    ///////////////////////////////////////////////////////////

    ///////////////////////////////////-------SUBIDOR-DE-FOTOs
    public function subir_foto()
    {
        $this->seguridad();
        $config['upload_path'] = 'C:/xampp/htdocs/hoteles/fotos_alojamientos/';

        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048000;
        $config['max_width'] = 1024;
        $config['max_height'] = 768;

        //$new_name = time().$_FILES["userfiles"]['name'];
        $numRandom = rand(); //genero un numero random
        $numRandom1 = rand(); //genero otro numero random
        $nombre = $numRandom . $numRandom1 . $_FILES['qqfile']['name']; //se lo concateno al principio del nombre del archivo para no perder la extension
        $config['file_name'] = $nombre; //cambio el nombre del archivo

        $this->load->library('upload', $config); //subo el archivo al servidor

        if (!$this->upload->do_upload('qqfile')) {

            $estado = array('error' => $this->upload->display_errors());

            http_response_code(500);
        } else {

            $path = 'fotos_alojamientos/' . $nombre;

            $id = $_GET['id'];

            $this->nuevoPathFoto($id, $path);
            $estado = array('success' => true);

        }

        $estado_encode = json_encode($estado);

        echo $estado_encode;
    }

    private function nuevoPathFoto($id_alojamiento, $path)
    {
        $this->Alojamiento_model->nuevaFoto($id_alojamiento, $path);
    }
    ////////////////////////////////////////////////////////////

    public function configurarPaginado($config)
    {

        $config['per_page'] = 9;
        $config['num_links'] = 5;

        $config['reuse_query_string'] = true; //configurar variable $localidad para el GET

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] = "</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Ultimo';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
        return $config;
    }

    /////////////////////////////////////////////////////////////////Buscador

    public function buscador()
    {

        $this->load->library('pagination');
        $localidad = $_GET['localidad'];

        $config['base_url'] = base_url() . 'alojamiento/buscador';
        $config['total_rows'] = $this->totalFilas($localidad);
        $config = $this->configurarPaginado($config);
        /*
        $config['per_page'] = 9;
        $config['num_links'] = 5;

        $config['reuse_query_string'] = TRUE; //configurar variable $localidad para el GET

        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Ultimo';
        $config['next_link'] = 'Siguiente';
        $config['prev_link'] = 'Anterior';
         */

        $data['products'] = $this->alojamientos($config['per_page'], $localidad);

        $this->pagination->initialize($config);

        $this->load->view('buscador_resultado', $data);
    }

    private function totalFilas($localidad)
    {
        return $this->Alojamiento_model->totalAlojamientos($localidad);
    }

    private function totalMisAlojamientos($id)
    {
        return $this->Alojamiento_model->totalMisAlojamientos($id);
    }


    private function total_mis_reservas($id)
    {
        return $this->Alojamiento_model->total_mis_reservas($id);
    }

    private function totalFilasFiltrado($localidad, $filtros)
    {
        return $this->Alojamiento_model->totalAlojamientosFiltrado($localidad, $filtros);
    }

    private function totalFilasFiltradoLimitePrecio($localidad, $filtros, $limite_precio, $tipo)
    {
        return $this->Alojamiento_model->totalFilasFiltradoLimitePrecio($localidad, $filtros, $limite_precio, $tipo);
    }

    private function alojamientos($limite, $localidad)
    {
        return $this->Alojamiento_model->alojamientos($limite, $localidad);
    }

    private function misAlojamientos($limite, $id)
    {
        return $this->Alojamiento_model->misAlojamientos($limite, $id);
    }

    private function alojamientosFiltrado($limite, $localidad, $filtros)
    {
        return $this->Alojamiento_model->alojamientosFiltrado($limite, $localidad, $filtros);
    }

    private function alojamientosFiltradoLimitePrecio($limite, $localidad, $filtros, $limite_precio, $tipo)
    {
        return $this->Alojamiento_model->alojamientosFiltradoLimitePrecio($limite, $localidad, $filtros, $limite_precio, $tipo);
    }

    ////////////////////////////////////////////////////////////////////////

    public function filtrar()
    {

        $this->load->library('pagination');

        /*
        if (isset($_GET['localidad'])) {
        $localidad = $_GET['localidad'];
        } else {
        $localidad = $_GET['nueva_localidad'];
        }*/

        $localidad = $_GET['localidad'];

        //print_r($_GET['tipo_actual']);
        //die();

        //if ($_GET['tipo_actual'] != 'ninguno') {
        //    $tipo = $_GET['tipo_actual'];
        //} else {
        //    $tipo = null;
        //}

        /*
        <button type="input" type="sumbit" name="casa" class="w3-bar-item w3-button w3-text-black" value="casa"> Casa</button>
        <button type="input" type="sumbit" name="departamento" class="w3-bar-item w3-button w3-text-black" value="departamento"> Departamento</button>
        <button type="input" type="sumbit" name="hotel" class="w3-bar-item w3-button w3-text-black" value="hotel"> Hotel</button>
        <button type="input" type="sumbit" name="cabaña" class="w3-bar-item w3-button w3-text-black" value="cabaña"> Cabaña</button>
        <button type="input" type="sumbit" name="chalet" class="w3-bar-item w3-button w3-text-black" value="chalet"> Chalet</button>
        <button type="input" type="sumbit" name="monoambiente" class="w3-bar-item w3-button w3-text-black" value="monoambiente"> Monoambiente</button>
         */
        //print_r($tipo);
        //die();
        //if ($tipo != null) {
            if (isset($_GET['ninguno'])) {
                //$tipo = null;
                $tipo = "sin_resultado";
            } else {
                if (isset($_GET['casa'])) {
                    $tipo = "casa";
                } else {
                    if (isset($_GET['departamento'])) {
                        $tipo = "departamento";
                    } else {
                        if (isset($_GET['hotel'])) {
                            $tipo = "hotel";
                        } else {
                            if (isset($_GET['cabaña'])) {
                                $tipo = "cabaña";
                            } else {
                                if (isset($_GET['chalet'])) {
                                    $tipo = "chalet";
                                } else {
                                    if(isset($_GET['monoambiente'])){
                                        $tipo = "monoambiente";
                                    } else{
                                        //$tipo = null;
                                        $tipo = "sin_resultado";
                                    }
                                }
                            }
                        }
                    }
                }
            }
       // }

        //print_r($tipo);
        //die();

        //$limite_precio = null;
        $limite_precio = 0;

        if (isset($_GET['limite_1'])) {
            $limite_precio = $_GET['limite_1'];
        } else {
            if (isset($_GET['limite_2'])) {
                $limite_precio = $_GET['limite_2'];
            } else {
                if (isset($_GET['limite_3'])) {
                    $limite_precio = $_GET['limite_3'];
                } else {
                    if (isset($_GET['limite_4'])) {
                        $limite_precio = $_GET['limite_4'];
                    } else {
                        if (isset($_GET['limite_5'])) {
                            $limite_precio = $_GET['limite_5'];
                        }
                    }
                }
            }
        }

        //die();
        //$localidad = $_GET['localidad'];
        //print_r($_GET);
        //die();
        $config['base_url'] = base_url() . 'alojamiento/filtrar';

        $filtros = array();

        if (isset($_GET['baniera'])) {
            array_push($filtros, $_GET['baniera']);
        }
        if (isset($_GET['television'])) {
            array_push($filtros, $_GET['television']);
        }

        if (isset($_GET['internet'])) {
            array_push($filtros, $_GET['internet']);
        }

        if (isset($_GET['telefono'])) {
            array_push($filtros, $_GET['telefono']);
        }

        if (isset($_GET['garage'])) {
            array_push($filtros, $_GET['garage']);
        }

        //print_r($filtros);
        //die();
        $config = $this->configurarPaginado($config);

        $config['per_page'] = 9;
        if ($limite_precio == 0 and $tipo == "sin_resultado") {
            $data['products'] = $this->alojamientosFiltrado($config['per_page'], $localidad, $filtros);
            $config['total_rows'] = $this->totalFilasFiltrado($localidad, $filtros);
           // print_r("if ");
            //die();
        } else {
            //print_r($tipo);
            //die();
            $data['products'] = $this->alojamientosFiltradoLimitePrecio($config['per_page'], $localidad, $filtros, $limite_precio, $tipo);
            $config['total_rows'] = $this->totalFilasFiltradoLimitePrecio($localidad, $filtros, $limite_precio, $tipo);
        }

        if (!empty($data['products'])) {

            $config['num_links'] = 5;

            $config['reuse_query_string'] = true; //configurar variable $localidad para el GET

            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] = "</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";

            $config['first_link'] = 'Primero';
            $config['last_link'] = 'Ultimo';
            $config['next_link'] = 'Siguiente';
            $config['prev_link'] = 'Anterior';

            $this->pagination->initialize($config);
            $this->load->view('buscador_resultado', $data);
        } else {
            $this->load->view('buscador_resultado_vacio');
        }

    }

    public function mis_alojamientos()
    {
        $this->seguridad();
        $this->load->library('pagination');
        $id = $_SESSION['id'];
        $config['total_rows'] = $this->totalMisAlojamientos($id);
        $config['base_url'] = base_url() . 'alojamiento/mis_alojamientos';

        $config = $this->configurarPaginado($config);
        $this->pagination->initialize($config);
        $data['products'] = $this->misAlojamientos($config['per_page'], $id);
        //$alojamientos = $this->Alojamiento_model->misAlojamientos($id);

        $this->load->view("usuario/usuario_head");
        //$this->load->view("inicio/head");
        $this->load->view("usuario/usuario_top_nav");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("usuario/usuario_alojamientos", $data);
        $this->load->view("usuario/usuario_footer");
        //$this->load->view("inicio/footer");

    }

    public function baja()
    {
        //print_r($this->input->post("baja"));
        //die();
        $this->seguridad();
        if ($this->input->post("baja")) {
            $this->Alojamiento_model->baja($this->input->post("baja"));
        }
        redirect('alojamiento/mis_alojamientos');
    }

    public function estados()
    {
        $consulta['estados'] = $this->Alojamiento_model->estados();

        return $consulta;
    }

    public function modificacion_estado()
    {
        $this->seguridad();
        if ($this->input->post("modificar_estado")) {
            $product = $this->Alojamiento_model->alojamiento($this->input->post("modificar_estado"));
            $estados = $this->estados();

            //$data = array_merge($product, $estados);
            //$data['product'] = $product;
            //print_r($data);
            //die();
            $data['product'] = $product;
            $data['estados'] = $estados;
            $this->load->view("usuario/usuario_head");
            $this->load->view("usuario/usuario_top_nav");
            $this->load->view("usuario/usuario_side_nav");
            $this->load->view("usuario/modificacion_estado_alojamiento", $data);
            $this->load->view("usuario/usuario_footer");
        }
    }

    public function modificacion_galeria()
    {
        if ($this->input->post("modificar_galeria")) {
            $product = $this->Alojamiento_model->alojamiento($this->input->post("modificar_galeria"));
            $galeria = $this->Alojamiento_model->galeria($this->input->post("modificar_galeria"));

            //$data = array_merge($product, $estados);
            //$data['product'] = $product;
            //print_r($data);
            //die();
            $data['product'] = $product;
            $data['galeria'] = $galeria;
            $this->load->view("usuario/usuario_head");
            $this->load->view("usuario/usuario_top_nav");
            $this->load->view("usuario/usuario_side_nav");
            $this->load->view("usuario/modificacion_galeria", $data);
            $this->load->view("usuario/usuario_footer");
        }
    }

    public function agregar_servicios()
    {
        //print_r($_POST);
        //die();
        $this->Alojamiento_model->agregar_servicios($_POST['chequeados'], $_POST['id_alojamiento']);
    }

    public function modificar_galeria()
    {

        //if($this->input->post("modificar_estado")){
        //print_r($_POST);
        //print_r($_REQUEST);
        //die();
        //print_r($_POST['id_alojamiento']);
        //die();
        $this->Alojamiento_model->modificar_galeria($_POST['id_alojamiento'],$_POST['chequeados']);
        //}
        //cuidado --------------------------------> redirect('alojamiento/mis_alojamientos');
    }

    public function agregacion_fotos()
    {
        $this->seguridad();
        $id_alojamiento = $this->input->post("agregar_fotos");

        $data['id_alojamiento'] = $id_alojamiento;

        $this->load->view("usuario/fine_uploader_head");
        $this->load->view("usuario/usuario_top_nav");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("usuario/agregar_fotos", $data);
        $this->load->view("usuario/usuario_footer");

    }

    public function agregacion_servicios()
    {
        $this->seguridad();
        $id_alojamiento = $this->input->post("agregar_servicios");

        $data['id_alojamiento'] = $id_alojamiento;

        $data['servicios_disponibles'] = $this->servicios_disponibles($id_alojamiento);
        $data['todos_los_servicios'] = $this->todos_los_servicios();

        //print_r($data['servicios_disponibles']);
        //print_r("-------------------------------");
        //print_r($data['todos_los_servicios']);
        //die();
        //print_r($data);
        //die();

        $this->load->view("usuario/fine_uploader_head");
        $this->load->view("usuario/usuario_top_nav");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("usuario/agregar_servicios", $data);
        $this->load->view("usuario/usuario_footer_servicios");
    }

    public function servicios_disponibles($id_alojamiento)
    {
        return $this->Alojamiento_model->servicios_disponibles($id_alojamiento);
    }

    public function todos_los_servicios()
    {
        return $this->Alojamiento_model->todos_los_servicios();
    }

    public function modificaciones()
    {
        $this->seguridad();
        if ($this->input->post("modificar")) {
            $product = $this->Alojamiento_model->alojamiento($this->input->post("modificar"));
            $tipos = $this->tipos();
            $localidades = $this->localidades();

            $data = array_merge($tipos, $localidades);
            $data['product'] = $product;
            
            $this->load->view("usuario/usuario_head");
            $this->load->view("usuario/usuario_top_nav");
            $this->load->view("usuario/usuario_side_nav");
            $this->load->view("usuario/modificaciones_alojamiento", $data);
            $this->load->view("usuario/usuario_footer");
        }
    }

    public function modificar()
    {
    
        $this->seguridad();
        if ($this->input->post("modificar")) {
            
            $this->Alojamiento_model->modificar(
                $this->input->post("id"),
                $this->input->post("tipo"),
                $this->input->post("precio"),
                $this->input->post("localidad"),
                $this->input->post("direccion_nombre"),
                $this->input->post("direccion_numero")
            );
        }
        redirect('alojamiento/mis_alojamientos');
    }

    public function modificar_estado()
    {
        //print_r($this->input->post("baja"));
        //die();
        $this->seguridad();
        if ($this->input->post("modificar_estado")) {
            //print_r($this->input->post("localidades"));
            //die();
            //print_r($this->input->post("estado"));
            //die();
            $this->Alojamiento_model->modificar_estado(
                $this->input->post("id"),
                $this->input->post("estado")
            );
        }
        redirect('alojamiento/mis_alojamientos');
    }

    public function reservar(){
        $this->seguridad();
        $precio_noche = $this->input->post("precio_noche");   
        $id_alojamiento = $this->input->post("reserva");

        $data['precio_noche'] = $precio_noche;
        $data['id_alojamiento'] = $id_alojamiento;
        $this->load->view("realizar_reserva_view", $data);  
    }

    public function generar_reserva(){
        $this->seguridad();
        if(!$this->input->post("precio_noche")){
           redirect('inicio');
        }
        if(!$this->input->post("id_alojamiento")){
           redirect('inicio');
        }
        $precio_noche = $this->input->post("precio_noche");
        $id_alojamiento = $this->input->post("id_alojamiento");

        $fecha_desde = date_create($this->input->post("fecha_desde"));
        $fecha_hasta = date_create($this->input->post("fecha_hasta"));

        $dif=date_diff($fecha_desde,$fecha_hasta);
        $dias = $dif->format("%a");

        $precio_total = $dias * $precio_noche;

        if($this->Alojamiento_model->almacenar_reserva($_SESSION['id'],$id_alojamiento, $precio_total, $fecha_desde, $fecha_hasta)){
            redirect(base_url().'alojamiento/mis_reservas'); 
        } else{
            $datos = array();
            $datos['id_usuario']=$_SESSION['id'];
            $datos['id_alojamiento']=$id_alojamiento;
            $datos['precio_noche']=$precio_noche;

            $this->session->set_flashdata('datos_redirect', $datos);
            redirect(base_url().'alojamiento/reservar'); 
        }
       
    }
    
    public function mis_reservas(){
        //$this->seguridad();
        $this->load->library('pagination');
        $id = $_SESSION['id'];
        $config['total_rows'] = $this->total_mis_reservas($id);
        $config['base_url'] = base_url().'alojamiento/mis_reservas';

        $config = $this->configurarPaginado($config);
        $this->pagination->initialize($config);
        //$data['products'] = $this->reservas($config['per_page'], $id);
        $data['products'] = $this->Alojamiento_model->mis_reservas($config['per_page'], $id);
        //mis_reservas
        $this->load->view("usuario/usuario_head");
       
        $this->load->view("usuario/usuario_top_nav");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("usuario/usuario_mis_reservas", $data);
        $this->load->view("usuario/usuario_footer");
    }  

    public function reservas_clientes(){
        $this->seguridad();
        $id = $_SESSION['id'];
        $reservas_clientes=$this->Alojamiento_model->reservas_clientes($id);
        //print_r($id); 
        //print_r($reservas_clientes);
        //die();
        $data['reservas_clientes'] =  $reservas_clientes;
        $this->load->view("usuario/mis_clientes",$data);
    } 

    public function reservas_todas(){
        if(!isset($this->session->userdata['logged_in'])){
            $this->session->set_flashdata('ultima_url', current_url());
            redirect('login');
        }
        $reservas_todas=$this->Alojamiento_model->reservas_todas();
        $data['reservas_todas'] = $reservas_todas;
        $this->load->view("usuario/reservas_todas_view",$data);
    }

    private function reservas($limite, $id)
    {
        $this->seguridad();
        return $this->Alojamiento_model->mis_reservas($limite, $id);
    }

    public function reserva_confirmar(){
        $this->seguridad();
        $id_reserva = $this->input->post("confirmar");
        $this->Alojamiento_model->cliente_corfirmar($id_reserva); 

        redirect(base_url("alojamiento/mis_reservas"));
    }

    public function reserva_confirmar_duenio(){
        $this->seguridad();
        $id_reserva = $this->input->post("confirmar");
        $this->Alojamiento_model->cliente_corfirmar_duenio($id_reserva); 

        redirect(base_url("alojamiento/reservas_clientes"));
    }
    

    public function reserva_baja(){
        $this->seguridad();
        $id_reserva = $this->input->post("baja");
        $this->Alojamiento_model->reserva_baja($id_reserva); 

        redirect(base_url("alojamiento/mis_reservas"));
    }
    
    public function mis_pagos(){
        $this->seguridad();
        $id = $_SESSION['id'];
        $aux = $this->Alojamiento_model->mis_reservas_simple($id);

        $mis_reservas=null;  
        foreach ($aux as $reserva) {
            if(($reserva->confirmacion_cliente == 'confirmado') and ($reserva->confirmacion_dueño == 'confirmado')){
                $mis_reservas[]=$reserva; 
            }
        }
        //print_r($mis_reservas);
        //die();
        $data['mis_pagos'] =  $mis_reservas;
        $this->load->view("usuario/mis_pagos",$data);
    }

    public function pagar(){
        $this->seguridad();
        $id_reserva = $this->input->post("pagar");
        $this->Alojamiento_model->reserva_pagar($id_reserva);
       

        redirect(base_url("alojamiento/mis_reservas"));
    }  
    
    public function puntuar_alojamiento(){
        //print_r($_POST);
        //print_r($_POST);
        //die();
        $this->seguridad();
        if(isset($_POST['rating'])){
            $rating = $_POST['rating'];
            $id_alojamiento = $_POST['alojamiento'];
            $id_cliente = $_SESSION['id'];
            $this->Alojamiento_model->puntuar_alojamiento($id_cliente, $id_alojamiento, $rating);
            $this->session->set_flashdata('valoracion','ok');
        }else{
            $this->session->set_flashdata('valoracion','mal');
        }
        redirect('usuario/lugares');
        //die();
    }
      
    public function baja_servicio(){
        $id_alojamiento = $_POST['id_alojamiento'];
        $id_servicio = $_POST['id_servicio'];
        $this->Alojamiento_model->baja_servicio($id_alojamiento, $id_servicio);
        
        $todos_los_servicios = array();
        $servicios_disponibles = array();

        $todos_los_servicios = $this->todos_los_servicios();
        $servicios_disponibles = $this->servicios_disponibles($id_alojamiento);

        $this->session->set_flashdata('id_alojamiento', $id_alojamiento);
        $this->session->set_flashdata('todos_los_servicios', $todos_los_servicios);
        $this->session->set_flashdata('servicios_disponibles', $servicios_disponibles);
        redirect('alojamiento/agregacion_servicios');
    }

    public function pagos_todos(){
        if(!isset($this->session->userdata['logged_in'])){
            $this->session->set_flashdata('ultima_url', current_url());
            redirect('login');
        }
        $reservas_todas=$this->Alojamiento_model->reservas_todas();
        $data['reservas_todas'] = $reservas_todas;
        $this->load->view("usuario/pagos_todos_view",$data);
    }
     /*
Array ( [0] => stdClass Object ( [id] => 70 [seña] => 0 [precio_total] => 10000 [pago_seña] => pendiente [pago_resto] => 0 
[fecha_realizacion] => 2018-11-23 [fecha_inicio] => 2018-11-01 [fecha_fin] => 2018-11-11 [id_estado] => 3 
[id_alojamiento] => 70 [id_usuario] => 1 [confirmacion_cliente] => confirmado [confirmacion_dueño] => confirmado 
[precio] => 1000 [id_localidad] => 2 [direccion_nombre] => Direccion muestra [direccion_numero] => 100 [id_tipo] => 4 
[default_foto] => /pruebaTemplate2/fotos_alojamientos/21220336041436567728casa_interior.jpg ) )
        */
}
