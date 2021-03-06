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
function add_row(){
    $rowno=$("#employee_table tr").length;
    $rowno=$rowno+1;
    $("#employee_table tr:last").after("<tr id='row"+$rowno+"'><td><input class='form-control' type='text' name='label[]' placeholder='Nombre de la caracteristica' value='' required></td><td><input type='text' class='form-control' name='valor[]' placeholder='Valor de la caracteristica' required></td><td><button  type='button' class='btn btn-danger'  onclick=delete_row('row"+$rowno+"')><i class='fa fa-trash'></i></button></td></tr>");
}
function delete_row(rowno){
    $('#'+rowno).remove();
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#img').attr('src', e.target.result);
            $('#img').addClass('img-thumbnail');
        };
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
var div = document.getElementById("dom-target");
if(div !== null) {
    var est = div.textContent;
    var estadisticas = JSON.parse(est);
    var pontsData = [];
    $.each(estadisticas, function (index, value) {
        var subObject = {label: value.nombre, y: parseInt(value.precio)};

        pontsData.push(subObject);
    });
    window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light1", // "light2", "dark1", "dark2"
            animationEnabled: true, // change to true
            title: {
                text: "Gastos por cliente en € "
            },
            data: [
                {
                    type: "bar",
                    dataPoints: pontsData
                }
            ]
        });
        chart.render();

    };
}

