<?php 
	include("../system/session.php");
	include("../system/conexion.php");
    include("../system/conexionAlterna.php");

	$conexion = new Conexion('../logs/');
    $conexion->conectar();
    $conexionAlterna = new Conexion2('../logs/');

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
                $conexionAlterna->conectarAlterno($servidor,$usuario,$password,$base_datos);
                $resultadoRe = $conexionAlterna->ejecutarConsulta('SELECT sede, COUNT(*) AS total FROM '.$tabla.' WHERE modalidad = "'.$modalidad.'" GROUP BY sede ORDER BY sede;');
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
                $conexionAlterna->conectarAlterno($servidor,$usuario,$password,$base_datos);
                if(($tabla!="registros_sc" && $id_proyecto!=33) && ($id_proyecto !=30)){
                    $resultadoRe = $conexionAlterna->ejecutarConsulta('SELECT sede, COUNT(*) AS total FROM '.$tabla.' GROUP BY sede ORDER BY total DESC LIMIT 10;');
                    foreach($resultadoRe as $fila){
                        $sede[] = $fila['sede'];
                         $total[] = (int)$fila['total'];  
                     }
                }elseif($id_proyecto!=33){
                    $resultadoRe = $conexionAlterna->ejecutarConsulta('SELECT programa, COUNT(*) AS total FROM '.$tabla.' GROUP BY programa ORDER BY total DESC LIMIT 10;');
                    foreach($resultadoRe as $fila){
                        $sede[] = $fila['programa'];
                         $total[] = (int)$fila['total'];  
                     }
                }else{
                    $resultadoRe = $conexionAlterna->ejecutarConsulta('SELECT programa, COUNT(*) AS total FROM '.$tabla.' GROUP BY programa ORDER BY total DESC LIMIT 10;');
                    foreach($resultadoRe as $fila){
                        $sede[] = $fila['programa'];
                         $total[] = (int)$fila['total'];  
                        }
                    }
                
                
            
                $respuesta->data['categories'] = $sede;
                $respuesta->data['series']= $total;
            }
        }

        if($bandera==3){
            $fechaI = $_POST['fechaI'];
            $fechaF = $_POST['fechaF'];
            $fechaF = date("Y-m-d",strtotime($fechaF."+ 1 days"));
            $total = array();
            
            $validatabla = explode(",", $tabla);
            $conexionAlterna->conectarAlterno($servidor,$usuario,$password,$base_datos);
            $contador = 1;
            foreach($validatabla as  $filaTabla){
                
                $resultadoTotal = $conexionAlterna->ejecutarConsulta('SELECT count(*) AS total FROM '.$filaTabla.' WHERE fecha_registro BETWEEN "'.$fechaI.'" AND "'.$fechaF.'"');
                $tabla = "registros".$contador;
                $contador++;
                foreach($resultadoTotal as $filaTotal){

                    $total[$tabla] = $filaTotal['total'];
                }
            }

            $respuesta->data[] = $total;
        }

		
	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>