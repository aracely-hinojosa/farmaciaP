<?php
class Login{
    function index(){
        require_once "vista/login/index.php";
    }
    function verificar(){
        $usu=$_POST['usu'];
        $contra=$_POST['contra'];
        //Llmar al modelo usuario
        require_once "modelo/UsuarioModelo.php";
        $usuarioModelo=new UsuarioModelo();
        $usuarios = $usuarioModelo -> seleccionar('*', "estado=1 and usu='$usu' and contra=sha1('$contra')");

        if(count($usuarios)>0){
            session_start();
            $_SESSION['usuario'] = $usuarios[0];
            header("Location: ./?c=principal&m=inicio");
        }
        else{
            //No existe el usuario y redireccionar al index
            header("Location: ./?c=login&m=index");
        }
    }
    function salir(){
        session_start();
        unset($_SESSION['usuario']);
        session_destroy();
        header("Location: ./?c=login&m=index");
    }
}
?>