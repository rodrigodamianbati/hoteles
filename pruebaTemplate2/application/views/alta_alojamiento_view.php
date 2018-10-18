<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nuevo alojamiento</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()."assets/"; ?>css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5">
        <div class="card-header">Nuevo alojamiento</div>
        <div class="card-body">
          <form action="<?=base_url("alojamiento/alta");?>" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">

                    <select id="tipo" name="tipo" class="form-control" name="tipo" placeholder="Tipo">
                    <label for="tipo">Tipo</label>
                        <?php
                         
                          foreach ($tipos as $tipo) {
                          
                          ?>
                            
                            <option value='<?php echo $tipo->id;?>'><?php echo $tipo->descripcion;?></option>;

                          <?php

                          }
                        ?>
                    </select> 

                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="precio" class="form-control" placeholder="Precio" required="required" name="precio">
                    <label for="precio">Precio</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="direccion_nombre" class="form-control" placeholder="Nombre direccion" required="required" name="direccion_nombre">
                <label for="direccion_nombre">Nombre dirección</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="direccion_numero" class="form-control" placeholder="Numero direccion" required="required" name="direccion_numero">
                    <label for="direccion_numero">Numero dirección</label>
                  </div>
                </div>
                <!--div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmar contraseña" required="required" name="confirmar_contraseña">
                    <label for="confirmPassword">Confirmar contraseña</label>
                  </div>
                </div-->
              </div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Guardar"/>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3">Cancelar</a>
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