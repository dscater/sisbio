let contenedor_notificaciones = $("#contenedor_notificaciones");
$(document).ready(function () {
    // notificaciones usuario
    getNotificaciones();
});

function getNotificaciones() {
    $.ajax({
        type: "GET",
        url: $("#urlNotificacionesUsuario").val(),
        data: {},
        dataType: "json",
        success: function (response) {
            contenedor_notificaciones.html(response);
            setInterval(getNuevasAsistencias, 1000);
        }
    });
}

function getNuevasAsistencias() {
    let id = contenedor_notificaciones.children(".sub-menu-user").children("li:first-child").attr("data-id");
    if (id) {
        $.ajax({
            type: "GET",
            url: $("#urlNuevasNotificacionesUsuario").val(),
            data: { id: id },
            dataType: "json",
            success: function (response) {
                contenedor_notificaciones.children(".sub-menu-user").children("li:first-child").before(response.html);
                if (parseInt(response.no_vistos) > 0) {
                    $("#txt_no_vistos").html(response.no_vistos);
                    $("#txt_no_vistos").removeClass("oculto");
                } else {
                    $("#txt_no_vistos").addClass("oculto");
                }
            }
        });
    }
}