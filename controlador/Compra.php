<?php 
class Compra{

    function nuevo(){
        
        //Requerimos del modeloProducto
        require_once "modelo/ProductoModelo.php";
        $producto = new ProductoModelo();
        $respuestaProductos = $producto->seleccionar('*', "estado=1");
        //require_once "vista/compras/nuevo.php";
        $vista = "vista/compras/nuevo.php";
        require_once "vista/cargador.php";
    }
    function guardar(){
        //1. Recibir la información
        $id_producto=$_POST['id_producto'];
        $cantidad=$_POST['cantidad'];
        $fecha=date('Y-m-d H:i:s');
        $estado=$_POST['estado'];
        //2. Revisar los valores recibidos
       /* echo $id_producto;
        echo $cantidad;
        echo $fecha;
        echo $estado;
        //echo $foto;*/
        //var_dump($foto);
        //3. Verificar el archivo
        // if($foto['error']!=0){
          // echo "Existio un eror al subir el archivo";
            /*$mensaje= "Existio un eror al subir el archivo";
            $vista="vista/productos/mensaje.php";
            require_once "vista/cargador.php";*/
        //}
        /*if($foto['type'] =='image/png' || $foto['type']=='image/jpeg'){
            //valido
            if($foto['size']<=2*1024*1024){//Verificando el archivo en bytes maximo 2MB
                //valido archivo
                $nombreArchivo=$foto['name'];
                $nombreArchivo=date('Y_m_d_H_i_s')."_".$nombreArchivo;
                copy($foto['tmp_name'],'imagenes/productos/'.$nombreArchivo);*/
                
                $datosEnviar=[
                    'id_producto'=>$id_producto,
                    'cantidad'=>$cantidad,
                    'fecha'=>$fecha,
                    'estado'=>$estado
                ];
                //AQUI DEBEMOS JUGAR CON EL MODELO
                require_once "modelo/CompraModelo.php";
                $compraModelo=new CompraModelo();
                $respuesta=$compraModelo->insertar($datosEnviar);

                if($respuesta){
                    header("Location: ./?c=compra&m=listar");
                    //echo "Su compra se registro con exito";
                }
                else{
                    echo "Existe error en el registro de compra";
                }
            //}
            //else{
                //echo "El archivo es desmasiado grande";
            //}
        //}
        //else{
            //echo "El tipo de archivo es invalido";
        //}
    }
    function listar(){
        require_once "modelo/CompraModelo.php";
        $compraModelo=new CompraModelo();
        $compras=$compraModelo->seleccionar('*',"estado=1");
        $vista = "vista/compras/listado.php";
        require_once "vista/cargador.php";
        require_once "vista/compras/listado.php";
    }
    function modificar(){
        $id = $_GET['id'];
        require_once "modelo/CompraModelo.php";
        $compraModelo = new CompraModelo();
        $compras = $compraModelo->seleccionar('*',"id_compra=$id");
        $compra = $compras[0];
        $vista = "vista/compras/modificar.php";
        require_once "vista/cargador.php";
        require_once "vista/compras/modificar.php";
    }
    function actualizar(){
        //1. Recibir los valores
        $id=$_POST['id'];
        $id_producto=$_POST['id_producto'];
        $cantidad=$_POST['cantidad'];
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


        $datosEnviar = [
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'fecha'=>$fecha,
            'estado'=>$estado
        ];
        
        $condicion = "id_compra=$id";
        /// TENEMOS QUE JUGAR CON EL MODELO
        require_once "modelo/CompraModelo.php";
        $compraModelo = new CompraModelo();
        // Enviando desde el controlador
        $respuesta = $compraModelo->actualizar($datosEnviar,$condicion);         

        if ($respuesta) {
            // Todo correcto
            header("Location: ./?c=compra&m=listar");
        } else {
            echo "Hay error";
        }
    }
    function eliminar(){
        $id = $_GET["id"];
        require_once "modelo/CompraModelo.php";
        $compraModelo = new CompraModelo();
        $condicion = "id_compra = $id";
        $respuesta = $compraModelo->eliminar($condicion);
        if ($respuesta) {
            // Todo correcto
            header("Location: ./?c=compra&m=listar");
        } else {
            echo "Hay error";
        }
    }
}
?>