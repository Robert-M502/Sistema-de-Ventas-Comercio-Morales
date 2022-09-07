const tableLista = document.querySelector("#tableListaDeseo tbody"); /* querySelector se obtiene el id de la tabla */
document.addEventListener("DOMContentLoaded", function () {
    getListaDeseo();
});

/* Obtener lista de deseo */
function getListaDeseo() {
    /* Ajax */
    const url = base_url + "principal/listaDeseo"; /* listaDeseo = Metodo en el controlador principal */
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(JSON.stringify(listaDeseo));
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            let html = ""; /* html se agrega en la constante tablelistas */
            res.productos.forEach((producto) => {
                html += `<tr>
                    <td><img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100"></td>
                    <td>${producto.nombre}</td>
                    <td><span class="badge bg-warning">${res.moneda + " " + producto.precio}</span></td>
                    <td><span class="badge bg-primary">${producto.cantidad}</span></td>
                    <td>
                        <button class="btn btn-danger btnEliminarDeseo" type="button" prod="${
                            producto.id
                        }"><i class="fas fa-trash"> </i></button>
                        <button class="btn btn-primary btnAddCart" type="button" prod="${
                            producto.id
                        }"><i class="fas fa-cart-plus"> </i></button>
                    </td>   
                </tr>`;
            });
            tableLista.innerHTML = html;
            btnEliminarDeseo();
            btnAgregarProducto();
        }
    };
}

/* Recuperar el id del producto  */
function btnEliminarDeseo() {
    let listaEliminar = document.querySelectorAll(".btnEliminarDeseo");
    for (let i = 0; i < listaEliminar.length; i++) {
        listaEliminar[i].addEventListener("click", function () {
            let idProducto = listaEliminar[i].getAttribute("prod"); /* Obtener el id del producto */
            eliminarListaDeseo(idProducto); /* LLamar la funcion para eliminar un producto */
        });
    }
}

/* Eliminar un producto */
function eliminarListaDeseo(idProducto) {
    for (let i = 0; i < listaDeseo.length; i++) {
        if (listaDeseo[i]["idProducto"] == idProducto) {
            listaDeseo.splice(i, 1);
        }
    }
    localStorage.setItem(
        "listaDeseo",
        JSON.stringify(listaDeseo)
    ); /* Quita en el localStorage los productos eliminaods en la lista de deseos  */
    getListaDeseo(); /* Actualizar la table  */
    cantidadDeseo(); /* Actualiza la cantidad de producto cuando se elimina uno o más */
    Swal.fire("Aviso", "PRODUCTO ELIMINADO DE LA LISTA DE DESEO", "success"); //Alerta
}

/* Agregar productos a carrito desde la lista de deseo */
function btnAgregarProducto() {
    let listaAgregar = document.querySelectorAll(".btnAddCart");
    for (let i = 0; i < listaAgregar.length; i++) {
        listaAgregar[i].addEventListener("click", function () {
            let idProducto = listaAgregar[i].getAttribute("prod"); /* Obtener el id del producto */
            agregarCarrito(idProducto, 1, true); /* agregarCarrito -> carrito.js */
        });
    }
}
