/* Pedidos en el panel administrativo */
let tblPendientes, tblProceso, tblFinalizados;
const myModal = new bootstrap.Modal(document.getElementById("modalPedidos"));

document.addEventListener("DOMContentLoaded", function () {
    /* Cargar datos con DataTables */
    /* Pedidos pendientes */
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
    /* Pedidos en procesos */
    tblProceso = $("#tblProceso").DataTable({
        ajax: {
            url: base_url + "pedidos/listarProceso" /* controlar/metodo */,
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

    /* Pedidos finalizados */
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
function cambiarProceso(idPedido, proceso) {
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
            const url = base_url + "pedidos/update/" + idPedido + "/" + proceso; /* controlador/metodo/parametro/parametro */
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
                        tblProceso.ajax.reload();
                        tblFinalizados.ajax.reload();
                    }
                    Swal.fire("Aviso", res.msg, res.icono); //Alerta
                }
            };
        }
    });
}

/* Ver pedido */
function verPedido(idPedido) {
    const url = base_url + "clientes/verPedido/" + idPedido; /* controlador/metodo/parametro */
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            let html = "";
            /* Recore la respuesta */
            res.productos.forEach((row) => {
                let subTotal = parseFloat(row.precio) * parseInt(row.cantidad);
                html += `<tr>
                    <td>${row.producto} </td>
                    <td><span class="badge bg-warning">${res.moneda + " " + row.precio}</span></td>
                    <td><span class="badge bg-primary">${row.cantidad}</span></td>
                    <td>${subTotal.toFixed(2)}</td> 
                    </tr>`;
            });
            document.querySelector("#tablePedidos tbody").innerHTML = html; /* Recibe el html construido */
            myModal.show(); /* Levanta el Modal */
        }
    };
}
