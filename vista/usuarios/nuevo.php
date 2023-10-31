<h3>REGISTRO DE USUARIOS</h3>
<form action="./?c=usuario&m=guardar" method="POST" enctype="multipart/form-data">
    Paterno:
    <input type="text" name="paterno" class="form-control">
    Materno:
    <input type="text" name="materno" class="form-control">
    Nombres:
    <input type="text" name="nombres" class="form-control"> 
    Usuario:
    <input type="text" name="usu" class="form-control">
    Contraseña:
    <input type="text" name="contra" class="form-control">
    Nivel:
    <input type="number" name="nivel" class="form-control">
    Fecha:
    <input type="date" name="fecha" class="form-control">
    <hr>
    Estado:
    <input type="radio" name="estado" value="1">Activo
    <input type="radio" name="estado" value="0">Inactivo
    <br>
    <input type="submit" value="GUARDAR" class="btn btn-success">
</form>