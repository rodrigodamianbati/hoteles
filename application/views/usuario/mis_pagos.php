<?php
//print_r($mis_pagos);
//die(); 
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenido a su perfil!</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()."assets/"; ?>css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="<?php echo base_url()."assets/"; ?>index.html">Aloj.ar</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="<?php echo base_url()."assets/"; ?>#">
        <i class="fas fa-bars"></i>
      </button>


      <!-- Navbar -->
      <div class="collapse navbar-collapse justify-content-end"> 
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url()."assets/"; ?>#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Action</a>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url()."assets/"; ?>#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Action</a>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url()."assets/"; ?>#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Ajustes</a>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Actividad</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
          </div>
        </li>
      </ul>

    </nav>

    </div>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo base_url()."usuario"; ?>">
          <i class="fas fa-users-cog"></i>
            <span>Usuarios</span>
          </a>
        </li>
        
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()."usuario/administrar_contrasenias"; ?>">
          <i class="fas fa-key"></i>
            <span>Contraseñas</span></a>
        </li>


        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()."usuario/administrar_contrasenias"; ?>">
          <i class="fas fa-shopping-cart"></i>
            <span>Reservas</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()."usuario/administrar_contrasenias"; ?>">
          <i class="fas fa-money-check-alt"></i>
            <span>Pagos</span></a>
        </li>
       
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

         
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-users"></i>
              Reservas pendientes/pagadas</div>
            <div class="card-body">
            <div><button type="button" class="btn btn-primary btn-xs" onclick="location.href='<?php echo base_url();?>registro'">Agregar usuario</button></div>
            <br>
              <div id="tablaUsuarios" class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
  <!-- Array ( [0] => stdClass Object ( [id] => 70 [seña] => 0 [precio_total] => 10000 [pago_seña] => pendiente [pago_resto] => 0 
[fecha_realizacion] => 2018-11-23 [fecha_inicio] => 2018-11-01 [fecha_fin] => 2018-11-11 [id_estado] => 3 
[id_alojamiento] => 70 [id_usuario] => 1 [confirmacion_cliente] => confirmado [confirmacion_dueño] => confirmado 
[precio] => 1000 [id_localidad] => 2 [direccion_nombre] => Direccion muestra [direccion_numero] => 100 [id_tipo] => 4 
[default_foto] => /pruebaTemplate2/fotos_alojamientos/21220336041436567728casa_interior.jpg ) ) -->
                    <tr>
                      <th>Fecha Inicio</th>
                      <th>Fecha Fin</th>
                      <th>Pago total</th>
                      <th>Estado pago</th>
                      <th>Direccion</th>
                      <th>Accion</th>  
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                      foreach($mis_pagos as $fila){

                        //$idUso=$fila->id_cliente."//";
                    
                      //$datos= $fila->id_cliente."//". 
                      //$fila->nombre."//". 
                      //$fila->apellido."//".
                      //$fila->dni."//".
                      //$fila->fecha_nacimiento."//".
                      //$fila->email."//";
                      //$fila->contraseña."//";
                    
                      // print_r($datos);
                      // die();
                     
                      ?> 
                      <tr>
                      <td>
                        <?=$fila->fecha_inicio;?>
                      </td>
                      
                      <td>
                          <?=$fila->fecha_fin;?>
                      </td>
                      <td>
                          <?=$fila->precio_total;?>
                      </td>
                      <td>
                        <?=$fila->pago_seña;?>
                      </td>
                      <td>
                         <?=$fila->direccion_nombre." ".$fila->direccion_numero;?>
                      </td>
                        
                      <td>
                      <form action="<?=base_url("alojamiento/pagar");?>" method="post">
                            <button name="pagar" value="<?php echo $fila->id_reserva?>" title="Pagar" class="btn btn-dark btn-xs"></button>
                      </form>
                        

                        <form action="<?=base_url("alojamiento/reserva_baja");?>" method="post">
                             <button name="baja" value="<?php echo $fila->id_reserva?>" title="Eliminar" class="btn btn-dark btn-xs" data-toggle="modal">
                            </button>
                        </form>

                            
                       
                      </td>                      
                  <?php  } ?>
                  </tr>      
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>


        </div>
        <!-- /.container-fluid -->


      <!-- script para actualizar los dato de la tabla luego de la modificacion --> 
        <script type="text/javascript">

          function actualizarTabla(){
               location.reload();
          }

        </script> 

         
        
        <!-- script autocompletar formulario de modificacion-->
        <script type="text/javascript">
            function agregarForm(datos){
              d=datos.split('//');
              
              $('#idpersona').val(d[0]);
              $('#nom').val(d[1]);
              $('#ape').val(d[2]);
              $('#dni').val(d[3]);
              $('#fecnac').val(d[4]);
              $('#ema').val(d[5]);
              $('#cont').val(d[6]);
            
              }
		    	</script>

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Aloj-ar 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="<?php echo base_url()."assets/"; ?>#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<!-- script onclick del button modal llenar los input del editar  -->
<script type="text/javascript">
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
            url:"<?php echo base_url()."usuario/modificarUsuario"?>",
            data: $cadena,
            
            success:function(r){
              
              actualizarTabla();
             
            }
          });
            }
		    	</script>
    

      <!-- Modal para editar usuario-->
      <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Ingrese los nuevos datos del usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">

       
                  
                <input type="text" hidden="" id="idpersona" name="">
                
                <label>Nombre</label>
                <input type="text" name="" id="nom" class="form-control input-sm">
                <br>
                <label>Apellido</label>
                <input type="text" name="" id="ape" class="form-control input-sm">
                <br>
                <label>DNI</label>
                <input type="text" name="" id="dni" class="form-control input-sm">
                <br>
                <label>Fecha Nacimiento</label>
                <input type="date" name="" id="fecnac" class="form-control input-sm">
                <br>
                <label>Email</label>
                <input type="text" name="" id="ema" class="form-control input-sm">
                <br>
               
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button id="actualizar" type="button" class="btn btn-primary " onclick="actualizarDatos()"> Continuar</button>
            </div>
          </div>
        </div>
      </div>


<!-- script eliminacion usuario -->
      <script type="text/javascript">
                  function eliminarUsuario(){
                   var id= $('#idper').val();
                  
                   
                    
                    $.ajax({
                      type:"POST",
                      url:"<?php echo base_url()."usuario/eliminarUsuario"?>",
                      data: {id},
                      
                      success:function(r){
                    
                        location.reload();
                    //  alert(r);
                    
                  }
                });
                    }
      </script>


      <script type="text/javascript">
                  function agregaridElim(idUso){
                    d=idUso.split('//');

                    
                   $('#idper').val(d[0]);
                   
                    
                    }
      </script>
       
       

       <!-- Modal para eliminar usuario-->
       <div class="modal fade" id="modalEliminacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">¿Desea eliminar este usuario?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
            <div class="modal-body">
            <input type="text" hidden="" id="idper" name="">
              Seleccione "Continuar" si quiere continuar con la eliminacion.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button id="eliminar" type="button" class="btn btn-primary " onclick="eliminarUsuario()"> Continuar</button>
              <!-- <button type="button" class="btn btn-primary">Continuar</button> -->
            </div>
          </div>
        </div>
      </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Cerrar Sesion" debajo si esta listo para cerrar la sesion.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            
            <a class="btn btn-primary" href="<?=base_url()."inicio/cerrar_sesion";?>">Cerrar Sesion</a>

            <!--PROBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANDO REGISTRO-->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url()."assets/"; ?>js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo base_url()."assets/"; ?>js/demo/datatables-demo.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>js/demo/chart-area-demo.js"></script>

  </body>

</html>