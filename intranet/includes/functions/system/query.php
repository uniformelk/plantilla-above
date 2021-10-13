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
		$total = array();
		$fecha = date("Y");
        if($bandera == 1){
            $resultadoP = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total, estado as estado FROM proyectos GROUP BY estado");
            foreach($resultadoP as $filaP){
                array_push($datos, intval($filaP['total']));
            }
            
            $respuesta->data[]=$datos;
        }

		if($bandera == 2){
            $resultadoP = $conexion->ejecutarConsulta('SELECT SUM(valor_contrato) AS total, SUBSTRING_INDEX(SUBSTRING_INDEX(fecha_actualizacion, " ", 1),"-",2) AS fecha FROM proyectos WHERE fecha_actualizacion LIKE ("'.$fecha.'%") AND estado = 2 GROUP BY SUBSTRING_INDEX(SUBSTRING_INDEX(fecha_actualizacion, " ", 1),"-",2)');
            
			$categorias = array();
        	$data = array();

        	foreach($resultadoP as $fila){
				if($fila['fecha'] == null){
					$fila['fecha'] = "Anteriores";
				}
            	$categorias[] = $fila['fecha'];
            	$data[] = (int)$fila['total'];  
        	}
        
        $respuesta->data['categories'] = $categorias;
        $respuesta->data['series']= $data;
        }
	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>