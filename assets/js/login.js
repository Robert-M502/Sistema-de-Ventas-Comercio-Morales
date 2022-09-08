const btnRegister = document.querySelector("#btnRegister");
const btnLogin = document.querySelector("#btnLogin");
const frmLogin = document.querySelector("#frmLogin");
const frmRegister = document.querySelector("#frmRegister");

const registrarse = document.querySelector("#registrarse");
const nombreRegistro = document.querySelector("#nombreRegistro");
const correoRegistro = document.querySelector("#correoRegistro");
const claveRegistro = document.querySelector("#claveRegistro");

document.addEventListener("DOMContentLoaded", function () {
    btnRegister.addEventListener("click", function () {
        frmLogin.classList.add("d-none"); /* Se le agrega la clase d-none */
        frmRegister.classList.remove("d-none"); /* Se le quita la clase d-none */
    });
    btnLogin.addEventListener("click", function () {
        frmRegister.classList.add("d-none"); /* Se le agrega la clase d-none */
        frmLogin.classList.remove("d-none"); /* Se le quita la clase d-none */
    });

    /* Registro */
    registrarse.addEventListener("click", function () {
        let formData = new FormData();
        formData.append("nombre", nombreRegistro.value);
        formData.append("correo", correoRegistro.value);
        formData.append("clave", claveRegistro.value);

        const url = base_url + "clientes/registroDirecto"; /* Metodo POST en el controlador */
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(formData);
        /* Verificar el estados */
        http.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                Swal.fire("Aviso", res.msg, res.icono); //Alerta
                if (res.icono == "success") {
                    setTimeout(() => {
                        enviarCorreo(correoRegistro.value, res.token);
                    }, 3000); /* 3000 = 3 segundos */
                }
            }
        };
    });
});

function enviarCorreo(correo, token) {
    let formData = new FormData();
    formData.append("token", token);
    formData.append("correo", correo);

    const url = base_url + "clientes/enviarCorreo";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(formData);
    /* Verificar el estados */
    http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            Swal.fire("Aviso", res.msg, res.icono); //Alerta
            if (res.icono == "success") {
                setTimeout(() => {
                    window.location.reload();
                }, 2000); /* 3000 = 3 segundos */
            }
        }
    };
}
