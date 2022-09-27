/* Productos en el panel administrativo */
const frm = document.querySelector("#frmRegistro");
const btnAccion = document.querySelector("#btnAccion");
let tblProductos;

var firstTabEl = document.querySelector("#myTab li:last-child button");
var firstTab = new bootstrap.Tab(firstTabEl);

document.addEventListener("DOMContentLoaded", function () {
    /* Cargar datos pendientes con DataTables */
    tblProductos = $("#tblProductos").DataTable({
        ajax: {
            url: base_url + "productos/listar" /* controlar/metodo */,
            dataSrc: "",
        },
        columns: [{ data: "id" }, { data: "nombre" }, { data: "precio" }, { data: "cantidad" }, { data: "imagen" }, { data: "accion" }],
        language /* Variable/es-ES.js */,
        dom /* Variable/es-ES.js */,
        buttons /* Variable/es-ES.js */,
    });

    /* Submit productos */
    frm.addEventListener("submit", function (e) {
        e.preventDefault(); /* Previene la recarga */
        let data = new FormData(this);
        /* Ajax */
        const url = base_url + "productos/registrar"; /* controlador/metodo */
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
                    frm.reset();
                    /* Recarga la tabla con ajax */
                    tblProductos.ajax.reload();
                    document.querySelector("#imagen").value = ""; /* Limpia el campo */
                }
                Swal.fire("Aviso", res.msg, res.icono); //Alerta
            }
        };
    });
});

/* Eliminar Producto */
function eliminarPro(idPro) {
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
            const url = base_url + "productos/delete/" + idPro; /* controlador/metodo/parametro */
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
                        tblProductos.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg, res.icono); //Alerta
                }
            };
        }
    });
}

/* Editar categoria */
function editPro(idPro) {
    const url = base_url + "productos/edit/" + idPro; /* controlador/metodo/parametro */
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText); /* Muestra claramente si hay error en el contraldor, modelo u otros archivos en la consola o en la red */
            const res = JSON.parse(this.responseText);
            document.querySelector("#id").value = res.id;
            document.querySelector("#nombre").value = res.nombre;
            document.querySelector("#precio").value = res.precio;
            document.querySelector("#cantidad").value = res.cantidad;
            document.querySelector("#categoria").value = res.id_categoria;
            document.querySelector("#descripcion").value = res.descripcion;
            document.querySelector("#imagen_actual").value = res.imagen;
            btnAccion.textContent = "Actualizar"; /* Registrar cambiar a Actulizar */
            firstTab.show();
        }
    };
}
