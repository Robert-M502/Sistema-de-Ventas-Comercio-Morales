/* Login administrativo */
const frm = document.querySelector("#formulario");
const email = document.querySelector("#email");
const clave = document.querySelector("#clave");

const tableLista = document.querySelector("#tableListaDeseo tbody"); /* querySelector se obtiene el id de la tabla */
document.addEventListener("DOMContentLoaded", function () {
    frm.addEventListener("submit", function (e) {
        e.preventDefault();
        if (email.value == "" || clave.value == "") {
            alertas("Todos los campos son requeridos", "warning");
        } else {
            let data = new FormData(this);
            /* Ajax */
            const url = base_url + "admin/validar"; /* listaDeseo = Metodo en el controlador principal */
            const http = new XMLHttpRequest();
            http.open("POST", url, true);
            http.send(data);
            /* Verificar el estados */
            http.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(
                        this.responseText
                    ); /* Muestra claramente si hay error en el contraldor, modelo u otros archivos en la consola o en la red */
                    const res = JSON.parse(this.responseText);
                    if (res.icono == "success") {
                        setTimeout(() => {
                            window.location = base_url + "admin/home";
                        }, 2000);
                    }
                    alertas(res.msg, res.icono);
                }
            };
        }
    });
});

function alertas(msg, icono) {
    // Swal.fire("Aviso", msg, icono); //Alerta
    Swal.fire("Aviso", msg.toUpperCase(), icono); //Alerta
}
