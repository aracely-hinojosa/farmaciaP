<?php
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $bd = "tienda";
    $conexion = mysqli_connect($servidor, $usuario, $contraseña, $bd);
    if(!$conexion){
        echo "Error al conectar la Base de Datos";
    }
    mysqli_query($conexion,"SET NAMES utf8");
    date_default_timezone_set("America/La_Paz");
?>