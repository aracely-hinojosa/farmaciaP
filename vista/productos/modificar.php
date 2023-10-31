<h2>Modificar producto</h2>
<form action="./?c=producto&m=actualizar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
    Código de Producto:
    <input type="text" name="codigo" value="<?php echo $producto['codigo'];?>" class="form-control">
    Nombre:
    <input type="text" name="nombre" value="<?php echo $producto['nombre'];?>" class="form-control">
    Precio:
    <input type="number" name="precio" value="<?php echo $producto['precio'];?>" class="form-control">
    Descripcion:
    <input type="text" name="descripcion" value="<?php echo $producto['descripcion'];?>" class="form-control">
    Fotografia:
    <input type="file" name="foto">
    <img src="imagenes/productos/<?php echo $producto['foto'];?>" width="50" >
    <hr>
    Estado:
    <input type="radio" name="estado" value="1">Activo
    <input type="radio" name="estado" value="0">Inactivo
    <hr>
    <input type="submit" value="GUARDAR">
</form>