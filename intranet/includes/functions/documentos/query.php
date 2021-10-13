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
            $id_proyecto = 0;
            $descripcion = "";
            $tipo = "";
            $url = "";

            $id_proyecto = $_POST['id_proyecto'];
            $descripcion = $_POST['descripcion'];
            $tipo = $_POST['tipo'];
            $url = $_POST['url'];

            if($id_proyecto == 0){
                throw new Exception("Debe seleccionar un proyecto al cual asignar dicho documento");
            }

            if($tipo == "default"){
                throw new Exception("Debe seleccionar un tipo de documento".$tipo);
            }

            if($descripcion == "" || $url == ""){
                throw new Exception("El campo url o descripcion estan vacios");
            }
            
            $resultadoC = $conexion->ejecutarConsulta("SELECT id_cliente FROM proyectos WHERE id_proyecto = ".$id_proyecto."; ");

            foreach($resultadoC as $filaC){
                $id_cliente = $filaC['id_cliente'];
            }

            $conexion->ejecutarConsulta("INSERT INTO documentacion(descripcion, tipo, url, id_cliente, id_proyecto, usuario_creacion, fecha_creacion, version) VALUES ('".$descripcion."', '".$tipo."', '".$url."', ".$id_cliente.", ".$id_proyecto.", '".$_SESSION['usuario_admin']."', NOW(), 1);");

            $respuesta->mensaje = "El documento a sido creado con exito";


        }

	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>