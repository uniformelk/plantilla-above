<?php
require('includes/templates/header.php');
include("includes/functions/conexion.php");

$conexion = new Conexion();
$conexion->conectar(); 
    $sede = $_GET['sede'];
    $nombre_sede = '';
    
    $resultado = $conexion->ejecutarConsulta('SELECT * FROM programa INNER JOIN sede ON sede.id_sede = programa.id_sede WHERE programa.id_sede ='.$sede);
    foreach($resultado as $fila){
        $nombre_sede = $fila['sede'];
    }
?>
<div class="row p-5 pb-0">
    <div class="col-12 text-right texto-terciario" id="home">
        <h2 class="completo fuente-secundaria">Programas</h2>
        <h1 class="completo fs-5"><?php echo $nombre_sede; ?></h1>
        <p class="completo fuente-secundaria">ELIGE EL PROGRAMA QUE DESEAS VER</p>
    </div>
</div>
<div class="text-right w-100 px-5">
    <img src="assets/img/row.png" alt="" class="img-fluid mx-5">
</div>
<div class="mx-5 bg-terciario border-radius pt-0">
        <div  >
            <div class="row" >
            <?php
                foreach($resultado as $fila){
            ?>
                <div class="col-12 col-md-6 col-lg-3 px-3 py-0">
                        <div class="bg-terciario py-5 px-3  text-center border-radius">
                            <img src="assets/img/programas/<?php echo $fila['imagen']; ?>" alt="Sede <?php echo $fila['id_sede']; ?>" class="img-fluid">
                            <a href="index3?programa=<?php echo $fila['id_programa']; ?>#home"><button class="btn btn-warning mt-4 btn-completo"><?php echo $fila['programa'];?> <i class="fas fa-chevron-right"></i></button></a>
                        </div>
                    </div>
                        
            <?php } ?>
                    <div class="text-center py-3">
                        <a href="/uvdb/#home"><button class="btn btn-warning" id="btn_home">Inicio <i class="fas fa-home"></i></button></a>
                    </div>
            </div>
        </div>
    
</div>
<?php require('includes/templates/footer.php');?>