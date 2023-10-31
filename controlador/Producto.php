<?php 
class Producto{

    function nuevo(){
        
        //echo "Estoy en Producto metodo nuevo";
        $vista = "vista/productos/nuevo.php";
        require_once "vista/cargador.php";
        
    }
    function guardar(){
        
        
        //1. Recibir la información
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $foto=$_FILES['foto'];
        $fecha=date('Y-m-d H:i:s');
        $estado=$_POST['estado'];
        
        
        //2. Revisar los valores recibidos
        /*echo $codigo;
        echo $nombre;
        echo $precio;
        echo $descripcion;
        echo $fecha;
        echo $estado;
        //echo $foto;*/
        //var_dump($foto);
        //3. Verificar el archivo
        if($foto['error']!=0){
            $mensaje="Existio un eror al subir el archivo";
            $vista="vista/productos/mensaje.php";
            require_once "vista/cargador.php";

            //echo "Existio un eror al subir el archivo";
            /*$mensaje= "Existio un eror al subir el archivo";
            $vista="vista/productos/mensaje.php";
            require_once "vista/cargador.php";*/
        }
        if($foto['type'] =='image/png' || $foto['type']=='image/jpeg'){
            //valido
            if($foto['size']<=2*1024*1024){//Verificando el archivo en bytes maximo 2MB
                //valido archivo
                
                $nombreArchivo=$foto['name'];
                $nombreArchivo=date('Y_m_d_H_i_s')."_".$nombreArchivo;
                copy($foto['tmp_name'],'imagenes/productos/'.$nombreArchivo);
                
                
                $datosEnviar=[
                    'codigo'=>$codigo,
                    'nombre'=>$nombre,
                    'precio'=>$precio,
                    'descripcion'=>$descripcion,
                    'foto'=>$nombreArchivo,
                    'fecha'=>$fecha,
                    'estado'=>$estado
                ];
                //AQUI DEBEMOS JUGAR CON EL MODELO
                require_once "modelo/ProductoModelo.php";
                $productoModelo=new ProductoModelo();
                $respuesta=$productoModelo->insertar($datosEnviar);
                
                
                if($respuesta){
                    $mensaje="Su producto se registro con exito";
                    $vista="vista/productos/mensaje.php";
                    require_once "vista/cargador.php";

                    //header("Location: ./?c=producto&m=listar");
                    //echo "Su producto se registro con exito";
                }
                else{
                    $mensaje="Existe error en el registro de producto";
                    $vista="vista/productos/mensaje.php";
                    require_once "vista/cargador.php";
                    //echo "Existe error en el registro de producto";
                }
            }
            else{
                $mensaje="El archivo es desmasiado grande";
                    $vista="vista/productos/mensaje.php";
                    require_once "vista/cargador.php";
                //echo "El archivo es desmasiado grande";
            }
        }
        else{
            $mensaje="El tipo de archivo es invalido";
            $vista="vista/productos/mensaje.php";
            require_once "vista/cargador.php";
            //echo "El tipo de archivo es invalido";
        }
    }
    function listar(){
        require_once "modelo/ProductoModelo.php";
        $productoModelo=new ProductoModelo();
        $productos=$productoModelo->seleccionar('*',"estado=1");
        $total = count($productos); //cantidad de registros del producto
        $cantidadElementosPagina = 3;//cantiad de registro que se muestre en pantalla
        $numeroVueltas = ceil($total/$cantidadElementosPagina);
        $pagina = $_GET['pagina'] ?? 2;
        $inicio = ($pagina-1)*$cantidadElementosPagina;
        $productos=array_slice($productos,$inicio,$cantidadElementosPagina);

        
        $vista = "vista/productos/listado.php";
        require_once "vista/cargador.php";
        //require_once "vista/productos/listado.php";
    }
    function modificar(){
        $id = $_GET['id'];
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $productos = $productoModelo->seleccionar('*',"id_producto=$id");
        $producto = $productos[0];
        $vista = "vista/productos/modificar.php";
        require_once "vista/cargador.php";
        require_once "vista/productos/modificar.php";
    }
    function actualizar(){
        //1. Recibir los valores
        $id=$_POST['id'];
        $codigo=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $foto=$_FILES['foto'];
        $estado=$_POST['estado'];
        $fecha=date('Y-m-d H:i:s');
        //2. Verificar valores 
        //echo $id;
        //echo $codigo;
        //echo $nombre;
        //echo $precio;
        //echo $descripcion;
        //var_dump($foto);
        //echo $estado;
        //echo $fecha;

        $nombreArchivo = '';
        if ($foto['name'] != "") {
            if ($foto['error'] != 0) {
                echo "Existio un error al subir el archivo";
            }
            if ($foto['type'] == 'image/png' || $foto['type'] == 'image/jpeg') {
                //Valido
                if ($foto['size'] <= 2 * 1024 * 1024) { // Verificando el archivo en bytes maximo 2MB
                    //Valido el archivo
                    $nombreArchivo =  $foto['name'];
                    $nombreArchivo = date("Y_m_d_H_i_s") . $nombreArchivo;
                    copy($foto['tmp_name'], 'imagenes/productos/' . $nombreArchivo);
                } else {
                    $mensaje="El archivo es demasiado grande";
                    $vista="vista/productos/mensaje.php";
                    require_once "vista/cargador.php";
                    //echo "El archivo es demasiado grande";
                }
            } else {
                $mensaje="El archivo es invalido, intente de nuevo";
                $vista="vista/productos/mensaje.php";
                require_once "vista/cargador.php";
                //echo "El archivo es invalido, intente de nuevo";
            }
        }

        $datosEnviar = [
            'codigo' => $codigo,
            'nombre' => $nombre,
            'precio' => $precio,
            'descripcion' => $descripcion,
            'fecha'=>$fecha,
            'estado'=>$estado
        ];
        if ($nombreArchivo != "") {
            $datosEnviar['foto'] = $nombreArchivo;
        }
        $condicion = "id_producto=$id";
        /// TENEMOS QUE JUGAR CON EL MODELO
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        // Enviando desde el controlador
        $respuesta = $productoModelo->actualizar($datosEnviar,$condicion);    
               

        if ($respuesta) {
            // Todo correcto
                $mensaje="El producto se actualizo  con exito";
                $vista="vista/productos/mensaje.php";
                require_once "vista/cargador.php";
            //header("Location: ./?c=producto&m=listar");
        } else {
            $mensaje="Hay error";
            $vista="vista/productos/mensaje.php";
            require_once "vista/cargador.php";
            //echo "Hay error";
        }
    }
    function eliminar(){
        $id = $_GET["id"];
        require_once "modelo/ProductoModelo.php";
        $productoModelo = new ProductoModelo();
        $condicion = "id_producto = $id";
        $respuesta = $productoModelo->eliminar($condicion);
            
        if ($respuesta) {
            // Todo correcto
            header("Location: ./?c=producto&m=listar");
        } else {
            echo "Hay error";
        }
    }
}
?>