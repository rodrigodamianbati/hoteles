<div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url()."assets/"; ?>#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
          </ol>

          <!-- Alojamientos a modificar-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Alojamiento - Modificaciones</div>
              <div class="w3-row-padding w3-padding-16">
              
    <?php $product=array_pop($product);
        //print_r($product);
        //die(); 
    ?>
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
        <!--form action="<//?=base_url("alojamiento/baja");?>" method="post">
          <button name="baja" value="<//?php echo $product->id?>" class="w3-button w3-block w3-black w3-margin-bottom">Baja</button>
        </form-->
        <form action="<?=base_url("alojamiento/modificaciones");?>" method="post">
          <button name="baja" value="<?php echo $product->id?>" class="w3-button w3-block w3-black w3-margin-bottom">Modificar</button>
        </form>
      </div>
    </div>

</div>
            <div class="card-footer small text-muted">Actualizado ayer a las 11:59 PM</div>
          </div>

        </div>