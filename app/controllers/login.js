$(document).ready(function () {
    $("#btn_login").click(function () {
        var username = $("#user").val();
        var password = hex_md5($("#pass").val());
        iniciar_sesion(username, password);
    });
});

function iniciar_sesion(usuario, contrasena) {
    $.ajax({
        url: "app/models/usuario/login.php",
        method: "POST",
        data:{
            usuario: usuario,
            contrasena: contrasena
        },
        dataType: "json",
        cache: false,
        success: function (response) {
            if (response.success) {
                // Redirigir a la página principal o mostrar un mensaje de éxito
                window.location.href = "?mod=home";
            } else {
                // Mostrar un mensaje de error al usuario
                alert("Error de inicio de sesión: " + response.error);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
        }
    });
}