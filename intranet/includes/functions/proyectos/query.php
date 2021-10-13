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
             $cliente = $_POST['cliente'];
             $proyecto = $_POST['proyecto'];
             $descripcion = $_POST['descripcion'];
             $alcance = $_POST['alcance'];
             $numero1 = $_POST['numeroUno'];
             $descripcionServicio1 = $_POST['descripcionServicioUno'];
             $valor1 = $_POST['valorUno'];
             $numero2 = $_POST['numeroDos'];
             $descripcionServicio2 = $_POST['descripcionServicioDos'];
             $valor2 = $_POST['valorDos'];
             $numero3 = $_POST['numeroTres'];
             $descripcionServicio3 = $_POST['descripcionServicioTres'];
             $valor3 = $_POST['valorTres'];
             $descripcionServicios = $descripcionServicio1."-".$descripcionServicio2."-".$descripcionServicio3;
             $valorServicio = $valor1."-".$valor2."-".$valor3;
             $valorTotal = $_POST['valorT'];
             
            if($cliente == 0){
                throw new Exception("Debe Seleccionar un cliente");
            }

            if(empty($proyecto) || empty($descripcion) || empty($alcance)){
                throw new Exception("Se encuentran campos vacios verifica el formulario");
            }
             
            $consultaPro = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM proyectos WHERE nombre_proyecto = '".$proyecto."' AND id_cliente = '".$cliente."'");

            foreach($consultaPro as $filaPro){
                if($filaPro['total'] > 0){
                    throw new Exception("Este nombre de prOyecto ya se encuentra registrado para este cliente");
                }
            }

            $conexion->ejecutarConsulta("INSERT INTO proyectos(nombre_proyecto, id_cliente, descripcion, usuario_creacion, fecha_creacion, valor_contrato, progreso, estado, alcance, descripcion_servicios, valor_servicios) VALUES ('".$proyecto."', ".$cliente.", '".$descripcion."', '".$_SESSION['usuario_admin']."', NOW(), ".$valorTotal.", 0, 0, '".$alcance."', '".$descripcionServicios."', '".$valorServicio."' );");

            $respuesta->mensaje = "El proyecto fue cargado correctamente";
 
        }

        if($bandera == 2){
            $tareas = array();
            $tareas = $_POST['tareas'];
            $id_proyecto = $_POST['idProyecto'];
            $cantidadT = count($tareas);
            for($i=0; $i<$cantidadT; $i++){
                $conexion->ejecutarConsulta("INSERT INTO tareas(id_proyecto, tarea, estado, fecha_creacion, usuario_creacion) VALUES (".$id_proyecto.", '".$tareas[$i]."', 0, NOW(), '".$_SESSION['usuario_admin']."')");
            }
            $conexion->ejecutarConsulta("UPDATE proyectos SET estado=1 WHERE id_proyecto = ".$id_proyecto."");
            
        }

        if($bandera == 3){
            $id = $_POST['idProyecto'];
            $totalT = 0;
            $resultadoPa = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM tareas WHERE id_proyecto = ".$id." AND estado = 0");
            foreach($resultadoPa as $filaPa){
                $totalT = $filaPa['total'];
            }

            if($totalT > 0){
                throw new Exception("El proyecto aun se encuentra con tareas pendientes, termina todas las actividades para poder culminar el proyecto");
            }

            $conexion->ejecutarConsulta("UPDATE proyectos SET estado = 2, usuario_actualizacion = '".$_SESSION['usuario_admin'] ."', fecha_actualizacion = NOW() WHERE id_proyecto = ".$id."");
            $respuesta->mensaje = "el proyecto se ha terminado";
        }

	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>