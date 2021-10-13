</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; DevsGo <?php echo date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verificacion de salida?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Se encuentra seguro de cerrar sesion.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Volver</button>
                <a class="btn btn-primary" href="includes/functions/system/endsession.php">Cerrar Sesion</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Adevrtencia-->
<div class="modal" id="myModalWarning" tabindex="-1" role="dialog" aria-labelledby="Advertencia">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title" id="myModalWarning">Peligro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="myModalWarningBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Peligro-->
<div class="modal" id="myModalDanger" tabindex="-1" role="dialog" aria-labelledby="Advertencia">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title" id="myModalDanger">Advertencia</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="myModalDangerBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Exito-->
<div class="modal" id="myModalSuccess" tabindex="-1" role="dialog" aria-labelledby="Advertencia">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="myModalSuccess">Exito</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="myModalSuccessBody">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="completarCrearcion"
                    data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="assets/js/sb-admin-2.js"></script>

<!-- Page level plugins -->
<script src="assets/vendor/chart.js/Chart.min.js"></script>
<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="assets/js/demo/datatables-demo.js"></script>

<!-- Querys pagina -->
<?php 
 switch ($url){
    case "paneldecontrol":
        echo '<script src="assets/js/system.js"></script>';
        break;
    case "proyectos":
        echo '<script src="assets/js/proyectos.js"></script>';
        break;
    case "actividad":
        echo '<script src="assets/js/actividad.js"></script>';
        break;
    case "cotizacion":
        echo '<script src="assets/js/cotizacion.js"></script>';
        break;
    case "documentos":
        echo '<script src="assets/js/documentos.js"></script>';
        break;
    case "crear_documento":
        echo '<script src="assets/js/documentos.js"></script>';
    break;
    case "clientes":
        echo '<script src="assets/js/clientes.js"></script>';
        break;
    case "crear_cliente":
        echo '<script src="assets/js/clientes.js"></script>';
        break;
    case "detalle_proyecto":
        echo '<script src="assets/js/estadisticas.js"></script>';
        echo '<script src="assets/js/proyectos.js"></script>';
        break;
    
 }
 echo $url;
?>




<!-- Page level custom scripts -->
<!--<script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>-->

</body>

</html>