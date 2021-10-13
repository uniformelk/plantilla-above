<?php
    //echo "panel de control <br>";
    //var_dump($_SESSION);
include ('includes/templates/header.php');
$resultadoV = $conexion->ejecutarConsulta("SELECT valor_contrato, progreso FROM proyectos WHERE estado = 1 || estado = 2");
  $resultadoCP = $conexion->ejecutarConsulta("SELECT COUNT(*) AS totalP FROM proyectos");
  $resultadoCPE = $conexion->ejecutarConsulta("SELECT COUNT(*) AS totalPE FROM proyectos WHERE estado = 1 || estado = 2 ");
  $resultadoPT = $conexion->ejecutarConsulta("SELECT COUNT(*) AS totalPT FROM proyectos WHERE estado = 2 ");
  $resultadoP = $conexion->ejecutarConsulta("SELECT * FROM proyectos");
  $totalP = 0;
  $totalPE = 0;
  $totalPT = 0;
  $totalF = 0;
  $totalC = 0;
  $progreso = 0;
  foreach($resultadoCP as $filaCP){
    $totalP = $filaCP['totalP'];
  }
  foreach($resultadoCPE as $filaCPE){
    $totalPE = $filaCPE['totalPE'];
  }
  foreach($resultadoPT as $filaPT){
    $totalPT = $filaPT['totalPT'];
  }
  foreach($resultadoV as $filaV){
    $totalF += $filaV['valor_contrato'];
    $progreso += $filaV['progreso']; 
  }
  foreach($resultadoP as $filaP){
    $totalC += $filaP['valor_contrato'];
  }
  $progreso = $progreso/$totalPE;
  date_default_timezone_set('America/Lima');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Proyectos Solicitados
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalP; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Proyectos Ejecutados
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalPE; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proyectos Terminados
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalPT; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pocentaje cumplimiento
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php echo round($progreso, 2); ?>%
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: <?php echo round($progreso, 2); ?>%" aria-valuenow="50"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Cotizado</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo $totalC; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Facturado</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo $totalF; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Perdido</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo ($totalC - $totalF); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Estado Proyectos
                </div>
                <div class="card-body"><canvas id="proyectosChart" width="100%" height="300px"></canvas></div>
                <div class="card-footer small text-muted">Ultima Actualizacion <?php echo date("Y-m-d"); ?></div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class=" col-lg-8">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-chart-line mr-1"></i> Ganancias año
                        <?php echo date('Y'); ?></h6>
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
                    <div class="chart-area">
                        <canvas id="chartganancias"></canvas>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php //var_dump($_SESSION); ?>

</div>
<!-- /.container-fluid -->
<?php
    include ('includes/templates/footer.php');
?>