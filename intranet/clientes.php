<?php
    //echo "panel de control <br>";
    //var_dump($_SESSION);
include ('includes/templates/header.php');
$resultadoC = $conexion->ejecutarConsulta("SELECT * FROM clientes");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Cantidad proyectos</th>
                            <th>Proyectos ejecutados</th>
                        </tr>
                    </thead>
                    <!--<tfoot>
          <tr>
          <th>Descripcion</th>
            <th>Fecha</th>
            <th>Proyecto</th>
            <th>Version</th>
            <th>Visualizacion</th>
          </tr>
        </tfoot>-->
                    <tbody>
                        <?php foreach($resultadoC as $filaC){
                            $resultadoP = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM proyectos WHERE id_cliente = ".$filaC['id_cliente'].";");
                            $resultadoPC = $conexion->ejecutarConsulta("SELECT COUNT(*) AS total FROM proyectos WHERE id_cliente = ".$filaC['id_cliente']." AND estado = 0;");
                            $totalC = 0;
                            $totalPC = 0;
                            $totalPE = 0;
                            foreach($resultadoP as $filaP){
                                $totalC = $filaP['total']; 
                            }
                            foreach($resultadoPC as $filaPC){
                                $totalPC = $filaPC['total'];
                            }
                            $totalPE = $totalC - $totalPC;    
                        ?>
                        <tr>
                            <td><?php echo $filaC['id_cliente']; ?></td>
                            <td><?php echo $filaC['nombre_cliente']?></td>
                            <td><?php echo $filaC['usuario_creacion']; ?></td>
                            <td><?php if($filaC['estado'] == 1){echo "Activo";}else{echo "Inactivo";} ?></td>
                            <td><?php echo $totalC; ?></td>
                            <td><?php echo $totalPE; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
    include ('includes/templates/footer.php');
?>