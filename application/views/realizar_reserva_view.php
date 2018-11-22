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
      <div class="card card-register mx-auto mt-4 mb-4">
        <div class="card-header">Reserva</div>
        <div class="card-body">
          <form action="<?=base_url()."reserva/generar_reserva?idAloj=".$idAloj?>" method="post">
            

<!-- hacerlo desp -->
            <!-- <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="fecha-desde" id="fecha-desde" class="form-control" placeholder="fecha-desde" required="required" name="fecha-desde">
                    <label for="fecha-desde">Fecha desde</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" id="fecha-hasta" class="form-control" placeholder="Fecha-hasta" required="required" name="fecha-hasta">
                    <label for="fecha-hasta" value="2011-08-19">Fecha hasta</label>
                  </div>
                </div>
              </div>
            </div> -->
            


            <!-- // <div class="form-group">
            // <div class="form-row">
            //     <div class="col-md-6">
            //   <div class="form-label-group">
            //     <input type="cant-personas" id="cant-personas" class="form-control" placeholder="cant-personas" required="required" name="cant-personas">
               <label for="cant-personas">Cantidad de personas</label>
              </div>
             </div>
             </div>
            </div> -->
          


            

            <br>
            <div class="border-bottom">
            <label for="telefono" class="text-dark ">Fecha desde/hasta</label>
            </div>
            <br>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" id="fecha-desde" class="form-control" placeholder="Fecha-desde" required="required" name="fecha-desde">
                    <label for="fecha-desde">Desde</label> 
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-label-group">
                    <input type="date" id="fecha-hasta" class="form-control" placeholder="Fecha-hasta" name="fecha-hasta">
                    <label for="fecha-hasta" >Hasta</label>
                  </div>
                </div>
              </div>
            </div>
            <br>
            
            <input class="btn btn-primary btn-block" type="submit" name="submit" value="Confirmar"/>
          </form>
          
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