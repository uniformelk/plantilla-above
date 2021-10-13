<?php
    //echo "panel de control <br>";
    //var_dump($_SESSION);
include ('includes/templates/header.php');
$resultadoP = $conexion->ejecutarConsulta("SELECT * FROM proyectos")
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h4 class="m-0 font-weight-bold text-primary">Crear Documento</h4>
        </div>
        <div class="card-body ">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Proyecto</label>
                                <select class="custom-select" id="proyectoDoc">
                                    <option selected value="default">Seleccione un proyecto</option>
                                    <?php foreach($resultadoP as $filaP){ ?>
                                    <option value="<?php echo $filaP['id_proyecto']; ?>">
                                        <?php echo $filaP['nombre_proyecto']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Descripcion Documento</label>
                                <input type="text" class="form-control" id="descripcionDoc"
                                    placeholder="Digite descripcion del documento">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Tipo Documento</label>
                                <select class="custom-select" id="tipoDoc">
                                    <option selected value="0">Seleccione un Tipo</option>
                                    <option value="Cotizacion">Cotizacion</option>
                                    <option value="Cuenta de cobro">Cuenta de cobro</option>
                                    <option value="Informe">Informe</option>
                                    <option value="Entregable">Entregable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Url Documento</label>
                                <input type="text" class="form-control" id="urlDoc"
                                    placeholder="Digite url del documento">
                            </div>
                        </div>
                        <div class="col-6 offset-3 d-flex justify-content-center my-4">
                            <button class="btn btn-success btn-icon-split" id="crearDocumento">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Crear Documento</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <p class="font-weight-bold text-center">Recuerde subir primero el documento en el gestor documental. En la
                direcion web <a href="https://documentos.devsgo.co/" target="_blank">documentos.devsgo.co</a></p>
        </div>
    </div>
</div>
<?php
    include ('includes/templates/footer.php');
?>