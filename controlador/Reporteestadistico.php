<?php
class reporteestadistico
{
    function compra(){
        //echo "Estadistica compra";
        //consulta a la BD
        require_once "modelo/CompraModelo.php";
        $compraModelo = new CompraModelo();
        $compras = $compraModelo->establecerTabla('compra c, productos p');
        $compras = $compraModelo->seleccionar('c.id_producto,p.nombre, sum(cantidad) as cantidad', 
        'c.estado=1 and c.id_producto=p.id_producto', 'id_producto');

        //enviar resultados a la vista
        $vista = "vista/reporte/graficacompra.php";
        require_once "vista/cargador.php";
    }
}
?>