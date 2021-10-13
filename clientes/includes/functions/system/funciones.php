<?php
	class Funciones{
		
		public static function Logs($nombre_archivo, $ubicacion, $descripcion){
			$carpeta = $ubicacion.date('Y').'/'.date('m').'/'.date('d').'/';
			if( !file_exists( $ubicacion.date('Y').'/'.date('m').'/'.date('d') ) ){
				mkdir($ubicacion.date('Y').'/'.date('m').'/'.date('d'), 0777, true);
			}
			
			$archivo = fopen($carpeta.$nombre_archivo.'.txt', "a") or die("Archivo inaccesible");
			fwrite($archivo, date("Y-m-d H:i:s").' ---> '. $descripcion."\r\n");
			fclose($archivo);
		}
	
	

		public static function ObtenerIP(){
			$ipaddress = '';
			if (getenv('HTTP_CLIENT_IP')){
				$ipaddress = getenv('HTTP_CLIENT_IP');
			}
			elseif (getenv('HTTP_X_FORWARDED_FOR')) {
				$ipaddress = getenv("HTTP_X_FORWARDED_FOR");
			}
			elseif (getenv('HTTP_X_FORWARDED')) {
				$ipaddress = getenv("HTTP_X_FORWARDED");
			}
			elseif (getenv('HTTP_FORWARDED_FOR')) {
				$ipaddress = getenv('HTTP_FORWARDED_FOR');
			}
			elseif (getenv('HTTP_FORWARDED')) {
				$ipaddress = getenv('HTTP_FORWARDED');
			}
			elseif (getenv('REMOTE_ADDR')) {
				$ipaddress = getenv('REMOTE_ADDR');
			}
			else{
				$ipaddress = 'UNKNOWN';
			}
			return $ipaddress;
		}

		public static function ObtenerNavegador($useragent){
			if(preg_match('|MSIE ([0-9].[0-9]{1,2})|', $useragent,$matched)){
				$browser_version=$matched[1];
				$bowser = 'IE';
			}
			elseif(preg_match('|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)){
				$browser_version=$matched[1];
				$bowser = 'Opera';
			}
			elseif (preg_match('|Firefox/([0-9\.]+)|', $useragent,$matched)) {
				$browser_version=$matched[1];
				$bowser = 'Firefox';	
			}
			elseif(preg_match('|Chrome/([0-9\.]+)|', $useragent,$matched)){
				$browser_version=$matched[1];
				$bowser = 'Chrome';
			}
			elseif(preg_match('|Safari/([0-9\.]+)|', $useragent,$matched)){
				$browser_version=$matched[1];
				$bowser = 'Safari';
			}
			else{
				$browser_version = 0;
				$bowser = 'Desconocido';
			}
			return $bowser." - ".$browser_version;
		}
	}

	//Funciones::Logs("test", "../logs/", "mesaje de prueba");
?>