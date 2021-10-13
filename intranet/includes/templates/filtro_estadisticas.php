<?php 
$id_proyecto = $proyecto['id_proyecto'];
$id_cliente = $proyecto['id_cliente'];
$resultadoDatos = $conexion->ejecutarConsulta("SELECT * FROM estadisticas WHERE (estadisticas.id_cliente = ".$id_cliente." AND estadisticas.id_proyecto = ".$id_proyecto.");");

foreach($resultadoDatos as $filaDatos){
    $base_datos = $filaDatos['base_datos'];
    $tabla = $filaDatos['tabla'];
    $usuario = $filaDatos['usuario'];
    $password = $filaDatos['password'];
    $servidor = $filaDatos['servidor'];
}
$validatabla = explode(",", $tabla);
$conexionAlterna->conectarAlterno($servidor,$usuario,$password,$base_datos);

foreach($validatabla as $tabla){
    $resultadoDatos = $conexionAlterna->ejecutarConsulta("SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(fecha_registro, ' ', 1), ' ', -1) AS Fecha FROM ".$tabla." GROUP BY SUBSTRING_INDEX(SUBSTRING_INDEX(`fecha_registro`, ' ', 1), ' ', -1) ORDER BY Fecha DESC LIMIT 1;");
    $fechaI = "";
    $fechaF = "";
    foreach($resultadoDatos as $filaDatos){
        $fechaI = $filaDatos['Fecha'];
    }
    $resultadoDatos = $conexionAlterna->ejecutarConsulta("SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(fecha_registro, ' ', 1), ' ', -1) AS Fecha FROM ".$tabla." GROUP BY SUBSTRING_INDEX(SUBSTRING_INDEX(`fecha_registro`, ' ', 1), ' ', -1) ORDER BY Fecha ASC LIMIT 1;");
    foreach($resultadoDatos as $filaDatos){
        $fechaF = $filaDatos['Fecha'];
    }
}


?>
<div class="row">
    <div class="col-12 ">
        <label for="start">Desde:</label>
        <input type="date" id="start" name="trip-start" min="<?php echo $fechaF ?>" max="<?php echo $fechaI ?>">
        <label for="start">Hasta:</label>
        <input type="date" id="end" name="trip-start" min="<?php echo $fechaF ?>" max="<?php echo $fechaI ?>" disabled>
    </div>

    <div class="col-12 mt-4 text-center oculto" id="resultadoTotalEstadisticas">
        <h5 class="text-primary font-weight-bold">Total</h5>
        <div class="row border p-3">
            <?php 
            $contador = 1;
            foreach($validatabla as $filaTabla){ ?>
                <div class="col-xl-4 col-md-6 mb-2" style="cursor:pointer;">
                    <div class="card border-left-primary shadow h-100">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        <?php if($filaTabla == "registros"){
                                            echo "PREGRADOS";
                                        }elseif($filaTabla == "registros_pos" || $filaTabla == "registros_post"){
                                            echo "POSGRADOS";
                                        }elseif($filaTabla == "registros_v" || $filaTabla == "registros_uvdnal"){
                                            echo "VIRTUAL";
                                        }elseif($filaTabla == "registros_sc"){
                                            echo "SAN CAMILO";
                                        } ?>
                                    </div>
                                    <?php if($filaTabla == "registros" ){ ?>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="registros<?php echo $contador; ?>"></div>
                                        <?php }elseif($filaTabla == "registros_pos" || $filaTabla == "registros_post"){ ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="registros<?php echo $contador; ?>"></div>
                                        <?php }elseif($filaTabla == "registros_v" || $filaTabla == "registros_uvdnal"){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="registros<?php echo $contador; ?>"></div>
                                        <?php }elseif($filaTabla == "registros_sc"){?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="registros<?php echo $contador; ?>"></div>
                                        <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $contador++;} ?>
        </div>  
    </div>
</div>

