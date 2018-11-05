<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="<?php echo base_url()."assets/"; ?>css/nvbar.css" rel="stylesheet">


 

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href=""><img src="logo.png" ></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo base_url()."registro/"; ?>"><span class="glyphicon glyphicon-user"></span> Registrarme</a></li>
      <li><a href="<?php echo base_url()."login/"; ?>"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
    </ul>
  </div>
</nav>
  


</body>
</html>

