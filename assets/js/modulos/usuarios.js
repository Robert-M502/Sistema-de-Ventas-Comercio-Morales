/* Usuarios en la panel administrativo */
const tablUsuarios = document.querySelector("#tablUsuarios");

document.addEventListener("DOMContentLoaded", function () {
    /* Cargar datos pendientes con DataTables */
    $("#tablUsuarios").DataTable({
        ajax: {
            url: base_url + "usuarios/listar",
            dataSrc: "",
        },
        columns: [{ data: "id" }, { data: "nombres" }, { data: "apellidos" }, { data: "correo" }, { data: "perfil" }],
        language /* Variable/es-ES.js */,
        dom /* Variable/es-ES.js */,
        buttons /* Variable/es-ES.js */,
    });
});
