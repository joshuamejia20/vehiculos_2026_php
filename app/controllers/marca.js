$(document).ready(function () {
    listar_marcas();
    listar_marcas_nuevo();

    /*$("#select_nuevo").select2({
        theme: "bootstrap4",
    });*/
});

function listar_marcas() {
    $.ajax({
        url: "app/models/marca/listar.php",
        method: "POST",
        data: {},
        dataType: "json",
        cache: false,
        success: function (response) {
            if (response.success) {
                opciones = "<option value=''>Seleccione una marca</option>";
                for (var i = 0; i < response.total; i++) {
                    opciones += "<option value='" + response.data[i].id_marca + "'>" + response.data[i].nombre + "</option>";
                }
                $("#select_normal").html(opciones);
            } else {
                // Mostrar un mensaje de error al usuario
                alert("Error: " + response.error);
            }
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
        }
    });
}

function listar_marcas_nuevo(data) {
    $("#select_nuevo").select2({
        placeholder: "Seleccione una marca",
        ajax: {
            url: "app/models/marca/listar_select2.php",
            method: "POST",
            dataType: "json",
            delay: 250,
            data: function (params) {
                return {
                    query: params.term, // Término de búsqueda
                }
            },
            cache: true,
            processResults: function (data, page) {
                return {
                    results: data.data
                }
            },
            theme: "bootstrap4",
            allowClear: true,
            minimumInputLength: 0,
            multiple: true,
        }
    });
    $("#select_nuevo").val(null).trigger("change");
    if(data != undefined && data != null){
        var option = new Option(data.text, data.id, false, false);
        $("#select_nuevo").html(option).trigger("change");
    }
}