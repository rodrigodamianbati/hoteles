<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url()."src/"; ?>body.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
   
		
    <title>Resultado buscador</title>
    
</head>

<body>
<div class="w3-bar w3-dark-grey">
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-black">Inicio</a>
    <a href="javascript:void(0)" class="w3-bar-item w3-button">Link 1</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button">
        Filtros <i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4">
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black">Link 1</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black">Link 2</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black">Link 3</a>
      </div>
    </div>
    <input type="text" class="w3-bar-item w3-input w3-white w3-hide-small" placeholder="Input" style="width:35%">
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-right"><i class="fa fa-search"></i></a>
</div>
    
<div class="w3-row-padding w3-padding-16">
    
    <?php foreach ($products as $product){ ?>

    <div class="w3-third w3-margin-bottom">
      <img src='<?php echo $product->foto?>' alt="Norway" style="width:100%">
      <div class="w3-container w3-white">
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
            <i class="fa fa-ban"> Sin servicios disponibles</i>

      <?php  }
        foreach($product->servicios as $servicio) { 
            if ($servicio->descripcion == "Bañera") { ?>
                    <i class="fa fa-bath"></i> 
            <?php } else { 
                if ($servicio->descripcion == "Internet") { ?>
                    <i class="fa fa-wifi"></i>
           <?php } else { 
                if ($servicio->descripcion == "Telefono") {?>
                    <i class="fa fa-phone"></i>
            <?php } else { 
                if ($servicio->descripcion == "Television") {?>
                    <i class="fa fa-television"></i>
        <?php } } } } } ?>
        </p>
        <button class="w3-button w3-block w3-black w3-margin-bottom">Reservar</button>
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