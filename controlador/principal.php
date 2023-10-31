<?php
class Principal
{
    function inicio()
    {
        //echo "Soy la pagina inicio";
        $vista="principal/inicio.php";
        require_once "vista/cargador.php";
    }
}
?>