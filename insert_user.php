<?php
$nombre=$_POST['nombre'];
$ape1=$_POST['ape1'];
$ape2=$_POST['ape2'];
$pwd=$_POST['pwd'];
$correo=$_POST['correo'];
include "datos_conexion.php";
//Crear conexión
$conexion = conectar_db();
// Comprobar la conexión
if (mysqli_connect_errno ())
 {
    echo "No se pudo conectar a MySQL: " . mysqli_connect_error ();
    echo "<br>Nro de error:".mysqli_connect_errno ();
 }
else
 {
    /* Lo primero que vamos a hacer es crear una consulta */
    /* `codigo`, `Nombre`, `Apellido1`, `Apellido2`, `password`, `correo` */
    $consulta="INSERT INTO usuarios (Nombre, Apellido1, Apellido2, password, correo) VALUES ('$nombre','$ape1','$ape2','$pwd','$correo')";
     if(mysqli_query($conexion,$consulta)){
         echo "Hemos insertado un registro correctamente.";
    }else{
         echo "Error, no se ha podido insertar el registro.".mysqli_error($conexion)." Numero:
".mysqli_errno($conexion);
    }
    mysqli_close($conexion);
 }
?>