<!--?php if (isset($products)){if(!empty($products)){$tipo=$products[0]->tipo;$iguales=true; foreach ($products as $product){if ($product->tipo != $tipo){ $iguales=false;}}if($iguales){print_r($products[0]->tipo);}}}?-->

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <script src="<?php echo base_url();?>assets/js/easyautocomplete/jquery.easy-autocomplete.min.js"></script> 

 <!-- CSS file -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/js/easyautocomplete/easy-autocomplete.min.css"> 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--script type="text/javascript" src="<//?php echo base_url()."src/"; ?>animacion.js"></script-->
    <link rel="stylesheet" href="<?php echo base_url()."src/"; ?>barra-propia.css">
    <link rel="stylesheet" href="<?php echo base_url()."src/"; ?>body.css">
    <title>Resultado buscador</title>

</head>

<body>

<!-- nav header-->
<div class="w3-bar barria-propia">
    <form action="<?=base_url();?>">
        <button class="w3-bar-item w3-button w3-dark-grey">Inicio</button>
    </form>


    <form action="<?=base_url("alojamiento/filtrar");?>" method="get">

    <div class="w3-dropdown-hover">
      <button class="w3-button">
      Tipo<i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4">

        <button name="ninguno" value="ninguno" type="hidden"></button>
        <button name="casa" class="w3-bar-item w3-button w3-text-black" value="casa"> Casa</button>
        <button name="departamento" class="w3-bar-item w3-button w3-text-black" value="departamento"> Departamento</button>
        <button name="hotel" class="w3-bar-item w3-button w3-text-black" value="hotel"> Hotel</button>
        <button name="cabaña" class="w3-bar-item w3-button w3-text-black" value="cabaña"> Cabaña</button>
        <button name="chalet" class="w3-bar-item w3-button w3-text-black" value="chalet"> Chalet</button>
        <button name="monoambiente" class="w3-bar-item w3-button w3-text-black" value="monoambiente"> Monoambiente</button>
      </div>
    </div>

    <div class="w3-dropdown-hover"> <!--w3-hide-small-->
    <button class="w3-button">Servicios<i class="fa fa-caret-down"></i></button>

      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4 form-check">
        <input class="w3-bar-item w3-button w3-text-black form-check-input" type="checkbox" value="1" name="baniera">
            <label class="form-check-label" for="baniera">Bañera</label>
        <input class="w3-bar-item w3-button w3-text-black form-check-input" type="checkbox" value="4" name="television">
            <label class="form-check-label" for="television">Television</label>
        <input class="w3-bar-item w3-button w3-text-black form-check-input" type="checkbox" value="2" name="internet">
            <label class="form-check-label" for="internet">Internet</label>
        <input class="w3-bar-item w3-button w3-text-black form-check-input" type="checkbox" value="3" name="telefono">
            <label class="form-check-label" for="telefono">Telefono</label>
        <input class="w3-bar-item w3-button form-check-input" type="checkbox" value="5" name="garage">
            <label class="form-check-label" for="garage">Garage</label>

      </div>
    </div>


    <!-- Precios-->
    <div class="w3-dropdown-hover">
      <button class="w3-button">
        Precios desde - hasta<i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4">
        <button class="w3-bar-item w3-button w3-text-black" name="limite_1" value="limite_1"> Hasta $500</button>
        <button class="w3-bar-item w3-button w3-text-black" name="limite_2" value="limite_2"> $500 - $2500</button>
        <button class="w3-bar-item w3-button w3-text-black" name="limite_3" value="limite_3"> $2500 - $5000</button>
        <button class="w3-bar-item w3-button w3-text-black" name="limite_4" value="limite_4"> $5000 - $7500</button>
        <button class="w3-bar-item w3-button w3-text-black" name="limite_5" value="limite_5"> $7500 - $10000</button>
      </div>
    </div>

    <input name="localidad" type="hidden" value="<?php if (isset($products)){if(!empty($products))echo $products[0]->localidad;}?>">
    <!--input name="tipo_actual" type="hidden" value="<//?php if (isset($products)) {if (!empty($products)) {$tipo = $products[0]->tipo;
    $iguales = true;foreach ($products as $product) {if ($product->tipo != $tipo) {$iguales = false;}}if ($iguales) {echo ($products[0]->tipo);}}}?>"-->
    <!--input name="current_localidad" type="sumit" type="hidden" value=""-->
    <input id="id_nueva_localidad" name="nueva_localidad" type="text" class="w3-bar-item w3-input w3-white" placeholder="Ej: Carmen de Patagones">
    <!--a href="javascript:void(0)" class="w3-bar-item w3-button w3-right"><i class="fa fa-search"> Buscar</i></a-->

    <button name="buscar" class="w3-bar-item w3-button w3-right" value="buscar"><i class="fa fa-search" style="color:#ffffcc;"> Buscar</i></button>
    <script>
        var localidad =  $('input[name=localidad]').val();
        $('input[name=nueva_localidad]').change(function() {
            var aux = $('input[name=nueva_localidad]').val();
            if(aux.length == 0){
                $('input[name=localidad]').val(localidad);
            }else{
                $('input[name=localidad]').val(aux);
            }
                
        });

    </script>

<script type="text/javascript">
        var options = { url: function (phrase) { 
    // return "api / countrySearch.php? phrase =" + phrase + "& format = json"; 
        return "<?php echo base_url();?>inicio/getCiudadesFiltrado/" + phrase; 
      }, 
        getValue: "nombre" 
      }; 
      $("#id_nueva_localidad").easyAutocomplete(options);
    </script>
</div>
    <!--button name="buscar2" class="w3-bar-item w3-button w3-right" value="Buscar" id="buscar2"><i class="fa fa-search"> Buscar</i></button-->
</form>
<!-- -->

<div class="w3-row-padding w3-padding-16">

    <?php foreach ($products as $product) {?>

    <div class="w3-third w3-margin-bottom alojamiento-contenedor" style="margin-right:0px;">
      <img src='<?php echo base_url().$product->foto ?>' alt="Norway" style="width:200px; height:230px; margin-left: 65px;">

      <div class="w3-container alojamiento-descripcion">    <!--w3-white-->
        <h3><?php echo $product->tipo ?></h3>
        <h6 class="w3-opacity">$ <?php echo $product->precio ?></h6>
        <p>Estado: <?php echo $product->estado ?></p>
        <p>Direccion: <?php echo $product->direccion_nombre ?>, <?php echo $product->direccion_numero ?></p>

        <p class="w3-large">
    <?php //if (empty($product->servicios)) { ?>
<!--<i class="fa fa-television"></i-->
    <?php //} else{
    $prueba = $product->servicios;
    if (empty($prueba)) {?>
            <i class="fa fa-ban" data-title="Sin servicios disponibles"> Sin servicios disponibles</i>

      <?php }
    foreach ($product->servicios as $servicio) {
        if ($servicio->descripcion == "baniera") {?>
                    <i class="fa fa-bath"></i>
            <?php } else {
            if ($servicio->descripcion == "internet") {?>
                    <i class="fa fa-wifi"></i>
           <?php } else {
                if ($servicio->descripcion == "telefono") {?>
                    <i class="fa fa-phone"></i>
            <?php } else {
                    if ($servicio->descripcion == "television") {?>
                    <i class="fa fa-television"></i>
        <?php }}}}}?>
        </p>

        <!-- <a href="pages.php?id=<//?php echo $product_id; ?>"> -->
        <form action="<?=base_url("alojamiento/reservar");?>" method="post">
            <input type="hidden" name="precio_noche" value="<?php echo $product->precio;?>">
            <input type="hidden" name="reserva" value="<?php echo $product->id;?>"> 
            <input type="submit" class="w3-button w3-block w3-black w3-margin-bottom" value="Reservar">
        </form>
        <!-- <a class="w3-button w3-block w3-black w3-margin-bottom" href="<//?php echo base_url(); ?>reserva?idAloj=<//?php $product->id;?>">Reservar</a> -->
        <!-- <button class="w3-button w3-block w3-black w3-margin-bottom">Reservar</button> -->
      </div>
    </div>

    <?php } //} ?>
</div>

<footer class="footer">
<div class="container">
    <?php
echo $this->pagination->create_links();
?>
</div>

</footer>

</body>
</html>