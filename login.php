<?php
session_start();
include "funciones.php";
$correo=$_POST['correo'];
$pwd=$_POST['pwd'];
/* Vamos a comprobar en nuestra base de datos el usuario y su contraseña */
$conexion = conectar_db();
// Comprobar la conexión
if (mysqli_connect_errno ())
 {
    echo "No se pudo conectar a MySQL: " . mysqli_connect_error ();
    echo "<br>Nro de error:".mysqli_connect_errno ();
 }
else
 {
    /* Vamos a comprobar que existe en la base de datos el usuario que estamos buscando */
    $consulta="SELECT correo, password, Nombre, Apellido1, Apellido2 FROM usuarios WHERE correo=\"$correo\"";
    $resultado=mysqli_query($conexion,$consulta);
    if(mysqli_num_rows($resultado)==1){
        $registro=mysqli_fetch_array($resultado);
        if($registro['password']==$pwd){
            $_SESSION['usuario']=$registro['Nombre']." ".$registro['Apellido1']." ".$registro['Apellido2'];
            $_SESSION['correo_usuario']=$registro['correo'];
            header("location:index_registrado.php");
            
        }else{
            /* Mensaje cuando la contraseña falla */
            echo "El usuario o password es incorrecto";
            ?>
            <a href="index.html"> Volver </a>
            <?php
        }
        
    }else{
            /* Mensaje cuando el usuario no existe */
            echo "El usuario o password es incorrecto";
        ?>
        <a href="index.html"> Volver </a>
        <?php
    }
    
    
    mysqli_close($conexion);
 }


/*
if ($usuario=="admin" && $pwd=="1234"){
    $_SESSION['nombre_usuario']=$usuario;
    header("Location: acceso.php");
}else{
    header("Location: acceso_denegado.php");
} */

?>