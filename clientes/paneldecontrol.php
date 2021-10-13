<?php include('includes/templates/header.php');
  $resultadoV = $conexion->ejecutarConsulta("SELECT valor_contrato, progreso FROM proyectos WHERE id_cliente = ".$_SESSION['usuario']." AND (estado = 1 || estado = 2)");
  $resultadoCP = $conexion->ejecutarConsulta("SELECT COUNT(*) AS totalP FROM proyectos WHERE id_cliente = ".$_SESSION['usuario']."");
  $resultadoCPE = $conexion->ejecutarConsulta("SELECT COUNT(*) AS totalPE FROM proyectos WHERE id_cliente = ".$_SESSION['usuario']." AND (estado = 1 || estado = 2) ");
  $resultadoPT = $conexion->ejecutarConsulta("SELECT COUNT(*) AS totalPT FROM proyectos WHERE estado = 2 AND id_cliente = ".$_SESSION['usuario']."");
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Proyectos Solicitados</div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Proyectos Ejecutados</div>
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
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Proyectos Terminados</div>
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
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pocentaje cumplimiento</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $progreso; ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $progreso; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Facturado</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$ <?php echo $totalF; ?></div>
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
          </div>

    </div>
    <!-- /.container-fluid -->
<?php include('includes/templates/footer.php');?>
