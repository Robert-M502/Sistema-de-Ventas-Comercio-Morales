const btnAddCart = document.querySelector("#btnAddCart"); /* Capturar el btn y almacernarla en una constante */
const cantidad = document.querySelector("#product-quanity"); /* Almacenar la cantidad */
const idProducto = document.querySelector("#idProducto"); /* Almacenar el id producto */

const tableLista = document.querySelector("#tableListaDeseo tbody"); /* querySelector se obtiene el id de la tabla */
document.addEventListener("DOMContentLoaded", function () {
    btnAddCart.addEventListener("click", function () {
        agregarCarrito(idProducto.value, cantidad.value);
    });
});
