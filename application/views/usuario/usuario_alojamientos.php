<?php
//print_r($products[0]->fotos);
//die(); 
?>
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <!--li class="breadcrumb-item">
              <a href="<//?php echo base_url()."alojamiento/crear_alojamiento"; ?>#">Nuevo alojamiento</a>
            </li-->
            <!--li class="breadcrumb-item active">Nuevo alojamiento</li-->
            <button type="button" class="btn btn-primary btn-xs" onclick="location.href='<?php echo base_url();?>alojamiento/crear_alojamiento'">Nuevo alojamiento</button>
          </ol>

          <!-- Icon Cards-->
          <!--div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">26 Nuevos Mensajes!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<//?php echo base_url()."assets/"; ?>#">
                  <span class="float-left">Ver</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-shopping-cart"></i>
                  </div>
                  <div class="mr-5">123 Nuevas reservas!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<//?php echo base_url()."assets/"; ?>#">
                  <span class="float-left">Ver</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div-->

          <!-- Alojamientos del usuario-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamientos</div>
              <div class="w3-row-padding w3-padding-16" id="caja">

    <?php if (count($products) == 0){ ?>
              <h3 class="text-center">Aun no posee alojamientos</h3>
    <?php  }?>
    <?php foreach ($products as $product){ ?>
    <hr>
    <div class="w3-third w3-margin-bottom alojamiento-contenedor text-center mb-2">
 
    <?php if( empty ($product->fotos) ){ ?>
      <img class="d-block w-10" style="margin:auto;" src='<?php echo base_url().$product->foto?>'>
    <?php } else {?>
    
    <!-- caruuuuuuuuuuuuuuuuuuuuusel -->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php $i=0; foreach ($product->fotos as $foto) {?>
    <?php if ($i==0) {?>
      <div class="carousel-item active">
      <img class="d-block w-10" style="margin:auto;" src='<?php echo base_url().$foto->foto_url?>' alt="First slide">
    <?php } else{ if($i==1) {?>
      <div class="carousel-item">
      <img class="d-block w-10" style="margin:auto;" src='<?php echo base_url().$foto->foto_url?>' alt="Second slide">
    <?php } else { if ($i==2){?>
      <div class="carousel-item">
      <img class="d-block w-10" style="margin:auto;" src='<?php echo base_url().$foto->foto_url?>' alt="Third slide">
    </div>
  <?php }}} $i++; ?>
  </div>
<?php }?>
  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php }?>
 <!-- caruuuuuuuuuuuuuuuuuuuuusel -->
      <!--img src='<//?php echo base_url().$product->foto?>' alt="Norway" style="width:30%"-->
      
      <div class="w3-container alojamiento-descripcion">    <!--w3-white-->
        <h3><?php echo $product->tipo?></h3>
        <h6 class="w3-opacity">$ <?php echo $product->precio?></h6>
        <p>Estado: <?php echo $product->estado?></p>
        <p>Direccion: <?php echo $product->direccion_nombre?>, <?php echo $product->direccion_numero?></p>
        
        <p class="w3-large">
    <?php   //if (empty($product->servicios)) { ?>
<!--<i class="fa fa-television"></i--> 
    <?php  //} else{ 
        $prueba = $product->servicios;
        if (empty($prueba)){ ?>
            <i class="fa fa-ban" data-title="Sin servicios disponibles"> Sin servicios disponibles</i>

      <?php  }
        //print_r($product->servicios[1]);
        //die();
        foreach($product->servicios as $servicio) { 
            if ($servicio->descripcion == "baniera") { ?>
                    <i class="fa fa-bath"></i> 
            <?php } else { 
                if ($servicio->descripcion == "internet") { ?>
                    <i class="fa fa-wifi"></i>
           <?php } else { 
                if ($servicio->descripcion == "telefono") {?>
                    <i class="fa fa-phone"></i>
            <?php } else { 
                if ($servicio->descripcion == "television") {?>
                    <i class="fa fa-tv"></i>
            <?php } else {
                if ($servicio->descripcion == "garage") {?>
                    <i class="fa fa-car"></i>
        <?php } } } } } }?>
        </p>
        <div class="row">
          <div class="col-sm-12">
          <!--form action="<//?=base_url("alojamiento/baja");?>" style="float: left; margin-right:10px; margin-left:30px;" method="post"-->
          <li style="list-style-type: none;"><button name="id_alojamiento" value="<?php echo $product->id ?>" class="btn btn-sm btn-danger" style="float: left; margin-right:10px; margin-left:20px;" data-toggle="modal" data-target=<?php echo ("#modalConfirmar".$product->id)?>>Eliminar</button></li>
          <!--button name="baja" value="<//?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Baja</button-->
        <!--/form-->
          <form action="<?=base_url("alojamiento/modificaciones");?>" style="float: left; margin-right:10px;" method="post">
          <button name="modificar" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar</button>
        </form>
        
          <form action="<?=base_url("alojamiento/modificacion_estado");?>"style="float: left; margin-right:10px;" method="post">
          <button name="modificar_estado" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar estado</button>
        </form>
        
          <form action="<?=base_url("alojamiento/modificacion_galeria");?>" style="float: left; margin-right:10px;"method="post">
          <button name="modificar_galeria" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar galeria</button>
        </form>
         
          <form action="<?=base_url("alojamiento/agregacion_fotos");?>" style="float: left; margin-right:10px;"method="post">
          <button name="agregar_fotos" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Agregar fotos a la galeria</button>
        </form>
         
          <form action="<?=base_url("alojamiento/agregacion_servicios");?>" style="margin-right:20px;" method="post">
          <button name="agregar_servicios" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Servicios</button>
        </form>
          </div>
        </div>

        <!--div class="row">
          <div class="col-sm">
          <form action="<?=base_url("alojamiento/baja");?>" method="post">
          <button name="baja" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Baja</button>
        </form>
          </div>
          <div class="col-sm">
          <form action="<?=base_url("alojamiento/modificaciones");?>" method="post">
          <button name="modificar" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar</button>
        </form>
          </div>
          <div class="col-sm">
          <form action="<?=base_url("alojamiento/modificacion_estado");?>" method="post">
          <button name="modificar_estado" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar estado</button>
        </form>
          </div>
          <div class="col-sm">
          <form action="<?=base_url("alojamiento/modificacion_galeria");?>" method="post">
          <button name="modificar_galeria" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar galeria</button>
        </form>
          </div>
          <div class="col-sm">
          <form action="<?=base_url("alojamiento/agregacion_fotos");?>" method="post">
          <button name="agregar_fotos" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Agregar fotos a la galeria</button>
        </form>
          </div>
          <div class="col-sm">
          <form action="<?=base_url("alojamiento/agregacion_servicios");?>" method="post">
          <button name="agregar_servicios" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Agregar nuevos servicios al alojamiento </button>
        </form>
          </div>
        </div-->

        <!--form action="<?=base_url("alojamiento/baja");?>" method="post">
          <button name="baja" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Baja</button>
        </form>
        <form action="<?=base_url("alojamiento/modificaciones");?>" method="post">
          <button name="modificar" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar</button>
        </form>
        <form action="<?=base_url("alojamiento/modificacion_estado");?>" method="post">
          <button name="modificar_estado" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar estado</button>
        </form>
        <form action="<?=base_url("alojamiento/modificacion_galeria");?>" method="post">
          <button name="modificar_galeria" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Modificar galeria</button>
        </form>
        <form action="<?=base_url("alojamiento/agregacion_fotos");?>" method="post">
          <button name="agregar_fotos" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Agregar fotos a la galeria</button>
        </form>
        <form action="<?=base_url("alojamiento/agregacion_servicios");?>" method="post">
          <button name="agregar_servicios" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Agregar nuevos servicios al alojamiento </button>
        </form-->
      </div>
    </div>
    <hr>
    <?php } //} ?>
</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- MODALLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLS -->


<?php foreach ($products as $alojamiento) {?>
        <div class="modal fade" id="<?php echo ("modalConfirmar".$alojamiento->id) ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel" style="margin:auto;">¿Desea eliminar este alojamiento?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              
            </div>
      
            <div class="modal-footer" style="margin:auto;">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
              <form action="<?=base_url("alojamiento/baja");?>" style="float: center;" method="post">
              <button type="submit" name="baja" value=<?php echo $alojamiento->id?> id=<?php echo ("actualizar".$alojamiento->id)?> type="button" class="btn btn-danger"> Aceptar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
<?php } ?>


<!-- MODAAAAAAAAAAAALLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL -->