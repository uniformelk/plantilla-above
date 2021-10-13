<?php
    //echo "panel de control <br>";
    //var_dump($_SESSION);
include ('includes/templates/header.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Activar Cliente</h6>
        </div>
        <div class="card-body ">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Documento Cliente</label>
                                <input type="number" class="form-control" id="id_cliente"
                                    placeholder="Digite Nit o Cedula">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nombre Cliente</label>
                                <input type="text" class="form-control" id="nombre_cliente"
                                    placeholder="Digite url del documento">
                            </div>
                        </div>
                        <div class="col-6 offset-3 d-flex justify-content-center my-4">
                            <button class="btn btn-success btn-icon-split" id="crearCliente">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Crear Cliente</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include ('includes/templates/footer.php');
?>