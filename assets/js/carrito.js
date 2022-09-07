const btnAddDeseo = document.querySelectorAll(".btnAddDeseo");
const btnAddcarrito = document.querySelectorAll(".btnAddcarrito");
const btnDeseo = document.querySelector("#btnCantidadDeseo"); /* # = indaca que es un id */
const btnCarrito = document.querySelector("#btnCantidadCarrito"); /* # = indaca que es un id */
const verCarrito = document.querySelector("#verCarrito");
const tableListaCarrito = document.querySelector("#tableListaCarrito tbody"); /* Solo accedemos al tbody */

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

    /* Var carrito */
    const myModal = new bootstrap.Modal(document.getElementById("myModal"));
    verCarrito.addEventListener("click", function () {
        getListaCarrito();
        myModal.show();
    });
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

/* Var carrito */
function getListaCarrito() {
    /* Ajax */
    const url = base_url + "principal/listaCarrito"; /* listaDeseo = Metodo en el controlador principal */
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
                    <td> <button class="btn btn-danger" type="button"><i class="fas fa-times-circle"></i></button></td>    
                </tr>`;
            });
            tableListaCarrito.innerHTML = html;
            document.querySelector("#totalGeneral").textContent = res.total;
            // btnEliminarDeseo();
        }
    };
}
