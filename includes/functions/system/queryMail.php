<?php
    $respuesta = new stdClass();
	$respuesta->estado = 1;
	$respuesta->mensaje = "";
	$respuesta->data = array();

	try{
      $nombre = $_POST['nombre'];
      $correo = $_POST['correo'];
      $asunto = $_POST['asunto'];
      $mensaje = $_POST['mensaje'];
      $destinatario = 'contacto@devsgo.com.co, tecnologias@devsgo.com.co';
      $cuerpo = ' 
        <html> 
            <head> 
            <title>'.$nombre.'</title> 
            </head>
            <style>
                h1{
                    width: 100%;
                    text-align: center;
                    color: #1e294b;
                }
                p{
                    width:100%;
                    text-align: center;
                    color: #53b5be;
                }
            </style> 
            <body> 
            <h1>'.$asunto.'</h1> 
            <p> 
            <b>'.$mensaje.'
            </p> 
            </body> 
        </html> 
    '; 
    //para el envío en formato HTML 
    $headers = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

    //dirección del remitente 
    $headers .= "From: ".$nombre." <".$correo.">\r\n";
    mail($destinatario,$asunto,$cuerpo,$headers);  
    }
    catch(Exception $e){
		$respuesta->estado = 2;
		$respuesta->mensaje = $e->getMessage();
	}

	print_r(json_encode($respuesta));
?>

