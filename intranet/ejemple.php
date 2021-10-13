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
            <h6 class="m-0 font-weight-bold text-primary">Ejemplo</h6>
        </div>
    </div>
</div>
<?php
    include ('includes/templates/footer.php');
?>