<?php 
	include("../system/session.php");
	
	$session = new Session();

	$respuesta = new stdClass();
	$respuesta->estado = 1;
    $respuesta->mensaje = "";
    
	try{

        $estado = $_SESSION['estado_sidebar'];
        
        if($estado == ""){
            $_SESSION['estado_sidebar'] = "activa";
        }else{
            $_SESSION['estado_sidebar'] = "";
        }

	}catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>