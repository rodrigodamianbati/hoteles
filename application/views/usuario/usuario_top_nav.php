<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="<?php echo base_url(); ?>">Aloj.ar</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="<?php echo base_url()."assets/"; ?>#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Ej: Carmen de Patagones" aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form> -->

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
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url()."assets/"; ?>#" data-toggle="modal" data-target="#logoutModal">Salir</a>
          </div>
        </li>
      </ul>
      </div>

    </nav>



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
            <!--<a class="btn btn-primary" href="<//?php echo base_url()."assets"; ?>login.html">Logout</a>-->
            <a class="btn btn-primary" href="<?=base_url("login/cerrar_sesion");?>">Cerrar Sesion</a>

            <!--PROBAAAAAAAAAAAAAAAAAAAAAAAAAAAAAANDO REGISTRO-->
          </div>
        </div>
      </div>
    </div>


    