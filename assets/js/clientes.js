const tableLista = document.querySelector("#tableListaProductos tbody"); /* querySelector se obtiene el id de la tabla */
const tblPendientes = document.querySelector("#tblPendientes");

document.addEventListener("DOMContentLoaded", function () {
    if (tableLista) {
        getListaProductos();
    }
    /* Cargar datos pendientes con DataTables */
    $("#tblPendientes").DataTable({
        ajax: {
            url: base_url + "clientes/listarPendientes",
            dataSrc: "",
        },
        columns: [{ data: "id_transaccion" }, { data: "monto" }, { data: "fecha" }, { data: "accion" }],
        language /* Variable/es-ES.js */,
        dom /* Variable/es-ES.js */,
        buttons /* Variable/es-ES.js */,
    });
});

function getListaProductos() {
    /* Ajax */
    let html = "";
    const url = base_url + "principal/listaProductos"; /* listaProductos = Metodo en el controlador principal */
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(JSON.stringify(listaCarrito));
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            if (res.totalPaypal > 0) {
                res.productos.forEach((producto) => {
                    html += `<tr>
                        <td><img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100"></td>
                        <td>${producto.nombre} </td>
                        <td><span class="badge bg-warning">${res.moneda + " " + producto.precio}</span></td>
                        <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                        <td>${producto.subTotal}</td>    
                    </tr>`;
                });
                // console.log(res.totalPaypal);
                tableLista.innerHTML = html;
                document.querySelector("#totalProducto").textContent = "TOTAL A PAGAR: " + res.moneda + " " + res.total;
                botonPaypal(res.totalPaypal); /* Boton de Paypal */
            } else {
                tableLista.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center">Carrito vacio</td>
                </tr>
                `;
            }
        }
    };
}

/* PayPal */
function botonPaypal(total) {
    paypal
        .Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [
                        {
                            amount: {
                                value: total, // Can also reference a variable or function
                            },
                        },
                    ],
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function (orderData) {
                    registrarPedido(orderData);
                });
            },
        })
        .render("#paypal-button-container");
}

/* Registrar pedidos */
function registrarPedido(datos) {
    const url = base_url + "clientes/registrarPedido";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(
        JSON.stringify({
            pedidos: datos,
            productos: listaCarrito /* Carrito.js/listaCarrito */,
        })
    );
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Swal.fire("Aviso", res.msg, res.icono); //Alerta
            if (res.icono == "success") {
                /* Borrar la lista carrito en el locastorage cuando se registra el pedido y el detalle pedido */
                localStorage.removeItem("listaCarrito");
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            }
        }
    };
}

function verPedido(idPedido) {
    const mPedido = new bootstrap.Modal(document.getElementById("modalPedido"));
    /* Ajax */
    const url = base_url + "clientes/verPedido/" + idPedido; /* verPedido = Metodo en el controlador clientes */
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
            mPedido.show(); /* Levanta el Modal */
        }
    };
}
