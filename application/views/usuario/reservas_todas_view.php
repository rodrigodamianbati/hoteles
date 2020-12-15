<?php 
//print_r($reservas_todas);
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
        <!--li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url()."assets/"; ?>#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"-->
            <!--a class="dropdown-item" href="<//?php echo base_url()."assets/"; ?>#">Action</a-->
            <!--a class="dropdown-item" href="<//?php echo base_url()."assets/"; ?>#">Another action</a-->
            <!--div class="dropdown-divider"></div-->
            <!--a class="dropdown-item" href="<//?php echo base_url()."assets/"; ?>#">Something else here</a-->
          <!--/div>
        </li-->
        <!--li class="nav-item dropdown no-arrow mx-1">
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
        </li-->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="<?php echo base_url()."assets/"; ?>#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <!--a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Ajustes</a>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Activity Log</a-->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#" data-toggle="modal" data-target="#logoutModal">Salir</a>
          </div>
        </li>
      </ul>
      </div>

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
          <a class="nav-link" href="<?php echo base_url()."alojamiento/reservas_todas"; ?>">
          <i class="fas fa-shopping-cart"></i>
            <span>Todas las Reservas</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url()."alojamiento/reservas_todas"; ?>">
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
              Todas las Reservas</div>
            <div class="card-body">
            
            <br>
              <div id="tablaUsuarios" class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Email</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Dni</th>
                      <th>Pago total</th>
                      <th>Direccion</th>
                      <th>Estado Reserva</th>
                      <th>Estado Pago</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                      foreach($reservas_todas as $fila){

                        //$idUso=$fila->id_cliente."//";
                    
                     // $datos= $fila->id_cliente."//". 
                      //$fila->nombre."//". 
                      //$fila->apellido."//".
                     // $fila->dni."//".
                      //$fila->fecha_nacimiento."//".
                     // $fila->email."//";
                      //$fila->contraseña."//";
                    
                      // print_r($datos);
                      // die();
                     
                      ?> 
                      <tr>
                      <td>
                        <?=$fila->email;?>
                      </td>
                      
                      <td>
                          <?=$fila->nombre;?>
                      </td>
                      <td>
                          <?=$fila->apellido;?>
                      </td>
                      <td>
                        <?=$fila->dni;?>
                      </td>
                      <td>
                         <?=$fila->precio_total;?>
                      </td>
                      <td>
                         <?=$fila->direccion_nombre." ".$fila->direccion_numero;?>
                      </td>
                      <td>
                         <?=$fila->estado_reserva;?>
                      </td>
                      <td>
                         <?=$fila->pago_seña;?>
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
        

        <!-- Sticky Footer -->
        

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="<?php echo base_url()."assets/"; ?>#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

<!-- script onclick del button modal llenar los input del editar  -->


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
  <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Aloj-ar 2018</span>
            </div>
          </div>
        </footer>
</html>

