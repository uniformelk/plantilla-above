<?php 
	include("../system/session.php");
	include("../system/conexion.php");

	$conexion = new Conexion('../logs/');
	$conexion->conectar();

	$session = new Session();

	$respuesta = new stdClass();
	$respuesta->estado = 1;
    $respuesta->mensaje = "";
    
	try{

		$bandera = $_POST['bandera'];
        
        if($bandera == 1){
            $id_cliente = 0;
            $nombre_cliente = 0;
            $pass = "";
            date_default_timezone_set('America/Lima');
            $fecha = date("Y-m-d H:m:s");

            $id_cliente = $_POST['id_cliente'];
            $nombre_cliente = $_POST['nombre_cliente'];
            
            if($id_cliente == "" || $nombre_cliente == ""){
                throw new Exception("Algunos campos estan vacios");
            }
            
            $resultadoC = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total  FROM clientes WHERE id_cliente = ".$id_cliente.";");
            $total_c = 0;
            foreach($resultadoC as $filaC){
                $totalC = $filaC['total'];
            }

            if($totalC != 0){
                throw new Exception("El cliente ".$nombre_cliente." ya se encuentra registrado con numero de documento ".$id_cliente);
            }

            $pass = md5("12345");

            $conexion->ejecutarConsulta("INSERT INTO clientes(id_cliente, nombre_cliente, password, estado, fecha_creacion, usuario_creacion) VALUES (".$id_cliente.", '".$nombre_cliente."', '".$pass."', 1, '".$fecha."', '".$_SESSION['usuario_admin']."');");

            $respuesta->mensaje = "El cliente a sido creado con exito";


        }

	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>