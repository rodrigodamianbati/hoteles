<?php
//print_r($products);
//die()
?>
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item active"><h6>Mis alojamientos visitados</h6></li>
          </ol>

          

          <!-- Alojamientos del usuario-->
          <div class="card mb-3" >
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamientos</div>
              <div class="w3-row-padding w3-padding-16"  >

    <?php foreach ($products as $product) {?>

    <div class="w3-third w3-margin-bottom alojamiento-contenedor text-center" id="caja">
      <img src='<?php echo base_url().$product->foto ?>' alt="Norway">

      <div class="w3-container alojamiento-descripcion">    <!--w3-white-->
        <h3><?php echo $product->tipo ?></h3>
        <h2>Precio total: $ <?php echo $product->precio_total ?></h2>
        <h6 class="w3-opacity">Precio por noche: $ <?php echo $product->precio ?></h6>
        <!--p>Estado reserva: <//?php if ($product->estado_reserva == 1) {if ($product->confirmacion_cliente == "confirmado") {echo "pendiente (Esperando confirmacion del dueño del alojamiento)";} else {echo "pendiente";}} else {if ($product->estado_reserva == 2) {echo "en curso";} else {echo "cancelada";}}?></p-->
        <!--p>Pago seña: <//?php echo $product->pago_seña ?></p-->
        <p>Direccion: <?php echo $product->direccion_nombre ?>, <?php echo $product->direccion_numero ?></p>
        <p>Valoracion clientes: <?php if (isset($product->valoracion)){ echo $product->valoracion;} else { echo "N/A";}?></p>

        <form class="text-center mb-2" action="<?=base_url("alojamiento/puntuar_alojamiento");?>" method="post">
          <h1 id="rating_h1">Tu valoracion del alojamiento</h1>
          <div class="rating text-center mb-2"> <input type="radio" name="rating" value="5" id="cinco"><label class="puntaje" id="5" for="5">☆</label> <input class="puntaje" type="radio" name="rating" value="4" id="cuatro"><label class="puntaje" id="4" for="4">☆</label> <input type="radio" name="rating" value="3" id="tres"><label class="puntaje" id="3" for="3">☆</label> <input type="radio" name="rating" value="2" id="dos"><label class="puntaje" id="2" for="2">☆</label> <input type="radio" name="rating" value="1" id="uno"><label class="puntaje" id="1" for="1">☆</label>
          </div>
          <button id="boton_valoracion" name="alojamiento" value="<?php echo $product->id ?>" class="btn btn-outline-primary text-center mb-2">Puntuar alojamiento</button>
        </form>
      </div>
    </div>
    <input type="hidden" id="mi_valoracion" value=<?php if (isset($product->valoracion)){ echo $product->valoracion;} else { echo 0;}?>>
    <?php } //} ?>
</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->
        
 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url()."assets/"; ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()."assets/"; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url()."assets/"; ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url()."src/"; ?>valoracion.js"></script>
<?php if ($this->session->flashdata('valoracion') != 'ok'){?>
<div class="modal" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Valoracion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Por favor elija una valoracion.</p>
      </div>
      <div class="modal-footer">
        <!--button type="button" class="btn btn-primary">Guardar</button-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
  <script>$('#myModal').modal('show')</script>
  <?php } $this->session->set_flashdata('valoracion','ok');?>
  
  <!--script>$('#miModal').modal('show')</script-->