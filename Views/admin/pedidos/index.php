<!DOCTYPE html>
<html lang="es">

<?php require_once 'Views/template/header-admin.php'; ?>

<!-- Listado de pedidos registrados -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pedidos</h1>
    </div>

    <section class="section dashboard">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pedidos-tab" data-bs-toggle="tab" data-bs-target="#listaPedidos" type="button" role="tab" aria-controls="listaPedidos" aria-selected="true">Pedidos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="proceso-tab" data-bs-toggle="tab" data-bs-target="#listaProceso" type="button" role="tab" aria-controls="listaProceso" aria-selected="false">Proceso</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="finalizados-tab" data-bs-toggle="tab" data-bs-target="#pedidosFinalizados" type="button" role="tab" aria-controls="pedidosFinalizados" aria-selected="false">Finalizados</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="pedidos-tab">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblPendientes">
                                <!-- modulos/pedidos.js/tblPendientes -->
                                <thead>
                                    <tr>
                                        <th>Id transacción</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Dirección</th>
                                        <th>Ciudad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DataTable -> modulos/pedidos.js -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="listaProceso" role="tabpanel" aria-labelledby="proceso-tab">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblProceso">
                                <!-- modulos/pedidos.js/tblProceso -->
                                <thead>
                                    <tr>
                                        <th>Id transacción</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Dirección</th>
                                        <th>Ciudad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DataTable -> modulos/pedidos.js -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pedidosFinalizados" role="tabpanel" aria-labelledby="finalizados-tab">
                <div class="card">
                    <div class="card-body pt-4">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblFinalizados">
                                <!-- modulos/pedidos.js/tblFinalizados -->
                                <thead>
                                    <tr>
                                        <th>Id transacción</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Dirección</th>
                                        <th>Ciudad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- DataTable -> modulos/pedidos.js -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal para ver los pedidos -->
<div id="modalPedidos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Productos</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="tablePedidos" style="width: 100%;">
                        <!-- clientes.js/tablePedidos -->
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Nombre</th>
                                <th>Monto</th>
                                <th>Cantidad</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- clientes.js/DataTable -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'Views/template/footer-admin.php'; ?>

<script src=" <?php echo BASE_URL . 'assets/js/modulos/pedidos.js'; ?>">
</script>

</html>