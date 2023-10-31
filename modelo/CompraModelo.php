<?php
require_once "BD.php";
class CompraModelo extends BD
{
    public $nombreTabla='compra';
    
    public function establecerTabla($nombreTablaNueva){
        $this->nombreTabla=$nombreTablaNueva;
    }
}
?>