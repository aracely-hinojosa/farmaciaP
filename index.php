<?php
date_default_timezone_set('America/La_Paz');
session_start();


$controlador=$_GET['c'] ?? 'principal';
$metodo=$_GET['m'] ?? 'inicio';
$controlador=ucfirst($controlador);


if(!isset($_SESSION['usuario']) && $controlador!='Login'){
    $controlador="login";
    $metodo="index";
}


if(!file_exists("controlador/$controlador.php")){
    $controlador='noexiste';
    $metodo='error';
}
try{
    require_once "controlador/$controlador.php";
    $objeto=new $controlador();
    $objeto->$metodo();
}
catch(Error | Exception $e){
    //en caso de que fuera un error
    echo $e;
    require_once "controlador/noexiste.php";
    $objeto=new Noexiste();
    $objeto->error();
}


/*$controlador='venta';
$metodo='eliminar';
require_once "controlador/Venta.php";
$objeto=new Venta(); //Instacia de la clase
$objeto->eliminar();//llamando a un metodo de la clase*/

?>