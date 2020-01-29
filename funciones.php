<?php
function conectar_db(){
    $con=mysqli_connect("localhost","user_alquiler","Asir_2020.","alquiler");
    return $con;
}
?>