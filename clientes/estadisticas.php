<?php include('includes/templates/header.php');

$id_proyecto = $_GET['id_proyecto'];
$id_cliente = $_SESSION['usuario'];
$resultadoDatos = $conexion->ejecutarConsulta("SELECT * FROM estadisticas WHERE (estadisticas.id_cliente = ".$id_cliente." AND estadisticas.id_proyecto = ".$id_proyecto.");");


foreach($resultadoDatos as $filaDatos){
    $base_datos = $filaDatos['base_datos'];
    $tabla = $filaDatos['tabla'];
    $usuario = $filaDatos['usuario'];
    $password = $filaDatos['password'];
    $servidor = $filaDatos['servidor'];
}
$validatabla = explode(",", $tabla);
?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <?php
//inicio validacion de tablas
if(count($validatabla)==1){
//si tiene modalidad se consulta
    if(isset($base_datos)){
    $conexion->conectarAlterno($servidor,$usuario,$password,$base_datos);
    $resultadoRe = $conexion->ejecutarConsulta("SELECT modalidad, COUNT(*) AS total FROM ".$tabla." GROUP BY modalidad ORDER BY total DESC;");
}?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-prymary">Modalidad</h1>
    </div>
    <div class="row">
        <?php

    $inicio = 1;
    foreach($resultadoRe as $filaRe){ 
        $identificador = "modalidad";
         $identificador = "modalidad".$inicio;
             
?>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-2" id="<?php echo $identificador;?>" style="cursor:pointer;">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?php echo $filaRe['modalidad']; ?>
                                <input type="text" class="oculto" id="encabezado<?php echo $inicio?>"
                                    value="<?php echo $filaRe['modalidad']; ?>">
                                </input>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $filaRe['total']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $inicio++; } ?>


        <div class="card shadow mb-4 w-100 oculto" id="datos">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" id="cabezeraDatos"></h6>
            </div>
            <div class="card-body">
                <div class="chart-area" id="contenedorChart">
                    <canvas id="chartEstadisticas"></canvas>

                </div>
            </div>
        </div>
        <p class="oculto" id="id_proyecto"><?php echo $id_proyecto; ?></p>
    </div>

    <!-- /.container-fluid -->
    <?php
}else{
//si tiene mas de una tabla
?>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 text-prymary">Tipo Inscripcion</h1>
    </div>
    <div class="row">
        <?php 
        $inicio = 1;
        foreach($validatabla as $fila){
            $identificador = "tipo";
            $identificador = "tipo".$inicio;
            if(isset($base_datos)){
                $conexion->conectarAlterno($servidor,$usuario,$password,$base_datos);
                $resultadoRe = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM ".$fila.";");
            }

            $total = 0;
            foreach($resultadoRe as $fila2){
                $total = $fila2['total'];
            }

            $tipoT = "";
            if($fila == "registros"){
                $tipoT = "Pregrados";
            }
            if($fila == "registros_pos" || $fila == "registros_post" || $fila == "registros_p"){
                $tipoT = "Posgrados";
            }

            if($fila == "registros_v"){
                $tipoT = "Virtual";
            }
            if($fila == "registros_sc"){
                $tipoT = "San Camilo";
            }
            if($fila == "registros_uvdnal"){
                $tipoT = "Nacional Y Distancia";
            }

        
    ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-2" id="<?php echo $identificador; ?>" style="cursor:pointer;">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?php echo $tipoT;?>
                                <input type="text" class="oculto" id="tabla<?php echo $inicio?>"
                                    value="<?php echo $fila; ?>">
                                </input>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $inicio++; } ?>
        <div class="card shadow mb-4 w-100 oculto" id="datos">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" id="cabezeraDatos"></h6>
            </div>
            <div class="card-body">
                <div class="chart-area" id="contenedorChart">
                    <canvas id="chartEstadisticas"></canvas>

                </div>
            </div>
        </div>
        <p class="oculto" id="id_proyecto"><?php echo $id_proyecto; ?></p>
    </div>
</div>


<?php } ?>


<?php include('includes/templates/footer.php');?>