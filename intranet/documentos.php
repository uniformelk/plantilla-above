<?php include('includes/templates/header.php');
$resultadoDC = $conexion->ejecutarConsulta("SELECT documentacion.descripcion, tipo, documentacion.id_cliente, documentacion.id_proyecto, documentacion.usuario_creacion, documentacion.fecha_creacion,  version, nombre_proyecto, url FROM documentacion INNER JOIN proyectos ON documentacion.id_proyecto = proyectos.id_proyecto ");
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Informes y documentacion adicional</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Proyecto</th>
                            <th>Descripcion</th>
                            <th>Tipo</th>
                            <th>Fecha</th>
                            <th>Version</th>
                            <th>Visualizacion</th>
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
                        <?php foreach($resultadoDC as $filaDC){?>
                        <tr>
                            <td><?php echo $filaDC['nombre_proyecto']; ?></td>
                            <td><?php echo $filaDC['descripcion']; ?></td>
                            <td><?php echo $filaDC['tipo']; ?></td>
                            <td><?php echo $filaDC['fecha_creacion']; ?></td>
                            <td><?php echo $filaDC['version']; ?></td>
                            <td class="text-center"><a href="<?php echo $filaDC['url']; ?>" target="_blank"><button
                                        class="btn btn-outline-primary"><i class="far fa-eye"></i></button></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include('includes/templates/footer.php');?>