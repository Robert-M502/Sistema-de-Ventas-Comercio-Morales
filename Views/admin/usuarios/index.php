<!DOCTYPE html>
<html lang="es">

<?php require_once 'Views/template/header-admin.php'; ?>



<!-- Listado de usuarios registrados -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Usuarios</h1>
    </div>

    <button type="button" class="btn btn-primary mb-2" id="nuevo_registro">Nuevo</button>

    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100%;" id="tablUsuarios">
                        <!-- modulos/usuarios.js/tablUsuario -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Foto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTable -> modulos/usuarios.js -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Modal de registro -->
<div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="titleModal"></h5>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="frmRegistro">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group mb-2">
                        <label for="nombre">Nombres</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombres">
                    </div>
                    <div class="form-group mb-2">
                        <label for="apellido">Apellidos</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apellidos">
                    </div>
                    <div class="form-group mb-2">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" class="form-control" placeholder="Correo electrónico">
                    </div>
                    <div class="form-group mb-2">
                        <label for="clave">Contraseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btnAccion">Registrar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php require_once 'Views/template/footer-admin.php'; ?>

<script src="<?php echo BASE_URL . 'assets/js/modulos/usuarios.js'; ?>"></script>

</html>