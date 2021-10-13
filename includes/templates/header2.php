<!DOCTYPE html>
 <html lang="es">
<?php $url = ($_SERVER['PHP_SELF']);
    $url_f = explode("/", $url);
?>
    
<head>

    	<!-- Metas -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="author" content="" />

		<!-- Title  -->
		<title>DevsGo</title>

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/logo.ico" />

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">

		<!-- Plugins -->
		<link rel="stylesheet" href="assets/css/plugins.css" />

        <!-- Core Style Css -->
        <link rel="stylesheet" href="assets/css/style.css" />
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		

    </head>

    <body>

    	<!-- =====================================
    	==== Start Loading -->

    	<div class="loading">
    		<div class="text-center middle">
    			<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
    		</div>
    	</div>
        
    	<!-- End Loading ====
    	======================================= -->

       
    	<!-- =====================================
    	==== Start Navbar -->

		<nav class="navbar navbar-expand-lg">
			<div class="container">

            <!-- Logo -->
            <a class="logo" href="index.php">
                <img src="assets/img/logo-light.png" alt="logo">          
            </a>

			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="icon-bar"><i class="fas fa-bars"></i></span>
			  </button>

			  <!-- navbar links -->
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			    <ul class="navbar-nav ml-auto">
			      <li class="nav-item">
			        <a class="nav-link " href="/" >Inicio</a>
			      </li>
			      <li class="nav-item ">
                    <a class="nav-link <?php if($url_f[2] == 'servicios.php'){
                        echo "active";
                    } ?> " href="servicios" >Servicios</a>
                  </li>
			      <li class="nav-item">
			        <a class="nav-link <?php if($url_f[2] == 'portafolio.php'){
                        echo "active";
                    } ?> " href="portafolio" >Portafolio</a>
			      </li>
                  <!--<li class="nav-item">
                    <a class="nav-link" href="#" >Equipo</a>
                  </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#" >Blog</a>
			      </li>-->
			      <li class="nav-item">
			        <a class="nav-link" href="contacto" >Contacto</a>
			      </li>
				  <li class="nav-item">
			        <a class="nav-link" href="clientes">Portal Clientes</a>
			      </li>
			    </ul>
			  </div>
			</div>
		</nav>

    	<!-- End Navbar ====
    	======================================= -->