<?php
require_once "BD.php";
class ProductoModelo extends BD
{
    public $nombreTabla='productos';

    public function establecerTabla($nombreTablaNueva){
        $this->nombreTabla=$nombreTablaNueva;
    }
}
?>