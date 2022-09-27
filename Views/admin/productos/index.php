<!DOCTYPE html>
<html lang="es">

<?php require_once 'Views/template/header-admin.php'; ?>

<!-- Listado de usuarios registrados -->
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Productos</h1>
    </div>


    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaProducto" type="button" role="tab" aria-controls="listaProducto" aria-selected="true">Productos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#NuevoProducto" type="button" role="tab" aria-controls="NuevoProducto" aria-selected="false">Nuevo</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="listaProducto" role="tabpanel" aria-labelledby="home-tab">

            <section class="section dashboard">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblProductos">
                                <!-- modulos/usuarios.js/tablUsuario -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
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

        </div>

        <div class="tab-pane fade" id="NuevoProducto" role="tabpanel" aria-labelledby="profile-tab">
            <div class="card">
                <div class="card-body p-5">
                    <form id="frmRegistro">
                        <div class="row">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" id="imagen_actual" name="imagen_actual">
                            <div class="col-md-4">
                                <div class="form-group mb-2">
                                    <label for="nombre">Título</label>
                                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del producto">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <label for="precio">Precio</label>
                                    <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group mb-2">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="categoria">Categoría</label>
                                    <select id="categoria" class="form-control" name="categoria">
                                        <option value="">Seleccionar</option>
                                        <?php foreach ($data['categorias'] as $categoria) { ?>
                                            <option value="<?php echo $categoria['id']; ?>"> <?php echo $categoria['categoria']; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <textarea id="descripcion" class="form-control" name="descripcion" rows="3" placeholder="Descripción"></textarea>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="imagen">Imagen (Opcional)</label>
                                    <input id="imagen" class="form-control" type="file" name="imagen">
                                </div>
                            </div>

                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary" id="btnAccion">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require_once 'Views/template/footer-admin.php'; ?>

<script src="<?php echo BASE_URL . 'assets/js/modulos/productos.js'; ?>"></script>

</html>