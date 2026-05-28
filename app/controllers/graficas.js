google.charts.load ('current', {packages: ['corechart']});
google.charts.setOnLoadCallback (drawChart);

function drawChart () {
  $.ajax ({
    url: 'app/models/no_normalizada/graficar.php',
    method: 'POST',
    data: {},
    dataType: 'json',
  })
    .done (function (response) {
      if (response.success) {
        //aqui irá el codigo de la grafica
        var data = google.visualization.arrayToDataTable ([
          ['Marca', 'Cantidad de Vehículos', {role: 'style'}],
          [response.data[0].marca, parseInt(response.data[0].total), '#b87333'],
          [response.data[1].marca, parseInt(response.data[1].total), 'silver'],
          [response.data[2].marca, parseInt(response.data[2].total), 'gold'],
          [response.data[3].marca, parseInt(response.data[3].total), 'color: #e5e4e2'],
        ]);

        var view = new google.visualization.DataView (data);
        view.setColumns ([
          0,
          1,
          {
            calc: 'stringify',
            sourceColumn: 1,
            type: 'string',
            role: 'annotation',
          },
          2,
        ]);

        var options = {
          title: 'Cantidad de Vehículos por Marca',
          width: 600,
          height: 400,
          bar: {groupWidth: '95%'},
          legend: {position: 'none'},
        };
        var chart = new google.visualization.ColumnChart (
          document.getElementById ('chart_div')
        );
        chart.draw (view, options);
      } else {
        Swal.fire ({
          title: '¡Atención!',
          text: response.error,
          icon: 'info',
        });
      }
    })
    .fail (function (jqXHR, textStatus, errorThrown) {
      Swal.fire ({
        title: '¡Atención!',
        text: `Ocurrió un error al conectar con el servidor: ${textStatus}`,
        icon: 'info',
      });
    });
  /*var data = google.visualization.arrayToDataTable ([
    ['Marca', 'Cantidad de Vehículos', {role: 'style'}],
    ['Toyota', 15, '#b87333'],
    ['Nissan', 20, 'silver'],
    ['KIA', 3, 'gold'],
    ['Honda', 10, 'color: #e5e4e2'],
  ]);

  var view = new google.visualization.DataView (data);
  view.setColumns ([
    0,
    1,
    {
      calc: 'stringify',
      sourceColumn: 1,
      type: 'string',
      role: 'annotation',
    },
    2,
  ]);

  var options = {
    title: 'Cantidad de Vehículos por Marca',
    width: 600,
    height: 400,
    bar: {groupWidth: '95%'},
    legend: {position: 'none'},
  };
  var chart = new google.visualization.ColumnChart (
    document.getElementById ('chart_div')
  );
  chart.draw (view, options);*/
}
