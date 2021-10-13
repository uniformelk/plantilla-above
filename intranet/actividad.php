<?php
    //echo "panel de control <br>";
include ('includes/templates/header.php');
$consultaL = $conexion->ejecutarConsulta("SELECT * FROM logs WHERE id_usuario = ".$_SESSION['id']." ");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <?php
            //var_dump($_SESSION);
        ?>
        <!-- Pie Chart -->
        <div class="col-md-12 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Inicios de sesion</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Fallidos
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Correctos
                        </span>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-7 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Logs</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="font-weight-bold text-dark">Fecha</th>
                                    <th class="font-weight-bold text-dark">Tipo</th>
                                    <th class="font-weight-bold text-dark">Ip Origen</th>
                                    <th class="font-weight-bold text-dark">Navegador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($consultaL as $fila){?>
                                <tr>
                                    <td><?php echo $fila['fecha_evento']; ?></td>
                                    <td><?php if($fila['tipo_evento'] == 2){ echo "Fallido";} if($fila['tipo_evento'] == 1){echo "Correcto";} ?>
                                    </td>
                                    <td><?php echo $fila['ip_origen']; ?></td>
                                    <td><?php echo $fila['navegador']; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>

<!-- /.container-fluid -->
<?php
    include ('includes/templates/footer.php');
?>