<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?php echo TITLE . ' - ' . $data['title']; ?></title>
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

    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL . 'assets/DataTables/datatables.min.css'; ?>">

</head>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between"> <a href="index.html" class="logo d-flex align-items-center"> <img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt=""> <span class="d-none d-lg-block">Admin</span> </a> <i class="bi bi-list toggle-sidebar-btn"></i></div>
        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item d-block d-lg-none"> <a class="nav-link nav-icon search-bar-toggle " href="#"> <i class="bi bi-search"></i> </a></li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown"> <img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt="Profile" class="rounded-circle"> <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['nombre_usuario']; ?></span> </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6><?php echo $_SESSION['nombre_usuario']; ?></h6>
                            <span><?php echo $_SESSION['email']; ?></span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li> <a class="dropdown-item d-flex align-items-center" href="users-profile.html"> <i class="bi bi-person"></i> <span>Perfil</span> </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li> <a class="dropdown-item d-flex align-items-center" href="<?php echo BASE_URL . 'admin/salir'; ?>"> <i class="bi bi-box-arrow-right"></i> <span>Cerrar sesión</span> </a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Nav vartical -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item"> <a class="nav-link " href="<?php echo BASE_URL  . 'admin/home'; ?>"> <i class="bi bi-grid"></i> <span>Dashboard</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="<?php echo BASE_URL  . 'usuarios'; ?>"> <i class="bi bi-person"></i> <span>Usuarios</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="<?php echo BASE_URL  . 'categorias'; ?>"> <i class="bi bi-tags"></i> <span>Categorias</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="<?php echo BASE_URL  . 'productos'; ?>"> <i class="bi bi-list"></i> <span>Producto</span> </a></li>
            <li class="nav-item"> <a class="nav-link collapsed" href="<?php echo BASE_URL  . 'pedidos'; ?>"> <i class="bi bi-bell"></i> <span>Pedidos</span> </a></li>
        </ul>
    </aside>