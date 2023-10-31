<table class="table" border="1">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Fotografía</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=$inicio; 
        foreach($productos as $producto){
            $i++;
        ?>
        <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $producto['codigo']?></td>
            <td><?php echo $producto['nombre']?></td>
            <td><?php echo $producto['precio']?></td>
            <td><?php echo $producto['descripcion']?></td>
            <td><?php echo $producto['fecha']?></td>
            <td><?php echo $producto['estado']?></td>
            <td><a href="imagenes/productos/<?php echo $producto['foto']?>"
            target="_blank" title="Imagen" class="btn btn-primary btn-sm">
            <i class="glyphicon glyphicon-picture"></i> </a></td>
            <td>
                <a href="./?c=producto&m=modificar&id=<?php echo $producto['id_producto']?>" class="btn btn-warning btn-sm" title="Modificar"> <i class="glyphicon glyphicon-pencil"></i> </a>
                <a href="./?c=producto&m=eliminar&id=<?php echo $producto['id_producto']?>" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('?Esta seguro de eliminar?')"> <i class="glyphicon glyphicon-trash"></i> </a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="./?c=producto&m=listar&pagina=1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
        for($i=1; $i<=$numeroVueltas;$i++){
          ?>
        
        <li class="page-item <?php echo ($pagina==$i)? 'active':''; ?> ">
    <a class="page-link" href="./?c=producto&m=listar&pagina=<?php echo $i ?>">
    <?php echo $i ?>     
    </a>
  </li>
      <?php

        }
    ?>
    <li class="page-item">
      <a class="page-link" href="./?c=producto&m=listar&pagina=<?php echo $numeroVueltas ?>"
       aria-label="next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
   

