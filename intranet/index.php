<?php 
include ('includes/functions/system/session.php');
$session = new Session(); 

if($session->checkSession()){
    echo "<script> window.location='paneldecontrol.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="es">

    
    <head>

            <!-- Metas -->
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <meta name="author" content="" />

            <!-- Title  -->
            <title>DevsGo - Intranet</title>

            <!-- Favicon -->
            <link rel="shortcut icon" href="assets/img/logo.ico" />

            <!-- Google Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

            <link href="assets/css/bootstrap.css" rel="stylesheet">
            <link href="assets/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="hero d-flex justify-content-center align-items-center">
            <div class="login text-dark">
                <div class="col-8 offset-2">
                    <img src="assets/img/logo.png" alt="Logo DevsGo" class="img-fluid">
                </div>
                <h2 class="text-center pt-4">Bienvenido</h2>
                <p>Digita tus datos para acceder</p>
                <div class="alert alert-danger oculto" role="alert" id="mensajeAlerta">
                    verifica tus datos e intenta nuevamente.
                </div>
                <div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Usuario:</label>
                        <input type="text" class="form-control" id="user" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Contraseña: </label>
                        <input type="password" class="form-control" id="pass" placeholder="Contraseña">
                    </div>
                </div>
                <button class="btn btn-block btn-outline-dark mt-4" id="inicioSesion">Iniciar Sesion</button>
            </div>
        </div>
    </body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</html>
    	