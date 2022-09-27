/* Pedidos en el panel administrativo */
let tblPendientes, tblFinalizados;

var firstTabEl = document.querySelector("#myTab li:last-child button");
var firstTab = new bootstrap.Tab(firstTabEl);

document.addEventListener("DOMContentLoaded", function () {
    /* Cargar datos con DataTables */
    tblPendientes = $("#tblPendientes").DataTable({
        ajax: {
            url: base_url + "pedidos/listarPedidos" /* controlar/metodo */,
            dataSrc: "",
        },
        columns: [
            { data: "id_transaccion" },
            { data: "monto" },
            { data: "estado" },
            { data: "fecha" },
            { data: "email" },
            { data: "nombre" },
            { data: "apellido" },
            { data: "direccion" },
            { data: "accion" },
        ],
        language /* Variable/es-ES.js */,
        dom /* Variable/es-ES.js */,
        buttons /* Variable/es-ES.js */,
    });
    tblFinalizados = $("#tblFinalizados").DataTable({
        ajax: {
            url: base_url + "pedidos/listarFinalizados" /* controlar/metodo */,
            dataSrc: "",
        },
        columns: [
            { data: "id_transaccion" },
            { data: "monto" },
            { data: "estado" },
            { data: "fecha" },
            { data: "email" },
            { data: "nombre" },
            { data: "apellido" },
            { data: "direccion" },
            { data: "accion" },
        ],
        language /* Variable/es-ES.js */,
        dom /* Variable/es-ES.js */,
        buttons /* Variable/es-ES.js */,
    });
});

/* Cambiar estado de proceso de los pedidos */
function cambiarProceso(idPedido) {
    Swal.fire({
        title: "Aviso",
        text: "Estas seguro de cambiar el estado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si, Cambiar!",
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "pedidos/update/" + idPedido; /* controlador/metodo/parametro */
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
                        tblPendientes.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg, res.icono); //Alerta
                }
            };
        }
    });
}
