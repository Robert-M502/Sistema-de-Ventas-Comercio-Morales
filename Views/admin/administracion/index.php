<!DOCTYPE html>
<html lang="es">

<?php require_once 'Views/template/header-admin.php'; ?>


<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
    </div>
    <section class="section dashboard">
        <div class="col-12">
            <div class="row">
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos pendientes</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fas fa-exclamation"></i></div>
                                <div class="ps-3">
                                    <h6><?php echo $data['pendientes']['total']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos en procesos</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fas fa-spinner"></i></div>
                                <div class="ps-3">
                                    <h6><?php echo $data['procesos']['total']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos finalizados</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fas fa-check"></i></div>
                                <div class="ps-3">
                                    <h6><?php echo $data['finalizados']['total']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Total de productos</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fas fa-spinner"></i></div>
                                <div class="ps-3">
                                    <h6><?php echo $data['productos']['total']; ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>

<?php require_once 'Views/template/footer-admin.php'; ?>

</html>