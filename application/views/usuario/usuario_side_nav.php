<?php 
$CI =& get_instance();
$CI->load->model("Usuario_model");
$usuario = $CI->Usuario_model->getUsuario($_SESSION['id'])[0];
?>


<div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url()."inicio"; ?>">
    <i class="fas fa-home"></i>
      <span>Inicio</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="<?php echo base_url()."assets/"; ?>#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Paginas</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <h6 class="dropdown-header">Login Screens:</h6>
      <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>login.html">Inicio de sesion</a>
      <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>register.html">Registro</a>
      <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>forgot-password.html">Olvide mi contraseña</a>
      <div class="dropdown-divider"></div>
      <h6 class="dropdown-header">Other Pages:</h6>
      <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>404.html">404 Page</a>
      <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>blank.html">Blank Page</a>
    </div>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="<//?php echo base_url()."assets/"; ?>charts.html">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li> -->
  <!-- <li class="nav-item">
    <a class="nav-link" href="<//?php echo base_url()."assets/"; ?>tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li> -->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url()."alojamiento/mis_alojamientos"; ?>">
    <i class="fas fa-hotel"></i>
      <span>Mis Alojamientos</span></a>
  </li>
  <!--li class="nav-item">
    <a class="nav-link" href="<//?php echo base_url()."assets/"; ?>tables.html">
      <i class="fas fa-home"></i>
      <span>Alojamientos</span></a>
  </li-->
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url()."alojamiento/mis_reservas"; ?>">
    <i class="fas fa-shopping-cart"></i>
      <span>Mis Reservas</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url()."alojamiento/mis_pagos"; ?>">
    <i class="fas fa-shopping-cart"></i>
      <span>Pagos pendientes</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url()."alojamiento/reservas_clientes"; ?>">
    <i class="fas fa-shopping-cart"></i>
      <span>Reservas de mis clientes</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url()."usuario/lugares"; ?>">
    <i class="fas fa-globe-americas"></i>
    <!--i class="fas fa-shopping-cart"></i-->
      <span>Lugares visitados</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url()."usuario/chat"; ?>">
    <i class="fas fa-comment"></i>
    <!--i class="fas fa-shopping-cart"></i-->
      <span>Mis chats</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#modalEdicion" onClick="agregarForm('<?php echo $usuario->id ?>')">
    <i class="fas fa-edit"></i>
    <!--i class="fas fa-shopping-cart"></i-->
      <span>Editar mi perfil</span></a>
  </li>
  <!--li class="nav-item">
  <button id="button-edit" title="Editar" type="button" class="nav-link" data-toggle="modal" data-target="#modalEdicion" onclick="agregarForm('<?php echo $usuario->id ?>')">
    <i class="fas fa-edit"><span>Editar mi perfil</span></i>
  </button-->
  </li>
</ul>

<script type="text/javascript">
            function agregarForm(datos){
              /*
              d=datos.split('//');
              
              $('#idpersona').val(d[0]);
              $('#nom').val(d[1]);
              $('#ape').val(d[2]);
              $('#dni').val(d[3]);
              $('#fecnac').val(d[4]);
              $('#ema').val(d[5]);
              $('#cont').val(d[6]);
            */
              }
</script>

<!-- script onclick del button modal llenar los input del editar  -->
<!--script type="text/javascript">
            function actualizarDatos(){
              $id=$('#idpersona').val();
              $nombre= $('#nom').val();
              $apellido=$('#ape').val();
              $dni=$('#dni').val();
              $fecNac=$('#fecnac').val();
              $email=$('#ema').val();
            
            

               $cadena= "id=" + $id +
              "&nombre=" + $nombre + 
              "&apellido=" + $apellido +
              "&dni=" + $dni +
              "&fechaNacimiento=" + $fecNac +
              "&email=" + $email ;


            

          $.ajax({
            type:"POST",
            url:"<//?php echo base_url()."usuario/modificarUsuario"?>",
            data: $cadena,
            
            success:function(r){
              console.log("se modifico usuario");
              //actualizarTabla();
              console.log("reload");
              location.reload();
            }error:function(response){
              alert("Hubo un error, intentelo nuevamente");
            }
          });
            }
		    	</script-->
    

     
 <!-- Modal para editar usuario-->
 <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Ingrese los nuevos datos del usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">

       
                  
                <input type="text" hidden="" id="idpersona" name="" value=<?php echo $usuario->id?>>
                
                <label>Nombre</label>
                <input type="text" name="" id="nom" class="form-control input-sm" value=<?php echo $usuario->nombre?>>
                <br>
                <label>Apellido</label>
                <input type="text" name="" id="ape" class="form-control input-sm" value=<?php echo $usuario->apellido?>>
                <br>
                <label>DNI</label>
                <input type="text" name="" id="dni" class="form-control input-sm" value=<?php echo $usuario->dni?>>
                <br>
                <label>Fecha Nacimiento</label>
                <input type="date" name="" id="fecnac" class="form-control input-sm" value=<?php echo $usuario->fecha_nacimiento?>>
                <br>
                <label>Email</label>
                <input type="text" name="" id="ema" class="form-control input-sm" value=<?php echo $usuario->email?>>
                <br>
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button id="actualizar" type="button" class="btn btn-primary"> Continuar</button>
            </div>
          </div>
        </div>
      </div>
      <script src="<?php echo base_url()."src/";?>sid-nav.js"></script>

