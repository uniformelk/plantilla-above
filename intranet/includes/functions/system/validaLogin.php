<?php
    include ('session.php');
    include ('conexion.php');
    $conexion = new Conexion('logs/');
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

        $consultaU = $conexion->ejecutarConsulta("SELECT id_usuario FROM usuarios WHERE usuario = '".$user."'");
        $id_user = 0;
        $ip_origen = Funciones::ObtenerIP();
        $navegador = Funciones::ObtenerNavegador($_SERVER['HTTP_USER_AGENT']);
        foreach($consultaU as $filaU){
            $id_user = $filaU['id_usuario'];
        }

		$consultaE = $conexion->ejecutarConsulta(" SELECT COUNT(*) AS total FROM usuarios WHERE usuario = '".$user."'");

		foreach ($consultaE as $filaE) {
            if($filaE['total']==0) throw new Exception("Verifique su usuario");
		}
		
		$consultaP = $conexion->ejecutarConsulta(" SELECT COUNT(*) AS totalp FROM usuarios WHERE (usuario = '".$user."') AND (password = '".$pass_cifrado."')");

		foreach ($consultaP as $filaP) {
			if($filaP['totalp']==0){
                $conexion->ejecutarConsulta("INSERT INTO logs(id_usuario, fecha_evento, tipo_evento, ip_origen, navegador) VALUES (".$id_user.",NOW(),". 2 .", '".$ip_origen."', '".$navegador."')");
                throw new Exception("Verifique su contraseña ");
            }    
		}

		$consultaU = $conexion->ejecutarConsulta("SELECT * FROM usuarios WHERE (usuario = '".$user."') AND (password = '".$pass_cifrado."')");
		foreach ($consultaU as $filaU) {
            $conexion->ejecutarConsulta("INSERT INTO logs(id_usuario, fecha_evento, tipo_evento, ip_origen, navegador) VALUES (".$id_user.",NOW(),". 1 .",'".$ip_origen."', '".$navegador."')");
			$session->createSession($filaU);
		}
        
      }
      catch(Exception $e){
          $respuesta->estado = 2;
          $respuesta->mensaje = $e->getMessage();
      }
  
      print_r(json_encode($respuesta));
  ?>
