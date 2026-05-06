$(function () {
    listar_vehiculos();

    $("#btn_guardar_vehiculo").click(function () { 
        registrar_vehiculo();
    });

    $("#tabla_vehiculos").on("click", ".edit-car", function () {
        let id = $(this).data("id");
        obtener_vehiculo(id);
    });

    $("#tabla_vehiculos").on("click", ".del-car", function () {
        let id = $(this).data("id");
        eliminar_vehiculo(id);
    });
});

function listar_vehiculos(){
    $.ajax({
        url: "app/models/no_normalizada/listar.php",
        method: "POST",
        data: {},
        dataType: "json",
    }).done(function (response) {
        if(response.success){
            let acum_cars = "";
            for(let i = 0; i < response.total; i++){
                let botones =
                "<button class='btn btn-sm btn-info edit-car mr-1' data-id='"+ response.data[i].id_no_normalizada +"'>"+
                    "<i class='fas fa-edit'></i>"+
                "</button>"+
                "<button class='btn btn-sm btn-danger del-car mr-1' data-id='"+ response.data[i].id_no_normalizada +"'>"+
                    "<i class='fas fa-trash'></i>"+
                "</button>";

                acum_cars += 
                "<tr>"+
                    "<td>"+ (i+1) + "</td>"+
                    "<td>"+ response.data[i].marca + "</td>"+
                    "<td>"+ response.data[i].modelo  + "</td>"+
                    "<td>"+ response.data[i].fecha + "</td>"+
                    "<td>"+ response.data[i].tipo_vehiculo  + "</td>"+
                    "<td>"+ response.data[i].tipo_gasolina  + "</td>"+
                    "<td>"+ response.data[i].tipo_transmision  + "</td>"+
                    "<td>"+ response.data[i].color  + "</td>"+
                    "<td>"+ response.data[i].numero_puertas  + "</td>"+
                    "<td>"+ botones + "</td>"+
                "</tr>";
            }

            $("#tb_vehiculos").html(acum_cars);
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

function registrar_vehiculo(){
    $.ajax({
        url: "app/models/no_normalizada/guardar.php",
        method: "POST",
        data: {
            id_no_normalizada: $("#id_no_normalizada").val(),
            marca: $("#marca").val(),
            modelo: $("#modelo").val(),
            fecha: $("#fecha").val(),
            tipo_vehiculo: $("#tipo_vehiculo").val(),
            tipo_gasolina: $("#tipo_gasolina").val(),
            tipo_transmision: $("#tipo_transmision").val(),
            color: $("#color").val(),
            numero_puertas: $("#numero_puertas").val(), 
        },
        dataType: "json",
    }).done(function (response) {
        if(response.success){
            Swal.fire({
                title: "¡Éxito!",
                text: response.msg,
                icon: "success"
            });
            listar_vehiculos();
            $("#formVehiculo").trigger("reset");
            $("#id_no_normalizada").val("");
        }else{
            Swal.fire({
                title: "¡Atención!",
                text: "response.error",
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

function obtener_vehiculo(id){
    $.ajax({
        url: "app/models/no_normalizada/obtener.php",
        method: "POST",
        data: {
            id_no_normalizada: id 
        },
        dataType: "json",
    }).done(function (response) {
        if(response.success){
            $("#id_no_normalizada").val(response.data[0].id_no_normalizada);
            $("#marca").val(response.data[0].marca);
            $("#modelo").val(response.data[0].modelo);
            $("#fecha").val(response.data[0].fecha);
            $("#tipo_vehiculo").val(response.data[0].tipo_vehiculo);
            $("#tipo_gasolina").val(response.data[0].tipo_gasolina);
            $("#tipo_transmision").val(response.data[0].tipo_transmision);
            $("#color").val(response.data[0].color);
            $("#numero_puertas").val(response.data[0].numero_puertas);
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

function eliminar_vehiculo(id){
    Swal.fire({
        icon: "question",
        title: "¿Estás seguro de eliminar este vehículo?",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: "Sí, eliminar",
        denyButtonText: `Cancelar`,
    }).then((result) => {
        if (result.isConfirmed){
            $.ajax({
                url: "app/models/no_normalizada/eliminar.php",
                method: "POST",
                data: {
                    id_no_normalizada: id 
                },
                dataType: "json",
            }).done(function (response) {
                if(response.success){
                    listar_vehiculos();
                    Swal.fire({
                        title: "¡Éxito!",
                        text: response.msg,
                        icon: "success"
                    });
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