<h3>REGISTRO DE PRODUCTOS</h3>
<form action="./?c=producto&m=guardar" method="POST" enctype="multipart/form-data">
    Código de Producto:
    <input type="text" name="codigo" class="form-control">
    Nombre:
    <input type="text" name="nombre" class="form-control"> 
    Precio:
    <input type="number" name="precio" class="form-control">
    Descripcion:
    <input type="text" name="descripcion" class="form-control">
    Fotografia:
    <input type="file" name="foto" class="form-control">
    <hr>
    Estado:
    <input type="radio" name="estado" value="1">Activo
    <input type="radio" name="estado" value="0">Inactivo
    <br>
    <input type="submit" value="GUARDAR" class="btn btn-success">
</form>