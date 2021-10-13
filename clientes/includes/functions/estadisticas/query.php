<?php 
	include("../system/session.php");
	include("../system/conexionbd.php");

	$conexion = new Conexion('../logs/');
    $conexion->conectar();

	$session = new Session();

	$respuesta = new stdClass();
	$respuesta->estado = 1;
    $respuesta->mensaje = "";
    $respuesta->data = array();

    $id_proyecto = $_POST['id_proyecto'];
    $resultadoDatos = $conexion->ejecutarConsulta("SELECT * FROM estadisticas WHERE estadisticas.id_proyecto = ".$id_proyecto.";");
	
    foreach($resultadoDatos as $filaDatos){
        $base_datos = $filaDatos['base_datos'];
        $tabla = $filaDatos['tabla'];
        $usuario = $filaDatos['usuario'];
        $password = $filaDatos['password'];
        $servidor = $filaDatos['servidor'];
    }
    
    
    try{

		$bandera = $_POST['bandera'];
        $sede = array();
		$total = array();
		$fecha = date("Y");
        if($bandera == 1){
            $modalidad = $_POST['modalidad'];
            if(isset($base_datos)){
                $conexion->conectarAlterno($servidor,$usuario,$password,$base_datos);
                $resultadoRe = $conexion->ejecutarConsulta('SELECT sede, COUNT(*) AS total FROM '.$tabla.' WHERE modalidad = "'.$modalidad.'" GROUP BY sede ORDER BY sede;');
                foreach($resultadoRe as $fila){
                   $sede[] = $fila['sede'];
                    $total[] = (int)$fila['total'];  
                }
            
                $respuesta->data['categories'] = $sede;
                $respuesta->data['series']= $total;
            }
        }

        if($bandera==2){
            $tabla = $_POST['modalidad'];
            
            if(isset($base_datos)){
                $conexion->conectarAlterno($servidor,$usuario,$password,$base_datos);
                if($tabla!="registros_sc" && $id_proyecto!=33){
                    $resultadoRe = $conexion->ejecutarConsulta('SELECT sede, COUNT(*) AS total FROM '.$tabla.' GROUP BY sede ORDER BY total DESC LIMIT 10;');
                    foreach($resultadoRe as $fila){
                        $sede[] = $fila['sede'];
                         $total[] = (int)$fila['total'];  
                     }
                }elseif($id_proyecto!=33){
                    $resultadoRe = $conexion->ejecutarConsulta('SELECT programa, COUNT(*) AS total FROM '.$tabla.' GROUP BY programa ORDER BY total DESC LIMIT 10;');
                    foreach($resultadoRe as $fila){
                        $sede[] = $fila['programa'];
                         $total[] = (int)$fila['total'];  
                     }
                }else{
                    $resultadoRe = $conexion->ejecutarConsulta('SELECT programa, COUNT(*) AS total FROM '.$tabla.' GROUP BY programa ORDER BY total DESC LIMIT 10;');
                    foreach($resultadoRe as $fila){
                        $sede[] = $fila['programa'];
                         $total[] = (int)$fila['total'];  
                        }
                    }
                
                
            
                $respuesta->data['categories'] = $sede;
                $respuesta->data['series']= $total;
            }
        }

		
	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>