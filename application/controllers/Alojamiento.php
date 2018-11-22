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

        //$this->load->library('upload');

    }

    public function index()
    {

        /*
        if(!isset($this->session->userdata['logged_in'])){
        redirect('login');
        }
         */
        // redirect(base_url());
        $this->load->view("buscador");
    }

    public function crear_alojamiento()
    {
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
            $this->session->set_flashdata('correcto', 'Usted se ha registrado correctamente');
            $data = $this->id_alojamiento($this->input->post("direccion_nombre"), $this->input->post("direccion_numero"));
            //print_r($idalojamiento);
            //die(); <--------------------------------------------------------acaaaaaaaaaaaaaaaaaaaaaaaa va la prueba

            //print_r($data);
            //die();
            $this->load->view("alta_alojamiento_fotos_view", array('id_alojamiento' => $data));

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

        $config['upload_path'] = '/var/www/html/pruebaTemplate2/fotos_alojamientos/';

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

            $path = '/pruebaTemplate2/fotos_alojamientos/' . $nombre;

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

        if (isset($_GET['localidad'])) {
            $localidad = $_GET['localidad'];
        } else {
            $localidad = $_GET['nueva_localidad'];
        }

        //print_r($_GET['tipo_actual']);
        //die();  

        if (isset($_GET['tipo_actual'])) {
            $tipo = $_GET['tipo_actual'];
        } else {
            $tipo = null;
        }

        /*
        <button type="input" type="sumbit" name="casa" class="w3-bar-item w3-button w3-text-black" value="casa"> Casa</button>
        <button type="input" type="sumbit" name="departamento" class="w3-bar-item w3-button w3-text-black" value="departamento"> Departamento</button>
        <button type="input" type="sumbit" name="hotel" class="w3-bar-item w3-button w3-text-black" value="hotel"> Hotel</button>
        <button type="input" type="sumbit" name="cabaña" class="w3-bar-item w3-button w3-text-black" value="cabaña"> Cabaña</button>
        <button type="input" type="sumbit" name="chalet" class="w3-bar-item w3-button w3-text-black" value="chalet"> Chalet</button>
        <button type="input" type="sumbit" name="monoambiente" class="w3-bar-item w3-button w3-text-black" value="monoambiente"> Monoambiente</button>
         */
        if ($tipo != null) {
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
                                if (isset($_GET['monoambiente'])) {
                                    $tipo = "monoambiente";
                                }
                            }
                        }
                    }
                }

            }
        }

        //print_r($tipo);
        //die();

        $limite_precio = null;

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
        if ($limite_precio == null and $tipo == null) {
            $data['products'] = $this->alojamientosFiltrado($config['per_page'], $localidad, $filtros);
            $config['total_rows'] = $this->totalFilasFiltrado($localidad, $filtros);
        } else {
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

    public function agregar_servicios(){
        print_r($_POST);
        die();
        $this->Alojamiento_model->agregar_servicios($_POST['chequeados']);
    }

    public function modificar_galeria()
    {

        //if($this->input->post("modificar_estado")){
        //print_r($_POST);
        //print_r($_REQUEST);
        //die();
        $this->Alojamiento_model->modificar_galeria($_POST['chequeados']);
        //}
        //cuidado --------------------------------> redirect('alojamiento/mis_alojamientos');
    }

    public function agregacion_fotos()
    {
        //if($this->input->post("agregar_fotos")){
        $id_alojamiento = $this->input->post("agregar_fotos");
        //$product = $this->Alojamiento_model->alojamiento($this->input->post("agregar_fotos"));
        //$galeria = $this->Alojamiento_model->galeria($this->input->post("agregar_fotos"));
        //print_r($data);
        //die();

        //$data = array_merge($product, $estados);
        //$data['product'] = $product;
        //print_r($data);
        //die();
        //$data['product']=$product;
        //$data['galeria']=$galeria;
        //"alta_alojamiento_fotos_view", array('id_alojamiento' => $data)
        $data['id_alojamiento'] = $id_alojamiento;
        //$this->load->view("alta_alojamiento_fotos_view", $data);
        //$this->load->view("alta_alojamiento_fotos_view");

        $this->load->view("usuario/fine_uploader_head");
        $this->load->view("usuario/usuario_top_nav");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("usuario/agregar_fotos", $data);
        $this->load->view("usuario/usuario_footer");

        //}
    }

    public function agregacion_servicios()
    {
        $id_alojamiento = $this->input->post("agregar_servicios");
    
        $data['id_alojamiento'] = $id_alojamiento;
       
        $data['servicios_disponibles'] = $this->servicios_disponibles($id_alojamiento);
        $data['todos_los_servicios'] = $this->todos_los_servicios();

        //print_r($data);
        //die(); 

        $this->load->view("usuario/fine_uploader_head");
        $this->load->view("usuario/usuario_top_nav");
        $this->load->view("usuario/usuario_side_nav");
        $this->load->view("usuario/agregar_servicios", $data);
        $this->load->view("usuario/usuario_footer");
    }
    
    public function servicios_disponibles($id_alojamiento){
        return $this->Alojamiento_model->servicios_disponibles($id_alojamiento);     
    }  

    public function todos_los_servicios(){
        return $this->Alojamiento_model->todos_los_servicios();
    }  

    
    public function modificaciones()
    {
        if ($this->input->post("modificar")) {
            $product = $this->Alojamiento_model->alojamiento($this->input->post("modificar"));
            $tipos = $this->tipos();
            $localidades = $this->localidades();

            /*
            $user = json_decode($product)[0];
            print_r($user);
            die();
             */
            $data = array_merge($tipos, $localidades);
            $data['product'] = $product;
            //print_r($data);
            //die();
            /*
            print_r(array_pop($product));
            die();
            print_r($product);
            die();
             */
            $this->load->view("usuario/usuario_head");
            $this->load->view("usuario/usuario_top_nav");
            $this->load->view("usuario/usuario_side_nav");
            $this->load->view("usuario/modificaciones_alojamiento", $data);
            $this->load->view("usuario/usuario_footer");
        }
    }

    public function modificar()
    {
        //print_r($this->input->post("baja"));
        //die();

        if ($this->input->post("modificar")) {
            //print_r($this->input->post("localidades"));
            //die();
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

}
