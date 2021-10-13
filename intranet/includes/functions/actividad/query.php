<?php 
	include("../system/session.php");
	include("../system/conexion.php");

	$conexion = new Conexion('../logs/');
	$conexion->conectar();

	$session = new Session();

	$respuesta = new stdClass();
	$respuesta->estado = 1;
    $respuesta->mensaje = "";
    $respuesta->data = array();

	try{

		$bandera = $_POST['bandera'];
		$datos = array();
        if($bandera == 1){
            $resultadoF = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM logs WHERE id_usuario = ".$_SESSION['id']." AND tipo_evento = 2");
            foreach($resultadoF as $filaF){
                array_push($datos, intval($filaF['total']));
            }
            
            $resultadoS =  $conexion->ejecutarConsulta("SELECT COUNT(*) AS totalS FROM logs WHERE id_usuario = ".$_SESSION['id']." AND tipo_evento = 1");
            foreach($resultadoS as $filaS){
                array_push($datos, intval($filaS['totalS']));
            }
            $respuesta->data[]=$datos;
        }
	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>