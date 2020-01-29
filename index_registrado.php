<?php
session_start();
if(isset($_SESSION['usuario'])){ /* Se muestra la zona privada para usuarios registrados*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido Usuario Registrado</title>
</head>
<body>
  <h1>ZONA PRIVADA</h1>
  <h2>Bienvenido <?php echo $_SESSION['usuario'];?></h2> 
  <h2>mail: <?php echo $_SESSION['correo_usuario'];?></h2> 
  <a href="desconecta.php">Cerrar Sesión</a> 
</body>
</html>
<?php
}else{ /* Los usuarios que no se hayan registrado se los manda al index.html */
    header("Location:index.html");
}
?>