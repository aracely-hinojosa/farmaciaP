<h2>Modificar Usuario</h2>
<form action="./?c=usuario&m=actualizar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id;?>" class="form-control">
    Apellido Paterno:
    <input type="text" name="paterno" value="<?php echo $usuario['paterno'];?>" class="form-control">
    Apellido Materno:
    <input type="text" name="materno" value="<?php echo $usuario['materno'];?>" class="form-control">
    Nombres:
    <input type="text" name="nombres" value="<?php echo $usuario['nombres'];?>" class="form-control">
    Usuario:
    <input type="text" name="usu" value="<?php echo $usuario['usu'];?>" class="form-control">
    Contraseña:
    <input type="text" name="contra" value="<?php echo $usuario['contra'];?>" class="form-control">
    Nivel:
    <input type="text" name="nivel" value="<?php echo $usuario['nivel'];?>" class="form-control">
    Fecha:
    <input type="date" name="fecha" class="form-control">
    <hr>
    Estado:
    <input type="radio" name="estado" value="1">Activo
    <input type="radio" name="estado" value="0">Inactivo
    <hr>
    <input type="submit" value="GUARDAR">
</form>