$(document).ready( function () {
    var table = $('#table_id');
    table.DataTable({
        "language": {

            "lengthMenu": "Mostrar  _MENU_  por página",
            "zeroRecords": "No hay resultado ",
            "info": "Mostrar página _PAGE_ de _PAGES_",
            "infoEmpty": "No Registros disponibles",
            "infoFiltered": "(filtrar de _MAX_  registros)",
            "search": "Buscar: _INPUT_ ",
            "paginate": {
                "next": "Sigiente ",
                "previous": "Atrás"
            },


        },

    });
} );
function add_row()
{
    $rowno=$("#employee_table tr").length;
    $rowno=$rowno+1;
    $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input class='form-control' type='text' name='label[]' placeholder='Nombre de la caracteristica' value='' required></td><td><input type='text' class='form-control' name='valor[]' placeholder='Valor de la caracteristica' required></td><td><button  type='button' class='btn btn-danger'  onclick=delete_row('row"+$rowno+"')><i class='fa fa-trash'></i></button></td></tr>");
}
function delete_row(rowno)
{
    $('#'+rowno).remove();
}

var speedCanvas = document.getElementById("speedChart");

var div = document.getElementById("dom-target");
var est = div.textContent;
var estadisticas = JSON.parse(est);

var labels = [];
var data = [];
$.each(estadisticas, function(index, value) {
    labels.push(value.nombre);
    data.push(value.precio)
});


Chart.defaults.global.defaultFontFamily = "Roboto";
Chart.defaults.global.defaultFontSize = 18;

var speedData = {
    labels: labels,
    datasets: [{
        label: "COMPRAS EN €",
        data: data,

    }]
};

var chartOptions = {
    legend: {
        display: true,
        position: 'top',
        labels: {
            boxWidth: 80,
            fontColor: 'green'
        }
    }
};

var lineChart = new Chart(speedCanvas, {
    type: 'bar',
    data: speedData,
    options: chartOptions
});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#img').attr('src', e.target.result);
            $('#img').addClass('img-thumbnail');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function readImg(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#img1").hide('slow', function(){ this.remove(); });
            $('#blah').attr('src', e.target.result);
            $('#blah').addClass('img-thumbnail');
        }


        reader.readAsDataURL(input.files[0]);
    }
}