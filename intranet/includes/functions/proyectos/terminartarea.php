<?php
    include("../system/session.php");
	include("../system/conexion.php");

	$conexion = new Conexion('../logs/');
	$conexion->conectar();

	$session = new Session();
    
    $id = $_GET['id'];
    $tarea = $_GET['tarea'];
	$tareasActivas = 0;
	$tareasTer = 0;
	$progreso = 0;

	$resultadoTA = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM tareas WHERE id_proyecto = ".$id."");
	foreach($resultadoTA as $filaTA){
		$tareasActivas = $filaTA['total'];
	}
	
	$conexion->ejecutarConsulta("UPDATE tareas SET estado = 1, usuario_actualizacion = '".$_SESSION['usuario_admin']."', fecha_actualizacion = NOW() WHERE id_proyecto = ".$id." AND tarea = '".$tarea."' ");

    $resultadoT = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM tareas WHERE id_proyecto = ".$id." AND estado = 1");
	foreach($resultadoT as $filaT){
		$tareasTer = $filaT['total'];
	}

	$progreso = ($tareasTer*100)/$tareasActivas;

	$conexion->ejecutarConsulta("UPDATE proyectos SET progreso = ".$progreso.", usuario_actualizacion = '".$_SESSION['usuario_admin']."', fecha_actualizacion = NOW() WHERE id_proyecto = ".$id.";");

	header("location: ../../../detalle_proyecto.php?id=".$id);

?>