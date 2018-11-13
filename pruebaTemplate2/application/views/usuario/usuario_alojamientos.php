<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url()."assets/"; ?>#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Icon Cards-->
          <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-comments"></i>
                  </div>
                  <div class="mr-5">26 New Messages!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()."assets/"; ?>#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-list"></i>
                  </div>
                  <div class="mr-5">11 New Tasks!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()."assets/"; ?>#">
                  <span class="float-left">View Details</span>
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
                  <div class="mr-5">123 New Orders!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()."assets/"; ?>#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-fw fa-life-ring"></i>
                  </div>
                  <div class="mr-5">13 New Tickets!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url()."assets/"; ?>#">
                  <span class="float-left">View Details</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>

          <!-- Area Chart Example-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-area"></i>
              Area Chart Example</div>
            <div class="card-body">
              <canvas id="myAreaChart" width="100%" height="30"></canvas>
            </div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamientos</div>
              <div class="w3-row-padding w3-padding-16">
    
    <?php foreach ($products as $product){ ?>

    <div class="w3-third w3-margin-bottom alojamiento-contenedor">
      <img src='<?php echo $product->foto?>' alt="Norway" style="width:100%">
      
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
                    <i class="fa fa-television"></i>
        <?php } } } } } ?>
        </p>
        <button class="w3-button w3-block w3-black w3-margin-bottom">Reservar</button>
      </div>
    </div>

    <?php } //} ?>
</div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->