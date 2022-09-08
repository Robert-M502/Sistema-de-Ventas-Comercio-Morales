<!-- Modal para la lista del carrito -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id=""> <i class="fas fa-cart-arrow-down"></i> Carrito</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <!-- Table-responsive es una clase de boostrap -->
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle" id="tableListaCarrito">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>SubTotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- carrito.js -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <h3 id="totalGeneral"></h3>
                <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'clientes' ?>">Procesar pedido</a>
            </div>
        </div>
    </div>
</div>

<!-- Login directo -->
<div id="modalLogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="titleLogin">Iniciar sesión</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body m-3">
                <form method="get" action="">
                    <div class="text-center">
                        <img class="img-thumbnail rounded-circle" src="<?php echo BASE_URL . 'assets/img/logo.png'; ?>" alt="" width="150">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="frmLogin">
                            <div class="form-group mb-3">
                                <label for="correoLogin"><i class="fas fa-envelope"></i>Correo</label>
                                <input id="correoLogin" class="form-control" type="text" name="correoLogin" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveLogin"><i class="fas fa-key"></i>Contraseña</label>
                                <input id="claveLogin" class="form-control" type="text" name="claveLogin" placeholder="Contraseña">
                            </div>
                        </div>
                        <!-- Formulario de registro -->
                        <div class="col-md-12 d-none">
                            <div class="form-group mb-3">
                                <label for="nombreRegistro"><i class="fas fa-list"></i>Nombre</label>
                                <input id="nombreRegistro" class="form-control" type="text" name="nombreRegistro" placeholder="Correo electrónico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="correoRegistro"><i class="fas fa-key"></i>Contraseña</label>
                                <input id="correoRegistro" class="form-control" type="text" name="correoRegistro" placeholder="Contraseña">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveRegistro"><i class="fas fa-key"></i>Contraseña</label>
                                <input id="claveRegistro" class="form-control" type="text" name="claveRegistro" placeholder="Contraseña">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button">Login</button>
                <button class="btn btn-danger" type="button">Registrarse</button>
            </div>
        </div>
    </div>
</div>


<!-- Inicio del Footer -->
<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-util border-bottom pb-3 border-light logo">Ubicanos</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        Sector 6, Cantón Chugüexá Segundo "A", Chichicastenango, Quiché
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">+502 5555 5555 </a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="info@company.com">info@company.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Productos</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Producto-1</a></li>
                    <li><a class="text-decoration-none" href="#">Producto-2</a></li>
                    <li><a class="text-decoration-none" href="#">Producto-3</a></li>
                    <li><a class="text-decoration-none" href="#">Producto-4</a></li>
                    <li><a class="text-decoration-none" href="#">Producto-5</a></li>
                    <li><a class="text-decoration-none" href="#">Producto-6</a></li>
                    <li><a class="text-decoration-none" href="#">Producto-7</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Más información</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Home</a></li>
                    <li><a class="text-decoration-none" href="#">Sobre nosotros</a></li>
                    <li><a class="text-decoration-none" href="#">Nuestra ubicación</a></li>
                    <li><a class="text-decoration-none" href="#">FAQs</a></li>
                    <li><a class="text-decoration-none" href="#">Contacto</a></li>
                </ul>
            </div>

        </div>

        <div class="row text-light mb-4">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto">
                <label class="sr-only" for="subscribeEmail">Correo electrónico</label>
                <div class="input-group mb-2">
                    <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Correo electrónico">
                    <div class="input-group-text btn-util text-light">Subscribe</div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 bg-black py-3">
        <div class="container">
            <div class="row pt-2">
                <div class="col-12">
                    <p class="text-left text-light">
                        Copyright &copy; 2022 Roberto Morales
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- Final del Footer -->

<!-- Script -->
<script src="<?php echo BASE_URL; ?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/templatemo.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/all.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>
<script>
    const base_url = '<?php echo BASE_URL; ?>'; //Constante para la funcion getListaDeseo en listaDeseo
</script>
<script src="<?php echo BASE_URL; ?>assets/js/carrito.js"></script>