<?php
session_start();
if(isset($_SESSION['nombre_usuario'])){
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
<h1>Bienvenido: <?php echo $_SESSION['nombre_usuario'];?></h1>    
</body>
</html>
<?php
}else{
  header("Location:acceso_denegado.php");  
}
?>