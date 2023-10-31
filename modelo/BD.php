<?php
class BD{
    private $conexion;
    public $nombreTabla;
    function __construct()
    {
        //conectar a la BD mysqli_connect
        $this->conexion = new mysqli('localhost','root','','tienda');
    }
    function insertar($valoresEntrada){
        $campos =\array_keys($valoresEntrada);//sacamos los keys del array
        $campos=\implode(',',$campos);//Unir los campos con una coma
        $valores=\array_values($valoresEntrada);//sacar los valores del array
        $valores="'".\implode("','",$valores)."'";//unimos los valores con una coma

        //INSERT INTO producto(campo1,campo2,..) VALUES (1,2,3,...);
        //INSERT INTO compra (campo1, campo2,...) VALUES (1,2,..);

        $consulta="INSERT INTO $this->nombreTabla($campos) VALUES ($valores)";
        //echo $consulta;

        $respuesta=$this->conexion->query($consulta);
        return $respuesta;
    }
    function seleccionar($campos='*',$condiciones='',$camposGroupBy='',
                        $whereHaving='',$ordenamiento='',$limites=''){
        if($condiciones!=""){//si hay condiciones
            $condiciones="WHERE $condiciones";
        }
        if($camposGroupBy!=""){//si hay campos para agrupar
            $camposGroupBy="GROUP BY $camposGroupBy";
        }
        if($whereHaving!=""){//si hay condiciones para agrupar
            $whereHaving="HAVING $whereHaving";
        }
        if($ordenamiento!=""){//si hay ordanamientos
            $ordenamiento="ORDER BY $ordenamiento";
        }
        if($limites!=""){//si hay limites
            $limites="LIMIT $limites";
        }
        //preparar la consulta
        $consulta="SELECT $campos
                    FROM ".$this->nombreTabla."
                    $condiciones
                    $camposGroupBy
                    $whereHaving
                    $ordenamiento
                    $limites";
        $respuesta=$this->conexion->query($consulta);
        $datos=[];
        while($fila=$respuesta->fetch_assoc()){//mientras haya fila 
            $datos[]=$fila;
        }
        return $datos;
    }
    function actualizar($valoresEntrada, $condicion)
    {
        foreach ($valoresEntrada as $campo => $valor) {
            $campos[] = "$campo = '$valor'";
        }
        $campos = \implode(',', $campos);
        $consulta = "UPDATE " . $this->nombreTabla .
            " SET $campos
             WHERE $condicion";
        // echo $consulta;
        $respuesta = $this->conexion->query($consulta);
        return $respuesta;
    }
    function eliminar($condicion){
        $consulta = "UPDATE " . $this->nombreTabla .
        " SET estado = 0 WHERE $condicion";
        $respuesta = $this->conexion->query($consulta);
        return $respuesta;
    }
}
?>