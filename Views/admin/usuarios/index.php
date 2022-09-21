<!DOCTYPE html>
<html lang="es">

<?php require_once 'Views/template/header-admin.php'; ?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Usuarios</h1>
    </div>

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
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'Views/template/footer-admin.php'; ?>
<!-- Problem -->

<script type="text/javascript" src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>
<script src="<?php echo BASE_URL; ?>assets/js/es-ES.js"></script>

<script src="<?php echo BASE_URL . 'assets/js/modulos/usuarios.js'; ?>"></script>

</html>