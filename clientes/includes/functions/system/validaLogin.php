<?php
    include ('session.php');
    include ('conexionbd.php');
    $conexion = new Conexion('../logs');
    $conexion->conectar();
    $session = new Session();
    $respuesta = new stdClass();
	$respuesta->estado = 1;
	$respuesta->mensaje = "";
    $respuesta->data = array();
    try{
        $user = $_POST['usuario'];
        $pass = $_POST['password'];
        $pass_cifrado = md5($pass);

		$consultaE = $conexion->ejecutarConsulta(" SELECT COUNT(*) AS total FROM clientes WHERE id_cliente = ".$user."");

		foreach ($consultaE as $filaE) {
			if($filaE['total']==0) throw new Exception("Verifique su usuario");
		}
		
		$consultaP = $conexion->ejecutarConsulta(" SELECT COUNT(*) AS totalp FROM clientes WHERE (id_cliente = '".$user."') AND (password = '".$pass_cifrado."')");

		foreach ($consultaP as $filaP) {
			if($filaP['totalp']==0) throw new Exception("Verifique su contraseña ");
		}

		$consultaU = $conexion->ejecutarConsulta("SELECT * FROM clientes WHERE (id_cliente = '".$user."') AND (password = '".$pass_cifrado."')");
		foreach ($consultaU as $filaU) {
			$session->createSession($filaU);
		}
        
      }
      catch(Exception $e){
          $respuesta->estado = 2;
          $respuesta->mensaje = $e->getMessage();
      }
  
      print_r(json_encode($respuesta));
  ?>