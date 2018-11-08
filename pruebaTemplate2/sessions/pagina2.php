

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Page Title</title>
</head>
<body>
    <!--h1>Hola, <//?php echo $_SESSION['nombre']; ?></h1-->
    <!--a href="cerrar.php">Cerrar sesion</a-->
    <?php
session_start();

if ($_SESSION) {
    $nombre = $_SESSION['nombre'];
    echo "<h1>hola, $nombre</h1>";
    echo "<a href='cerrar.php'>Cerrar sesion</a>";
}else {
    echo "No has iniciado sesion";
    echo "<a href='index.php'>Iniciar sesion</a>";
}

?>
</body>
</html>