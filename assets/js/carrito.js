const btnAddDeseo = document.querySelectorAll(".btnAddDeseo");
const btnDeseo = document.querySelector("#btnCantidadDeseo"); /* # = indacar que es un id */
let listaDeseo = [];
document.addEventListener("DOMContentLoaded", function () {
    if (localStorage.getItem("listaDeseo") != null) {
        listaDeseo = JSON.parse(localStorage.getItem("listaDeseo"));
    }
    cantidadDeseo();
    for (let i = 0; i < btnAddDeseo.length; i++) {
        btnAddDeseo[i].addEventListener("click", function () {
            let idProducto = btnAddDeseo[i].getAttribute("prod"); /* Captuaa el id del producto seleccionado*/
            agregarDeseo(idProducto); /* En la funcion agregarDeseo le pasamos le id */
        });
    }
});
//Se envia el id del producto y la cantidad
function agregarDeseo(idProducto) {
    if (localStorage.getItem("listaDeseo") == null) {
        listaDeseo = [];
    } else {
        let listasExiste = JSON.parse(localStorage.getItem("listaDeseo"));
        for (let i = 0; i < listasExiste.length; i++) {
            if (listasExiste[i]["idProducto"] == idProducto) {
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
