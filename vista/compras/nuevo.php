<h3>REGISTRO DE COMPRAS</h3>
<form action="./?c=compra&m=guardar" method="POST" enctype="multipart/form-data">
    Producto:
    <select name="id_producto" id="" class="form-control">
        <?php
        foreach($respuestaProductos as $producto){
        ?>
        <option value="<?php echo $producto['id_producto']?>" >
            <?php echo $producto['nombre']?>
        </option>
    <?php 
    }
    ?>
    </select>
    
    Cantidad:
    <input type="number" name="cantidad" class="form-control">
    <hr>
    Estado:
    <input type="radio" name="estado" value="1">Activo
    <input type="radio" name="estado" value="0">Inactivo
    <br>
    <input type="submit" value="GUARDAR" class="btn btn-success">
</form>
