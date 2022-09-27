<!DOCTYPE html>
<html lang="es">

<?php require_once 'Views/template/header-admin.php'; ?>

<!-- Listado de pedidos registrados -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Productos</h1>
    </div>


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaPedidos" type="button" role="tab" aria-controls="listaPedidos" aria-selected="true">Pedidos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pedidosFinalizados" type="button" role="tab" aria-controls="pedidosFinalizados" aria-selected="false">Finalizados</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="home-tab">

            <section class="section dashboard">
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
            </section>

        </div>

        <div class="tab-pane fade" id="pedidosFinalizados" role="tabpanel" aria-labelledby="profile-tab">
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

</main>

<?php require_once 'Views/template/footer-admin.php'; ?>

<script src="<?php echo BASE_URL . 'assets/js/modulos/pedidos.js'; ?>"></script>

</html>