<?php 
class usuario{

    function nuevo(){
        
        //Requerimos del modeloProducto
        require_once "modelo/UsuarioModelo.php";
        $usuario = new UsuarioModelo();
        $respuestaUsuario = $usuario->seleccionar('*', "estado=1");
        //require_once "vista/compras/nuevo.php";
        $vista = "vista/usuarios/nuevo.php";
        require_once "vista/cargador.php";
    }
    function guardar(){
        //1. Recibir la información
        
        $paterno=$_POST['paterno'];
        $materno=$_POST['materno'];
        $nombres=$_POST['nombres'];
        $usu=$_POST['usu'];
        $contra=$_POST['contra'];
        $nivel=$_POST['nivel'];
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
                    
                    'paterno'=>$paterno,
                    'materno'=>$materno,
                    'nombres'=>$nombres,
                    'usu'=>$usu,
                    'contra'=>$contra,
                    'nivel'=>$nivel,
                    'fecha'=>$fecha,
                    'estado'=>$estado
                ];
                //AQUI DEBEMOS JUGAR CON EL MODELO
                require_once "modelo/UsuarioModelo.php";
                $usuarioModelo=new UsuarioModelo();
                $respuesta=$usuarioModelo->insertar($datosEnviar);

                if($respuesta){
                    header("Location: ./?c=usuario&m=listar");
                    //echo "Su compra se registro con exito";
                }
                else{
                    echo "Existe error en el registro de usuario";
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
        require_once "modelo/UsuarioModelo.php";
        $usuarioModelo=new UsuarioModelo();
        $usuario=$usuarioModelo->seleccionar('*',"estado=1");
        $vista = "vista/usuarios/listado.php";
        require_once "vista/cargador.php";
        require_once "vista/usuarios/listado.php";
    }
    function modificar(){
        $id = $_GET['id'];
        require_once "modelo/UsuarioModelo.php";
        $usuarioModelo = new UsuarioModelo();
        $usuario = $usuarioModelo->seleccionar('*',"id_usuario=$id");
        $usuario = $usuario[0];
        $vista = "vista/usuarios/modificar.php";
        require_once "vista/cargador.php";
        require_once "vista/usuarios/modificar.php";
    }
    function actualizar(){
        //1. Recibir los valores
        $id=$_POST['id'];
        $paterno=$_POST['paterno'];
        $materno=$_POST['materno'];
        $nombres=$_POST['nombres'];
        $usu=$_POST['usu'];
        $contra=$_POST['contra'];
        $nivel=$_POST['nivel'];
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
           
            'paterno'=>$paterno,
            'materno'=>$materno,
            'nombres'=>$nombres,
            'usu'=>$usu,
            'contra'=>$contra,
            'nivel'=>$nivel,
            'fecha'=>$fecha,
            'estado'=>$estado
        ];
        
        $condicion = "id_usuario=$id";
        /// TENEMOS QUE JUGAR CON EL MODELO
        require_once "modelo/UsuarioModelo.php";
        $usuarioModelo = new UsuarioModelo();
        // Enviando desde el controlador
        $respuesta = $usuarioModelo->actualizar($datosEnviar,$condicion);         

        if ($respuesta) {
            // Todo correcto
            header("Location: ./?c=usuario&m=listar");
        } else {
            echo "Hay error";
        }
    }
    function eliminar(){
        $id = $_GET["id"];
        require_once "modelo/UsuarioModelo.php";
        $usuarioModelo = new UsuarioModelo();
        $condicion = "id_usuario = $id";
        $respuesta = $usuarioModelo->eliminar($condicion);
        if ($respuesta) {
            // Todo correcto
            header("Location: ./?c=usuario&m=listar");
        } else {
            echo "Hay error";
        }
    }
}
?>