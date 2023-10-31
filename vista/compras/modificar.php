<h2>Modificar compra</h2>
<form action="./?c=compra&m=actualizar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>">
    Código de Producto:
    <input type="text" name="id_producto" value="<?php echo $compra['id_producto'];?>" class="form-control">
    Cantidad:
    <input type="number" name="cantidad" value="<?php echo $compra['cantidad'];?>" class="form-control">
    <hr>
    Estado:
    <input type="radio" name="estado" value="1">Activo
    <input type="radio" name="estado" value="0">Inactivo
    <hr>
    <input type="submit" value="GUARDAR">
</form>