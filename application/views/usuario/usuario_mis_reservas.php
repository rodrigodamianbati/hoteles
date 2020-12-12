<?php

?>
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <!--ol class="breadcrumb">
            <li class="breadcrumb-item active">Mis reservas</li>
          </ol-->

          <!-- Alojamientos del usuario-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Mis Reservas</div>

              <div class="w3-row-padding w3-padding-16">
              <?php if (count($products) == 0){ ?>
              <h3 class="text-center">Aun no ha realizado reservas</h3>
    <?php  }?>
    <?php foreach ($products as $product) {?>
      <hr>
      <div class="w3-third w3-margin-bottom alojamiento-contenedor text-center mb-2">
      <img src='<?php echo base_url().$product->foto?>' alt="Norway" style="width:30%">

      <div class="w3-container alojamiento-descripcion">    <!--w3-white-->
        <h3><?php echo $product->tipo ?></h3>
        <h2>Precio total: $ <?php echo $product->precio_total ?></h2>
        <h6 class="w3-opacity">Precio por noche: $ <?php echo $product->precio ?></h6>
        <p>Estado alojamiento: <?php echo $product->estado_alojamiento ?></p>
        <p>Estado reserva: <?php if ($product->estado_reserva == 1) {if ($product->confirmacion_cliente == "confirmado") {echo "pendiente (Esperando confirmacion del dueño del alojamiento)";} else {echo "pendiente";}} else {if ($product->estado_reserva == 2) {echo "en curso";} else {echo "cancelada";}}?></p>
        <p>Pago seña: <?php if ($product->pago_seña == 1){echo "pagado";}else{echo "pendiente";}; ?></p>
        <p>Direccion: <?php echo $product->direccion_nombre ?>, <?php echo $product->direccion_numero ?></p>

        <?php if ($product->estado_reserva == 1) {if ($product->confirmacion_cliente != "confirmado") { ?>
        <form action="<?=base_url("alojamiento/reserva_confirmar");?>" method="post">
          <button style="margin-bottom: 10px" name="confirmar" value="<?php echo $product->id ?>" class="btn btn-outline-primary text-center mb-2">Confirmar</button>
        </form>
        <?php } }?>
        <div class="row">
          <div class="col-sm-12">
          <form action="<?=base_url("alojamiento/reserva_baja");?>" style="float: center;" method="post">
          <button name="baja" value="<?php echo $product->id?>" class="btn btn-outline-primary text-center mb-2">Baja</button>
        </form>
        
      </div>
    </div>
        <hr>
    <?php } //} ?>
</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

