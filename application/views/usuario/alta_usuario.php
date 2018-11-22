<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro</title>




    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url()."assets/"; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url()."assets/"; ?>css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-register mx-auto mt-5 mb-5">
        <div class="card-header">Registrar una cuenta</div>
        <div class="card-body">
          <form action="<?=base_url("usuario/registrar");?>" method="post">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="nombre" class="form-control" placeholder="Nombre" required="required" name="nombre">
                    <label for="nombre">Nombre</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="apellido" class="form-control" placeholder="Apellido" required="required" name="apellido">
                    <label for="apellido">Apellido</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="dni" class="form-control" placeholder="Dni" required="required" name="dni">
                    <label for="dni">DNI</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" id="fecha-nac" class="form-control" placeholder="Fecha-nac" required="required" name="fecha-nac">
                    <label for="fecha-nac" value="2011-08-19">Fecha de Nacimiento</label>
                  </div>
                </div>
              </div>
            </div>
            

    
          


            <div class="form-group">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Direccion Email" required="required" name="email">
                <label for="inputEmail">Direccion Email</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="required" name="contraseña">
                    <label for="inputPassword">Contraseña</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmar contraseña" required="required" name="confirmar_contraseña">
                    <label for="confirmPassword">Confirmar contraseña</label>
                  </div>
                </div>
              </div>
            </div>


           
           <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                  <select id="input-rol" name="rol" class="form-control">
                        <option selected>Seleccionar Rol</option>
                        <?php foreach($rol as $r){ ?>
                            <option value="<?php echo $r->id ?>"> <?php  echo $r->nombre; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>


            <br>
            <div class="border-bottom">
            <label for="ubicacion" class="text-dark ">Ubicacion</label>
            </div>
            <br>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                  <select  id="input-provincia"  name="provincia" class="form-control" onchange="getval(this);">
                        <option selected>Seleccionar Provincia</option>
                        <?php foreach($prov as $provincia){ ?>
                            <option value="<?php echo $provincia->id ?>"> <?php  echo $provincia->nombre; ?></option>
                        <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                  <select  id="input-localidad" name="localidad" class="form-control">
                        <!-- <option selected>Seleccionar Localidad</option> -->
                          
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <br>
            <div class="border-bottom">
            <label for="telefono" class="text-dark ">Telefonos</label>
            </div>
            <br>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="telefono1" class="form-control" placeholder="Telefono1" required="required" name="telefono1">
                    <label for="telefono1">(Codigo Area) Numero</label> 
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="text" id="telefono2" class="form-control" placeholder="Telefono2" name="telefono2">
                    <label for="telefono2" value="2011-08-19">(Codigo Area) Numero</label>
                  </div>
                </div>
              </div>
            </div>
            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Registrar"/>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3">Ingreso</a>
          </div>
        </div>
      </div>
    </div>

<!-- script para manejar provincia -->
<script type="text/javascript">
   function getval(sel){
        var id_prov=sel.value;
        // alert(id_prov);

       $.ajax({

                      type:"GET",
                      url:"<?php echo base_url()."registro/provincia_localidades"?>",
                      data: {id_prov},
                      dataType : 'json',
                      success:function(json){
                        $("#input-localidad").find('option').remove();
                         //<option selected>Seleccionar Localidad</option> 
                        $("#input-localidad").append('<option selected> Seleccionar Localidad </option>');
                             for (i in json){
                          
                          $("#input-localidad").append('<option value='+json[i].id+'>'+json[i].nombre+'</option>');
                             //alert(json[i].nombre);
                        }
                        // crear_combo_localidades(JSON.stringify(json));
                         

                      }

                      
                    
                        
                   
       });
    
  }
</script>



 


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>