<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Iniciar Sesion</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()."assets/"; ?>css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Iniciar Sesion</div>
        <div class="card-body">
          <form action="<?=base_url("login/iniciar_sesion");?>" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="email" class="form-control" required="required" autofocus="autofocus" name="email" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" class="form-control" required="required" name="contraseña" placeholder="Contraseña">
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Recordar Contraseña
                </label>
              </div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Iniciar sesion"/>
          </form>
          <div class="text-center">
            <!--a class="d-block small mt-3" href="register.html">Registrarse</a-->
            <form action="<?=base_url("usuario/registro");?>">
              <button class="d-block small mt-3">Registrarse</button>
            </form>
            <a class="d-block small" href="forgot-password.html">¿Olvido la contraseña?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
