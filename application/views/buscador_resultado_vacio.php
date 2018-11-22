<!DOCTYPE html>
<html>
<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--script type="text/javascript" src="<//?php echo base_url()."src/"; ?>animacion.js"></script-->
       
    <link rel="stylesheet" href="<?php echo base_url()."src/"; ?>body.css">
    <title>Resultado buscador</title>
    
</head>

<body>

<!-- nav header-->
<div class="w3-bar w3-dark-grey">
    <form action="<?=base_url();?>">
        <button class="w3-bar-item w3-button w3-dark-grey">Inicio</button>
    </form>
    <!--a href="javascript:void(0)" class="w3-bar-item w3-button">Link 1</a-->
    <!--div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button">
        Filtros <i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4">
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Filtro 1</a>
      </div>
    </div-->

    <!-- Tipos-->

    <!--div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-button">
        Tipo<i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4">
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Casa</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Departamento</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Hotel</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Cabaña</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Chalet</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Monoambiente</a>
      </div>
    </div-->

    <form action="<?=base_url("alojamiento/filtrar");?>" method="get">
    
    <div class="w3-dropdown-hover">
      <button class="w3-button">
      Tipo<i class="fa fa-caret-down"></i>
      </button>
      <div class="w3-dropdown-content w3-bar-block w3-white w3-card-4">
        <!--a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Casa</a-->
        <!--a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Departamento</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Hotel</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Cabaña</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Chalet</a>
        <a href="javascript:void(0)" class="w3-bar-item w3-button w3-text-black"> Monoambiente</a-->
        <!--input type="input" type="sumbit" name="submit" class="w3-bar-item w3-button w3-text-black" value="Casa"-->
        <button type="input" type="sumbit" name="casa" class="w3-bar-item w3-button w3-text-black" value="casa"> Casa</button>
        <button type="input" type="sumbit" name="departamento" class="w3-bar-item w3-button w3-text-black" value="departamento"> Departamento</button>
        <button type="input" type="sumbit" name="hotel" class="w3-bar-item w3-button w3-text-black" value="hotel"> Hotel</button>
        <button type="input" type="sumbit" name="cabaña" class="w3-bar-item w3-button w3-text-black" value="cabaña"> Cabaña</button>
        <button type="input" type="sumbit" name="chalet" class="w3-bar-item w3-button w3-text-black" value="chalet"> Chalet</button>
        <button type="input" type="sumbit" name="monoambiente" class="w3-bar-item w3-button w3-text-black" value="monoambiente"> Monoambiente</button>
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
        <!--input class="w3-bar-item w3-button w3-text-black form-check-input" type="checkbox" value="" id="Monoambiente">
            <label class="form-check-label" for="Chalet">Monoambiente</label-->
      </div>
    </div>
    
    <!--div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        <label class="form-check-label" for="defaultCheck1"> Default checkbox </label>
    </div-->

    <!-- Servicios-->

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
    
    <!--input name="localidad" type="hidden" value="<//?php if (isset($products)){if(!empty($products))echo $products[0]->localidad;}?>"-->
    <!--input name="current_localidad" type="sumit" type="hidden" value=""-->
    <input name="nueva_localidad" type="text" class="w3-bar-item w3-input w3-white" placeholder="Ej: Carmen de Patagones" style="width:35%">
    <!--a href="javascript:void(0)" class="w3-bar-item w3-button w3-right"><i class="fa fa-search"> Buscar</i></a-->
   
    <button name="buscar" class="w3-bar-item w3-button w3-right" value="buscar"><i class="fa fa-search"> Buscar</i></button>
</div>
    <!--button name="buscar2" class="w3-bar-item w3-button w3-right" value="Buscar" id="buscar2"><i class="fa fa-search"> Buscar</i></button-->
</form>
<!-- -->

<div class="w3-row-padding w3-padding-16">
    <h1>No se a encontrado ningun alojamiento con dichas caracteristicas</h1>
</div>

</body>
</html>