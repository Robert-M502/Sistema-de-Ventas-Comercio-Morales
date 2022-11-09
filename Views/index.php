<?php require_once 'Views/template/header-principal.php'; ?>

<!-- Slider principales -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/img/slider/1.jpg" alt="" width="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-util"><b>Auriculares</b> </h1>
                            <h3 class="h2">Inalambricos</h3>
                            <p>
                                Audifonos inalámbricos de las mejores marcas, escucha con libertad toda tu musica con los audifonos inalámbricos que tiendas Max tiene para ti.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/img/slider/2.jpg" alt="" width="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Billeteras</h1>
                            <h3 class="h2">Para hombres</h3>
                            <p>
                                Compra billeteras de alta calidad
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/img/slider/3.jpg" alt="" width="">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Bocinas</h1>
                            <h3 class="h2">De diferentes marcas</h3>
                            <p>
                                Compra Bocinas en la Tienda en Línea del Comercio Morales, amplia variedad de productos con garantía a excelentes precios.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</div>

<!-- Seccion de categorias -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categorias</h1>
            <!-- <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, voluptatibus!
            </p> -->
        </div>
    </div>
    <div class="row">
        <!-- se almacena en una variable categoria -->
        <?php foreach ($data['categorias'] as $categoria) {  ?>
            <div class="col-12 col-md-4 p-5 mt-3">
                <!-- "md" = numero de columnas -->
                <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>"><img src="<?php echo $categoria['imagen']; ?>" class="rounded-circle img-fluid border"></a>
                <h5 class="text-center mt-3 mb-3">
                    <?php echo $categoria['categoria']; ?>
                    <!-- ['categoria'] = es el nombre de la categoria -->
                </h5>
            </div>
        <?php } ?>
    </div>
</section>



<!-- Seccion de nuevos productos productos -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Nuevos productos</h1>
                <!-- <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit, adipisci!
                </p> -->
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['nuevoProductos'] as $producto) { ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>">
                            <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                                <li class="text-muted text-right"><?php echo MONEDA . ' ' . $producto['precio']; ?></li>
                            </ul>
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h2 text-decoration-none text-dark"><?php echo $producto['nombre']; ?></a>
                            <p class="card-text">
                                <?php echo $producto['descripcion']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php require_once 'Views/template/footer-principal.php'; ?>