/* Usuarios en la panel administrativo */
const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const btnAccion = document.querySelector("#btnAccion");
const titleModal = document.querySelector("#titleModal");
let tblUsuarios;

const myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));

document.addEventListener("DOMContentLoaded", function () {
    /* Cargar datos pendientes con DataTables */
    tblUsuarios = $("#tablUsuarios").DataTable({
        ajax: {
            url: base_url + "usuarios/listar",
            dataSrc: "",
        },
        columns: [{ data: "id" }, { data: "nombres" }, { data: "apellidos" }, { data: "correo" }, { data: "perfil" }, { data: "accion" }],
        language /* Variable/es-ES.js */,
        dom /* Variable/es-ES.js */,
        buttons /* Variable/es-ES.js */,
    });
    /* Levantar modal */
    nuevo.addEventListener("click", function () {
        document.querySelector("#id").value = "";
        titleModal.textContent = "Nuevo usuario";
        titleModal.textContent = "Registrar";
        frm.reset();
        document.querySelector("#clave").removeAttribute("readonly");
        myModal.show();
    });

    /* Submit  usuarios */
    frm.addEventListener("submit", function (e) {
        e.preventDefault();
        let data = new FormData(this);
        /* Ajax */
        const url = base_url + "usuarios/registrar"; /* controlador/metodo */
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(data);
        /* Verificar el estados */
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(
                    this.responseText
                ); /* Muestra claramente si hay error en el contraldor, modelo u otros archivos en la consola o en la red */
                const res = JSON.parse(this.responseText);
                if (res.icono == "success") {
                    /* Ocultar modal */
                    myModal.hide();
                    /* Recarga la tabla con ajax */
                    tblUsuarios.ajax.reload();
                }
                Swal.fire("Aviso", res.msg, res.icono); //Alerta
            }
        };
    });
});

/* Eliminar usuario */
function eliminarUser(idUser) {
    Swal.fire({
        title: "Aviso",
        text: "Estas seguro de eliminar el registro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Eliminar!",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "usuarios/delete/" + idUser; /* controlador/metodo/parametro */
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            /* Verificar el estados */
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(
                        this.responseText
                    ); /* Muestra claramente si hay error en el contraldor, modelo u otros archivos en la consola o en la red */
                    const res = JSON.parse(this.responseText);
                    if (res.icono == "success") {
                        /* Recarga la tabla con ajax */
                        tblUsuarios.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg, res.icono); //Alerta
                }
            };
        }
    });
}

/* Editar usuario */
function editUser(idUser) {
    const url = base_url + "usuarios/edit/" + idUser; /* controlador/metodo/parametro */
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText); /* Muestra claramente si hay error en el contraldor, modelo u otros archivos en la consola o en la red */
            const res = JSON.parse(this.responseText);
            document.querySelector("#id").value = res.id;
            document.querySelector("#nombre").value = res.nombres;
            document.querySelector("#apellido").value = res.apellidos;
            document.querySelector("#correo").value = res.correo;
            document.querySelector("#clave").setAttribute("readonly", "readonly");
            titleModal.textContent = "Modificar usuario";
            btnAccion.textContent = "Actualizar"; /* Registrar cambiar a Actulizar */
            myModal.show();
        }
    };
}
