<!DOCTYPE html>
<html lang="es">

<?php require_once 'Views/template/header-admin.php'; ?>



<!-- Listado de usuarios registrados -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Categorias</h1>
    </div>

    <button type="button" class="btn btn-primary mb-2" id="nuevo_registro">Nuevo</button>

    <section class="section dashboard">
        <div class="card pt-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblCategorias">
                        <!-- modulos/usuarios.js/tablUsuario -->
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
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
                <h4 class="modal-title" id="titleModal"></h4>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="frmRegistro">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="imagen_actual" name="imagen_actual">
                    <div class="form-group mb-2">
                        <label for="categoria">Nombre</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" placeholder="Categorias">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen (Opcional)</label>
                        <input id="imagen" class="form-control-file" type="file" name="imagen">
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

<script src="<?php echo BASE_URL . 'assets/js/modulos/categorias.js'; ?>"></script>

</html>