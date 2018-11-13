<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="<?php echo base_url()."src/img/"?>logo.jpg" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <div class="collapse navbar-collapse justify-content-end"> 
  <ul class="navbar-nav">
  <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()."registro/"; ?>"><i class="fas fa-user"></i> Registrarse</a>
    </li>

    <li><h3 class="separador">|</h3></li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url()."login/"; ?>"><i class="fas fa-sign-in-alt"></i>  Iniciar Sesion</a>
    </li>
  </ul>

  </div>
</nav>
