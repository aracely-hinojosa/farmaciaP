<table class="table" border="1">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Código Producto</th>
            <th>cantidad</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=0; 
        foreach($compras as $compra){
            $i++;
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $compra['id_producto']?></td>
            <td><?php echo $compra['cantidad']?></td>
            <td><?php echo $compra['fecha']?></td>
            <td><?php echo $compra['estado']?></td>
            <td>
                <a href="./?c=compra&m=modificar&id=<?php echo $compra['id_compra']?>" class="btn btn-warning btn-sm" title="Modificar"> <i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="./?c=compra&m=eliminar&id=<?php echo $compra['id_compra']?>" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('?Esta seguro de eliminar?')"> <i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>