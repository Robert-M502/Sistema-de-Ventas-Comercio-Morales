<?php require_once 'Views/template/header-principal.php'; ?>

<section class="bg-util py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-dark">
                <h1>Sobre nosotros</h1>
                <p>
                    Somos una empresa comercial dedicada a la producción y comercialización de productos de buena calidad con el fin de satisfacer las necesidades de la comunidad de ventas.
                </p>
            </div>
            <div class="col-md-4">
                <img src="<?php echo BASE_URL; ?>assets/img/servicios.png" alt="About Hero" width="200">
            </div>
        </div>
    </div>
</section>

<!-- Seccion de servicios -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Nuestros servicios</h1>
            <p>

            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-util text-center"><i class="fa fa-truck fa-lg"></i></div>
                <h2 class="h5 mt-4 text-center">Servicios de entrega</h2>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-util text-center"><i class="fa fa-exchange-alt"></i></div>
                <h2 class="h5 mt-4 text-center">Devoluciones</h2>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-util text-center"><i class="fa fa-percent"></i></div>
                <h2 class="h5 mt-4 text-center">Promoción</h2>
            </div>
        </div>

        <div class="col-md-6 col-lg-3 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-util text-center"><i class="fa fa-user"></i></div>
                <h2 class="h5 mt-4 text-center">Servicio 24 horas</h2>
            </div>
        </div>
    </div>
</section>

<?php require_once 'Views/template/footer-principal.php'; ?>