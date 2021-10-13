<?php
    //echo "panel de control <br>";
    //var_dump($_SESSION);
include ('includes/templates/header.php');
$resultadoP = $conexion->ejecutarConsulta("SELECT id_proyecto, nombre_proyecto, proyectos.fecha_creacion, valor_contrato, progreso, proyectos.estado, nombre_cliente FROM proyectos INNER JOIN clientes ON  proyectos.id_cliente = clientes.id_cliente");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Proyectos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Proyecto</th>
                            <th>Fecha</th>
                            <th>Valor</th>
                            <th>Progreso</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($resultadoP as $filaP){?>
                        <tr>
                            <td><?php echo $filaP['nombre_cliente']; ?></td>
                            <td><a id="enlace"
                                    href="detalle_proyecto?id=<?php echo $filaP['id_proyecto'];?>"><?php echo $filaP['nombre_proyecto']; ?></a>
                            </td>
                            <td><?php echo $filaP['fecha_creacion']; ?></td>
                            <td><?php echo $filaP['valor_contrato']; ?></td>
                            <td><?php echo $filaP['progreso']; ?></td>
                            <td><?php if($filaP['estado'] == 0){echo "Cotizados";}
                                    if($filaP['estado'] == 1){echo "En ejecucion";}
                                    if($filaP['estado'] == 2){echo "Terminado";}
                            ?></td>
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