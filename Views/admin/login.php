<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo $data['title']; ?></title>
    <meta name="robots" content="noindex, nofollow">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="<?php echo BASE_URL; ?>assets/img/favicon.png" rel="icon">
    <link href="<?php echo BASE_URL; ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/bootstrap-icons.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/boxicons.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/quill.snow.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/quill.bubble.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/remixicon.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/simple-datatables.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
    <main>
        <div class="container">
            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4"> <a href="index.html" class="logo d-flex align-items-center w-auto"> <img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt=""> <span class="d-none d-lg-block">Comercio Morales</span> </a></div>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Acceso</h5>
                                        <p class="text-center small">Ingrese el nombre de usuario y la contraseña de acceso al sistema</p>
                                    </div>
                                    <form class="row g-3 needs-validation" id="formulario" novalidate>
                                        <div class="col-12">
                                            <label for="email" class="form-label">Usuario</label>
                                            <div class="input-group has-validation">
                                                <input type="email" name="email" class="form-control" id="email" value="admin@gmail.com" required>
                                                <div class="invalid-feedback">Por favor, introduzca el correo electrónico.</div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="clave" class="form-label">Contraseña</label>
                                            <input type="password" name="clave" class="form-control" id="clave" value="admin" required>
                                            <div class="invalid-feedback">¡Por favor, introduzca la contraseña!</div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check"> <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe"> <label class="form-check-label" for="rememberMe">Recordar</label></div>
                                        </div>
                                        <div class="col-12"> <button class="btn btn-primary w-100" type="submit">Ingresar</button></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <script src="<?php echo BASE_URL; ?>assets/js/apexcharts.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/chart.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/echarts.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/quill.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/simple-datatables.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/tinymce.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/validate.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
    <script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/modulos/login.js"></script>
</body>

</html>