<?php
    //$products = $products[0];
    

           
    //print_r($products);
    //die();  
?>
<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url()."usario";?>">Mi perfil</a>
            </li>
            <li class="breadcrumb-item active">Mis reservas</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">26 Nuevos Mensajes!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()."assets/"; ?>#">
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
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()."assets/"; ?>#">
                  <span class="float-left">Ver</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Alojamientos del usuario-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamientos</div>
              <div class="w3-row-padding w3-padding-16">
    
    <?php foreach ($products as $product){ ?>

    <div class="w3-third w3-margin-bottom alojamiento-contenedor">
      <img src='<?php echo $product->foto?>' alt="Norway" style="width:30%">
      
      <div class="w3-container alojamiento-descripcion">    <!--w3-white-->
        <h3><?php echo $product->tipo?></h3>
        <h2>Precio total: $ <?php echo $product->precio_total?></h2> 
        <h6 class="w3-opacity">Precio por noche: $ <?php echo $product->precio?></h6>
        <p>Estado alojamiento: <?php echo $product->estado_alojamiento?></p>
        <p>Estado reserva: <?php if($product->estado_reserva == 1){echo "pendiente";} elseif($product->estado_reserva == 2){echo "en curso";}else{echo "cancelada";}?></p>
        <p>Pago seña: <?php echo $product->pago_seña?></p>
        <p>Direccion: <?php echo $product->direccion_nombre?>, <?php echo $product->direccion_numero?></p>
        
    
        <form action="<?=base_url("alojamiento/reserva_confirmar");?>" method="post">
          <button name="confirmar" value="<?php echo $product->id?>" class="w3-button w3-block w3-black w3-margin-bottom">Confirmar</button>
        </form>
        <form action="<?=base_url("alojamiento/reserva_baja");?>" method="post">
          <button name="baja" value="<?php echo $product->id?>" class="w3-button w3-block w3-black w3-margin-bottom">Baja</button>
        </form>
        </form>
      </div>
    </div>

    <?php } //} ?>
</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->