const tableLista = document.querySelector("#tableListaProductos tbody"); /* querySelector se obtiene el id de la tabla */
document.addEventListener("DOMContentLoaded", function () {
    if (tableLista) {
        getListaProductos();
    }
});

function getListaProductos() {
    /* Ajax */
    const url = base_url + "principal/listaProductos"; /* listaDeseo = Metodo en el controlador principal */
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(JSON.stringify(listaCarrito));
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = ""; /* html se agrega en la constante tablelistas */
            res.productos.forEach((producto) => {
                html += `<tr>
                    <td><img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100"></td>
                    <td>${producto.nombre} </td>
                    <td><span class="badge bg-warning">${res.moneda + " " + producto.precio}</span></td>
                    <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                    <td>${producto.subTotal}</td>    
                </tr>`;
            });
            tableLista.innerHTML = html;
            document.querySelector("#totalProducto").textContent = "TOTAL A PAGAR: " + res.moneda + " " + res.total;
        }
    };
}
