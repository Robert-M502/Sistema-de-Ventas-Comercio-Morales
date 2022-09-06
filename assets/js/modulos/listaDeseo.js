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
            res.forEach((producto) => {
                html += `<tr>
                    <td>
                        <img class="img-thumbnail rounded-circle" src="${producto.imagen}" alt="" width="100">
                    </td>
                    <td>${producto.nombre}</td>
                    <td>${producto.precio}</td>
                    <td>${producto.cantidad}</td>
                    <td> 
                        <button class="btn btn-danger" type="button"> <i class="fas fa-trash"> </i></button>
                        <button class="btn btn-info" type="button"> <i class="fas fa-cart-plus"> </i></button>
                    </td>   
                </tr>`;
            });
            tableLista.innerHTML = html;
        }
    };
}
