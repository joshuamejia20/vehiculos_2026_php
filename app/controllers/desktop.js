$(document).ready(function () {
    $("#btn_logout").click(function () {
        logout();
    });
});

function logout() {
    Swal.fire({
        icon: "question",
        title: "¿Estás seguro de cerrar sesión?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Sí, cerrar sesión",
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed){
            $.ajax({
                url: "app/models/usuario/logout.php",
                method: "POST",
                dataType: "json",
            }).done(function (response) {
                if(response.success){
                    listar_vehiculos();
                    window.location.href = "?mod=login";
                }else{
                    Swal.fire({
                        title: "¡Atención!",
                        text: response.error,
                        icon: "info"
                    });
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                Swal.fire({
                        title: "¡Atención!",
                        text: `Ocurrió un error al conectar con el servidor: ${textStatus}`,
                        icon: "info"
                    });
            });
        }
    });
}