const btnAddDeseo = document.querySelectorAll(".btnAddDeseo");
const btnAddcarrito = document.querySelectorAll(".btnAddcarrito");
const btnDeseo = document.querySelector("#btnCantidadDeseo"); /* # = indaca que es un id */
const btnCarrito = document.querySelector("#btnCantidadCarrito"); /* # = indaca que es un id */
let listaDeseo, listaCarrito;
document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("listaDeseo", "listaCarrito") != null) {
        listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
        listaCarrito = JSON.parse(localStorage.getItem("listaCarrito"));
    }
    for (let i = 0; i < btnAddDeseo.length; i++) {
        btnAddDeseo[i].addEventListener("click", function () {
            let idProducto = btnAddDeseo[i].getAttribute("prod"); /* Captuaa el id del producto seleccionado*/
            agregarDeseo(idProducto); /* En la funcion agregarDeseo le pasamos el id */
        });
    }
    for (let i = 0; i < btnAddcarrito.length; i++) {
        btnAddcarrito[i].addEventListener("click", function () {
            let idProducto = btnAddcarrito[i].getAttribute("prod"); /* Captuaa el id del producto seleccionado*/
            agregarCarrito(idProducto, 1);
        });
    }
    cantidadDeseo();
    cantidadCarrito();
});

/* Agregar produtos a la lista de deseo */
function agregarDeseo(idProducto) {
    if (localStorage.getItem("listaDeseo") == null) {
        listaDeseo = [];
    } else {
        let listaExiste = JSON.parse(localStorage.getItem("listaDeseo"));
        for (let i = 0; i < listaExiste.length; i++) {
            if (listaExiste[i]["idProducto"] == idProducto) {
                Swal.fire("Aviso", "EL PRODUCTO YA ESTA EN LA LISTA DE DESEO", "warning"); //Alerta
                return;
            }
        }
        listaDeseo.concat(localStorage.getItem("listaDeseo"));
    }
    listaDeseo.push({
        idProducto: idProducto,
        cantidad: 1,
    });
    localStorage.setItem("listaDeseo", JSON.stringify(listaDeseo));
    Swal.fire("Aviso", "PRODUCTO AGREGADO A LA LISTA DE DESEOS", "success"); //Alerta
    cantidadDeseo();
}

/* Recuperar y obtiene la cantidad de deseo */
function cantidadDeseo() {
    let listas = JSON.parse(localStorage.getItem("listaDeseo"));
    if (listas != null) {
        btnDeseo.textContent = listas.length;
    } else {
        btnDeseo.textContent = 0;
    }
}

/* Agregar productos al carrito */
function agregarCarrito(idProducto, cantidad) {
    if (localStorage.getItem("listaCarrito") == null) {
        listaCarrito = [];
    } else {
        let listaExiste = JSON.parse(localStorage.getItem("listaCarrito"));
        for (let i = 0; i < listaExiste.length; i++) {
            if (listaExiste[i]["idProducto"] == idProducto) {
                Swal.fire("Aviso", "EL PRODUCTO YA ESTA AGREGADO", "warning"); //Alerta
                return;
            }
        }
        listaCarrito.concat(localStorage.getItem("listaCarrito"));
    }
    listaCarrito.push({
        idProducto: idProducto,
        cantidad: cantidad,
    });
    localStorage.setItem("listaCarrito", JSON.stringify(listaCarrito));
    Swal.fire("Aviso", "PRODUCTO AGREGADO", "success"); //Alerta
    cantidadCarrito();
}

/* Recuperar y obtiene la cantidad de productos en el carrito */
function cantidadCarrito() {
    let listas = JSON.parse(localStorage.getItem("listaCarrito"));
    if (listas != null) {
        btnCarrito.textContent = listas.length;
    } else {
        btnCarrito.textContent = 0;
    }
}
