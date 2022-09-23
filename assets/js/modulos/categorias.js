/* Usuarios en la panel administrativo */
const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const btnAccion = document.querySelector("#btnAccion");
const titleModal = document.querySelector("#titleModal");
let tblCategorias;

const myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));

document.addEventListener("DOMContentLoaded", function () {
    /* Cargar datos pendientes con DataTables */
    tblCategorias = $("#tblCategorias").DataTable({
        ajax: {
            url: base_url + "categorias/listar",
            dataSrc: "",
        },
        columns: [{ data: "id" }, { data: "categoria" }, { data: "imagen" }, { data: "accion" }],
        language /* Variable/es-ES.js */,
        dom /* Variable/es-ES.js */,
        buttons /* Variable/es-ES.js */,
    });
    /* Levantar modal */
    nuevo.addEventListener("click", function () {
        document.querySelector("#id").value = ""; /* Limpia el campo */
        document.querySelector("#imagen").value = ""; /* Limpia el campo */
        document.querySelector("#imagen_actual").value = ""; /* Limpia el campo */
        titleModal.textContent = "Nueva categoria";
        btnAccion.textContent = "Registrar";
        frm.reset();
        myModal.show();
    });

    /* Submit categorias */
    frm.addEventListener("submit", function (e) {
        e.preventDefault(); /* Previene la recarga */
        let data = new FormData(this);
        /* Ajax */
        const url = base_url + "categorias/registrar"; /* controlador/metodo */
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
                    tblCategorias.ajax.reload();
                    document.querySelector("#imagen").value = ""; /* Limpia el campo */
                }
                Swal.fire("Aviso", res.msg, res.icono); //Alerta
            }
        };
    });
});

/* Eliminar categoria */
function eliminarCat(idCat) {
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
            const url = base_url + "categorias/delete/" + idCat; /* controlador/metodo/parametro */
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
                        tblCategorias.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg, res.icono); //Alerta
                }
            };
        }
    });
}

/* Editar categoria */
function editCat(idCat) {
    const url = base_url + "categorias/edit/" + idCat; /* controlador/metodo/parametro */
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText); /* Muestra claramente si hay error en el contraldor, modelo u otros archivos en la consola o en la red */
            const res = JSON.parse(this.responseText);
            document.querySelector("#id").value = res.id;
            document.querySelector("#categoria").value = res.categoria;
            document.querySelector("#imagen_actual").value = res.imagen;
            btnAccion.textContent = "Actualizar"; /* Registrar cambiar a Actulizar */
            titleModal.textContent = "Modificar Categoria";
            myModal.show();
        }
    };
}
