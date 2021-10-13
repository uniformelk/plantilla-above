<?php
include ('includes/templates/header.php');
$resultadoP = $conexion->ejecutarConsulta("SELECT * FROM proyectos WHERE id_proyecto = ".$_GET['id']."");
$resultadoEs = $conexion->ejecutarConsulta("SELECT * FROM estadisticas WHERE id_proyecto = ".$_GET['id'].";");
$proyecto = array();
foreach($resultadoP as $filaP){
    $proyecto = $filaP;
}
$resultadoC = $conexion->ejecutarConsulta("SELECT documentacion.descripcion, tipo, documentacion.fecha_creacion, version, nombre_cliente, nombre_proyecto, url FROM documentacion INNER JOIN clientes ON documentacion.id_cliente = clientes.id_cliente INNER JOIN proyectos ON documentacion.id_proyecto = proyectos.id_proyecto WHERE (documentacion.id_proyecto = ".$_GET['id'].") AND (tipo = 'Cotizacion' OR tipo = 'Cuenta de cobro')");
$resultadoDoc = $conexion->ejecutarConsulta("SELECT documentacion.descripcion, tipo, documentacion.fecha_creacion, version, nombre_cliente, nombre_proyecto, url FROM documentacion INNER JOIN clientes ON documentacion.id_cliente = clientes.id_cliente INNER JOIN proyectos ON documentacion.id_proyecto = proyectos.id_proyecto WHERE (documentacion.id_proyecto = ".$_GET['id'].") AND (tipo = 'Informe' OR tipo ='Manuales')");
$resultadoEnt = $conexion->ejecutarConsulta("SELECT documentacion.descripcion, tipo, documentacion.fecha_creacion, version, nombre_cliente, nombre_proyecto, url FROM documentacion INNER JOIN clientes ON documentacion.id_cliente = clientes.id_cliente INNER JOIN proyectos ON documentacion.id_proyecto = proyectos.id_proyecto WHERE (documentacion.id_proyecto = ".$_GET['id'].") AND (tipo = 'Entregable')");
$resultadoTareas = $conexion->ejecutarConsulta("SELECT * FROM tareas WHERE id_proyecto = ".$proyecto['id_proyecto']."; ");
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h5 class="m-0 font-weight-bold text-primary"><?php echo $proyecto['nombre_proyecto']; ?></h5>
                </div>
                <div class="col-12 col-md-6 d-flex justify-content-end">
                    <?php if($proyecto['estado']==0){?>
                    <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#ModalTareas">
                        <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                        </span>
                        <span class="text">Iniciar Proyecto</span>
                    </button>
                    <?php }elseif($proyecto['estado']==1){ ?>
                    <button class="btn btn-success btn-icon-split" id="terminarProyecto"
                        value="<?php $proyecto['id_proyecto']; ?>">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Terminar Proyecto</span>
                    </button>
                    <?php } else{ ?>
                    <button class="btn btn-success btn-circle">
                        <i class="fas fa-check"></i>
                    </button>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Informacion del proyecto</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <h4 class="small font-weight-bold">Progreso <span
                            class="float-right"><?php echo $proyecto['progreso'];?>%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar"
                            style="width: <?php echo $proyecto['progreso']; ?>%"
                            aria-valuenow="<?php echo $proyecto['progreso']; ?>" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    <div class="py-3">
                        <h4 class="small font-weight-bold">Descripción</span></h4>
                        <p><?php echo $proyecto['descripcion']; ?></p>
                        <h4 class="small font-weight-bold">Alcance</span></h4>
                        <p><?php echo $proyecto['alcance']; ?></p>
                        <h4 class="small font-weight-bold">Tareas</span></h4>
                        <?php if($proyecto['estado'] != 0){ ?>
                        <ul class="list-group">
                            <?php foreach($resultadoTareas as $filaTareas){ ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?php echo $filaTareas['tarea']; ?>
                                <span><?php if($filaTareas['estado'] == 1){ ?>
                                    <button class="btn btn-success btn-circle btn-sm">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <?php }else{ ?>
                                    <a href="includes/functions/proyectos/terminartarea.php?id=<?php echo $filaTareas['id_proyecto']; ?>&tarea=<?php echo $filaTareas['tarea']; ?>"
                                        class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <?php } ?></span>
                            </li>
                            <?php } ?>

                        </ul>
                        <?php } else{ ?>
                        <div class="row">
                            <div class="col-9 offset-1 text-center border py-5">
                                <p class="m-0 font-weight-bold">Aun no hay tareas disponibles para este proyecto ya que
                                    no se a iniciado su ejecucion.</p>
                            </div>

                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Contables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Descripcion</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Version</th>
                                <th>Visualizacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($resultadoC as $filaC){?>
                            <tr>
                                <td><?php echo $filaC['nombre_cliente']; ?></td>
                                <td><?php echo $filaC['nombre_proyecto']; ?></td>
                                <td><?php echo $filaC['descripcion']; ?></td>
                                <td><?php echo $filaC['tipo']; ?></td>
                                <td><?php echo $filaC['fecha_creacion']; ?></td>
                                <td><?php echo $filaC['version']; ?></td>
                                <td><a href="<?php echo $filaC['url']; ?>" target="_blank"
                                        class="btn btn-outline-primary"><i class="far fa-eye"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Documentacion</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Descripcion</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Version</th>
                                <th>Visualizacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($resultadoDoc as $filaDoc){?>
                            <tr>
                                <td><?php echo $filaDoc['nombre_cliente']; ?></td>
                                <td><?php echo $filaDoc['nombre_proyecto']; ?></td>
                                <td><?php echo $filaDoc['descripcion']; ?></td>
                                <td><?php echo $filaDoc['tipo']; ?></td>
                                <td><?php echo $filaDoc['fecha_creacion']; ?></td>
                                <td><?php echo $filaDoc['version']; ?></td>
                                <td><a href="<?php echo $filaDoc['url']; ?>" target="_blank"
                                        class="btn btn-outline-primary"><i class="far fa-eye"></i></a>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Entregables</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center" id="dataTable2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Proyecto</th>
                                <th>Descripcion</th>
                                <th>Tipo</th>
                                <th>Fecha</th>
                                <th>Version</th>
                                <th>Visualizacion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($resultadoEnt as $filaEnt){?>
                            <tr>
                                <td><?php echo $filaEnt['nombre_cliente']; ?></td>
                                <td><?php echo $filaEnt['nombre_proyecto']; ?></td>
                                <td><?php echo $filaEnt['descripcion']; ?></td>
                                <td><?php echo $filaEnt['tipo']; ?></td>
                                <td><?php echo $filaEnt['fecha_creacion']; ?></td>
                                <td><?php echo $filaEnt['version']; ?></td>
                                <td><a href="<?php echo $filaEnt['url']; ?>" target="_blank"
                                        class="btn btn-outline-primary"><i class="far fa-eye"></i></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 offset-3 d-flex justify-content-center my-4">

        <a class="btn btn-success btn-icon-split" href="crear_documento.php">
            <span class="icon text-white-50">
                <i class="fas fa-check"></i>
            </span>
            <span class="text">Crear Documento</span>
        </a>

    </div>
    <!--Vista Estadisticas-->
    <?php 
foreach($resultadoEs as $filaEs){
    if($proyecto['id_proyecto'] == $filaEs['id_proyecto']){?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Estadisticas</h6>
            </div>
            <div class="card-body">
                <?php include('includes/templates/estadisticas.php');?>
            </div>
        </div>
    </div>

    




</div>
<?php }
}?>







<!-- Modal Tareas-->
<div class="modal" id="ModalTareas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Tareas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="m-0 font-weight-bold text-primary text-center">Registrar Tareas</h6>
                <form>
                    <div class="alert alert-danger oculto" id="errorIniciarProyecto" role="alert">
                        <strong>Error</strong> debe escribir por lo menos una tarea para inicar este proyecto.
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Tarea 1</label>
                        <input type="text" class="form-control" id="tareaUno"
                            placeholder="Digite tarea a ejecutar en este proyecto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tarea 2</label>
                        <input type="text" class="form-control" id="tareaDos"
                            placeholder="Digite tarea a ejecutar en este proyecto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tarea 3</label>
                        <input type="text" class="form-control" id="tareaTres"
                            placeholder="Digite tarea a ejecutar en este proyecto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tarea 4</label>
                        <input type="text" class="form-control" id="tareaCuatro"
                            placeholder="Digite tarea a ejecutar en este proyecto">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Tarea 5</label>
                        <input type="text" class="form-control" id="tareaCinco"
                            placeholder="Digite tarea a ejecutar en este proyecto">
                    </div>
                    <div class="form-group oculto">
                        <input type="text" class="form-control" id="idProyecto"
                            value="<?php echo $proyecto['id_proyecto']; ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnIniciarProyecto">Iniciar Proyecto</button>
            </div>
        </div>
    </div>
</div>
<?php
include ('includes/templates/footer.php');
?>