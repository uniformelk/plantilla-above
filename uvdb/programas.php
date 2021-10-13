<?php
require('includes/templates/header.php');
include("includes/functions/conexion.php");

$conexion = new Conexion();
$conexion->conectar(); 
    $programa = $_GET['programa'];
    $nombre_programa = '';
    $sede = 0;
    
    $resultado = $conexion->ejecutarConsulta('SELECT * FROM detalle_programa INNER JOIN programa ON programa.id_programa = detalle_programa.id_programa WHERE detalle_programa.id_programa ='.$programa);
    foreach($resultado as $fila){
        $nombre_programa = $fila['programa'];
        $sede = $fila['id_sede'];
    }
?>
<div class="row p-5 pb-0" id="home">
    <div class="col-12 col-md-6"></div>
    <div class="col-12 col-md-6 text-right texto-terciario">
        <h1 class="completo fuente-primaria"><?php echo $nombre_programa; ?></h1>
        
    </div>
</div>
<div class="row px-5 py-5 ">
    <?php foreach($resultado as $fila){ ?>
    <div class="col-12 col-lg-6 text-start text-lg-end mt-3">
        <img src="assets/img/programas/<?php echo $fila['imagen'];?>" alt="" class="img-fluid">
    </div>
   
    <div class=" col-12 col-lg-6 descripcion text-light px-3 mt-3">
        <p><span>Titulo otorgado:</span> <?php echo $fila['titulo']; ?></p>
        <p><span>Nivel de formación:</span> <?php echo $fila['nivel_formacion']; ?></p>
        <p><span>Modalidad:</span> <?php echo $fila['modalidad']; ?></p>
        <p><span>Creditos:</span> <?php echo $fila['creditos']; ?></p>
        <p><span>Cód. SNIES:</span> <?php echo $fila['snies']; ?></p>
        <p><span>Registro calificado:</span> <?php echo $fila['reg_calificado']; ?></p>
        <p><span>Vigencia:</span></p>
        <p><span>Duración del Programa:</span> <?php echo $fila['duracion']; ?></p>
        <p><span>Área del conocimiento:</span> <?php echo $fila['conocimiento']; ?></p>
        <p><span>Precio oficial:</span> $ <?php echo $fila['precio_ofi']; ?></p>
        <p><span>Precio subsidiado por la sede:</span> $ <?php echo $fila['precio_sub']; ?></p>
    </div>
    <?php } ?>
    
</div>
<div class="text-center p-3">
        <a href="/uvdb/#home"><button class="btn btn-warning" id="btn_home">Inicio <i class="fas fa-home"></i></button></a>
        <a href="sedes?sede=<?php echo $sede ?>#home"><button class="btn btn-warning" id="btn_home">Regresar <i class="fas fa-undo"></i></button></a>
    </div>
<?php require('includes/templates/footer2.php');?>