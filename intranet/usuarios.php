<?php
    //echo "panel de control <br>";
    //var_dump($_SESSION);
include ('includes/templates/header.php');
$resultadoU = $conexion->ejecutarConsulta("SELECT * FROM usuarios");
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
                            <th>Nombres</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Rol</th>
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
                        <?php foreach($resultadoU as $filaU){?>
                        <tr>
                            <td><?php echo $filaU['id_usuario']; ?></td>
                            <td><?php echo $filaU['nombres']." ".$filaU['apellidos']; ?></td>
                            <td><?php echo $filaU['usuario']; ?></td>
                            <td><?php if($filaU['estado'] == 1){echo "Activo";}else{echo "Inactivo";} ?></td>
                            <td><?php if($filaU['rol']==1){echo "Administrador";}else{echo "usuario";} ?></td>
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