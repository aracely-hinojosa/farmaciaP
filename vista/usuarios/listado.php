<table class="table" border="1">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Paterno</th>
            <th>Materno</th>
            <th>Nombres</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Nivel</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=0; 
        foreach($usuario as $usuario){
            $i++;
        ?>
        <tr>
            <td><?php echo $i;?></td>            
            <td><?php echo $usuario['paterno']?></td>
            <td><?php echo $usuario['materno']?></td>
            <td><?php echo $usuario['nombres']?></td>
            <td><?php echo $usuario['usu']?></td>
            <td><?php echo $usuario['contra']?></td>
            <td><?php echo $usuario['nivel']?></td>
            <td><?php echo $usuario['fecha']?></td>
            <td><?php echo $usuario['estado']?></td>
            <td>
                <a href="./?c=usuario&m=modificar&id=<?php echo $usuario['id_usuario']?>" class="btn btn-warning btn-sm" title="Modificar"> <i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="./?c=usuario&m=eliminar&id=<?php echo $usuario['id_usuario']?>" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('?Esta seguro de eliminar?')"> <i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>