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
                <div class="col-xxl-3 col-md-3">
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

                <div class="col-xxl-3 col-md-3">
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


                <div class="col-xxl-3 col-md-3">
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

                <div class="col-xxl-3 col-md-3">
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

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Peidos</h5>
                            <div id="donutChart"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#donutChart"), {
                                        series: [<?php echo $data['pendientes']['total']; ?>, <?php echo $data['procesos']['total']; ?>, <?php echo $data['finalizados']['total']; ?>],
                                        chart: {
                                            height: 350,
                                            type: "donut",
                                            toolbar: {
                                                show: true,
                                            },
                                        },
                                        labels: ["Pendientes", "En procesos", "Finalizados"],
                                    }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Stock mínimo de productos</h5>
                            <div id="pieChart"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#pieChart"), {
                                        series: [44, 55, 13, 43, 22],
                                        chart: {
                                            height: 350,
                                            type: "pie",
                                            toolbar: {
                                                show: true,
                                            },
                                        },
                                        labels: ["Team A", "Team B", "Team C", "Team D", "Team E"],
                                    }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>



                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Productos más vendidos</h5>
                            <div id="barChart"></div>
                            <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new ApexCharts(document.querySelector("#barChart"), {
                                        series: [{
                                            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380],
                                        }, ],
                                        chart: {
                                            type: "bar",
                                            height: 350,
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 4,
                                                horizontal: true,
                                            },
                                        },
                                        dataLabels: {
                                            enabled: false,
                                        },
                                        xaxis: {
                                            categories: [
                                                "South Korea",
                                                "Canada",
                                                "United Kingdom",
                                                "Netherlands",
                                                "Italy",
                                                "France",
                                                "Japan",
                                                "United States",
                                                "China",
                                                "Germany",
                                            ],
                                        },
                                    }).render();
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</main>

<?php require_once 'Views/template/footer-admin.php'; ?>

</html>