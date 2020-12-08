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
</ul>




