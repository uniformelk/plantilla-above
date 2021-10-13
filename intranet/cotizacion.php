<?php
    //echo "panel de control <br>";
    //var_dump($_SESSION);
include ('includes/templates/header.php');
$resultadoCli = $conexion->ejecutarConsulta("SELECT id_cliente, nombre_cliente FROM clientes");
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 text-center">
            <h4 class="m-0 font-weight-bold text-primary">Cotizacion Proyecto</h4>
        </div>
        <div class="card-body ">
            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Cliente</label>
                                <select class="custom-select" id="cliente">
                                    <option selected value="0">Seleccione un cliente</option>
                                    <?php foreach($resultadoCli as $filaCli){ ?>
                                    <option value="<?php echo $filaCli['id_cliente']; ?>">
                                        <?php echo $filaCli['nombre_cliente']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nombre Proyecto</label>
                                <input type="text" class="form-control" id="proyecto"
                                    placeholder="Digite un nombre de proyecto">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Descripcion Proyecto</label>
                                <input type="text" class="form-control" id="descripcion"
                                    placeholder="Digite la descripcion de este proyecto">
                            </div>
                        </div>
                        <div class="col-12 ">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Alcance</label>
                                <textarea class="form-control" id="alcance"
                                    placeholder="Digite el alcance de este nuevo proyecto a ejecutar" rows="5"
                                    style="resize:none!important;"></textarea>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <h5 class="m-0 font-weight-bold text-primary pb-3">Descripcion Servicos</h5>
                            <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="bg-primary text-light">Numero Item</th>
                                        <th class="bg-primary text-light">Descripcion</th>
                                        <th class="bg-primary text-light">Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" id="numero1" value="1" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="descripcionServicio1"
                                                placeholder="Descripcion Servicio">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="valor1"
                                                placeholder="Valor Servicio" value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" id="numero2" value="2" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="descripcionServicio2"
                                                placeholder="Descripcion Servicio">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="valor2"
                                                placeholder="Valor Servicio" value="0">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" id="numero3" value="3" readonly>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="descripcionServicio3"
                                                placeholder="Descripcion Servicio">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="valor3"
                                                placeholder="Valor Servicio" value="0">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label font-weight-bold">Valor
                                    Total</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="valorT" placeholder="Valor total" value="0"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 offset-3 d-flex justify-content-center my-4">
                            <button class="btn btn-success btn-icon-split" id="crearProyecto">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Crear Proyecto</span>
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