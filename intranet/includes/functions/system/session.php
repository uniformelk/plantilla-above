<?php
	class Session{

		private $codeSession = "devsgo";

		public function __construct(){
			session_name($this->codeSession);
			session_start();		
		}

		public function checkSession(){
			$check = false;
			if( isset($_SESSION['usuario_admin']) && !empty($_SESSION['usuario_admin']) ){
				$check = true;
			}
			return $check;
		}

		public function createSession( array $datos){
			$_SESSION = array();

			$_SESSION['usuario_admin'] = $datos['usuario'];
			$_SESSION['nombre_admin'] = $datos['nombres']." ".$datos['apellidos'];
			$_SESSION['perfil'] = $datos['perfil'];
			$_SESSION['id'] =$datos['id_usuario'];
			$_SESSION['estado_sidebar'] ='';

			
		}

		public function endSession(){
			$_SESSION = array();

			if(ini_get("session.use_cookies")){
				$params = session_get_cookie_params();
				setcookie(session_name(), '', time() - 42000,$params['path'], $params['domain'], $params['secure'], $params['httponly']);
			}

			session_destroy();
		}
	}
	/*
	$session = new Session();

	if( !$session->checkSession() ){
		$session->createSession(
			array(
				'usuario' => 'test',
				'nombre' => 'cristian'
			)
		);
	}

	$session->endSession();
	*/
	

?>