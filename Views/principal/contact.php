<?php require_once 'Views/template/header-principal.php'; ?>

<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Contáctenos</h1>
    </div>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-9 m-auto">
                <ul class="list-unstyled ">
                    <li class="py-2">
                        <p class="fas fa-map-marker-alt fa-fw"></p>
                        <a class="text-decoration-none" href="#"> Nuestra ubiacíon: Sector 6, Cantón Chugüexá Segundo "A", Chichicastenango, Quiché</a>
                    </li>
                    <li class="py-2">
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="#">Telefono: +502 5555 5555 </a>
                    </li>
                    <li class="py-2">
                        <i class=" fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="#">Correo: info@company.com</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--  Formulario de contacto -->
<div class="container py-3">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="inputname">Nombre</label>
                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombre">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="inputemail">Correo</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="mb-3">
                <label for="inputsubject">Asunto</label>
                <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="Asunto">
            </div>
            <div class="mb-3">
                <label for="inputmessage">Mensaje</label>
                <textarea class="form-control mt-1" id="message" name="message" placeholder="Mensaje" rows="8"></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" class="btn btn-success btn-lg px-3">Eviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Cierre del formulario de contacto -->

<?php require_once 'Views/template/footer-principal.php'; ?>