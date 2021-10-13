<?php
class Conexion{
		private $baseDatos;
		private $usuario;
		private $clave;
		private $servidor;
		private $conexion;
		private $puerto;

		public function __construct(){
			$this->baseDatos = 'devsgo';
			$this->usuario = 'root';
			$this->clave = '';
			$this->servidor = 'localhost';
			$this->puerto = '3306';
		}

		public function parametros($baseDatos, $usuario, $clave, $servidor, $puerto = 3306){
			$this->baseDatos = $baseDatos;
			$this->usuario = $usuario;
			$this->clave = $clave;
			$this->servidor = $servidor;
			$this->puerto = $puerto;
		}

		public function conectar(){
			$mysqli = new mysqli($this->servidor, $this->usuario, $this->clave, $this->baseDatos, $this->puerto);
			if( $mysqli->connect_error ){
				die("Error de conexion: ( ".$mysqli->connect_errno." ) ".$mysqli->connect_error);
				$this->conexion = false;
				return false;
			}else{
				$this->conexion = $mysqli;
				$this->conexion->set_charset('utf8');
				return true;
			}
		}

		

		public function ejecutarConsulta($sql){
			$resultado = $this->conexion->query($sql);

			if($resultado){
				return $resultado;
			}
		}

		public function __destruct(){
			if( $this->conexion ){
				$this->conexion->close();
			}
		}
}

?>