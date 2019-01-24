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
var div = document.getElementById("dom-target");
var est = div.textContent;
var estadisticas = JSON.parse(est);
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

/*
function validarOferta(){
    let oferta = document.getElementById('oferta');
    oferta.addEventListener('change',()=>{
        if(parseInt(oferta.value) === 1){

            let precio = document.getElementById('precio_reducido').value;
            if(precio.length === 0 || precio=== ""){
                $('#msg').html('valor requerido')
                document.getElementById('btn_sub').setAttribute('disabled', 'disabled');

            }
            document.getElementById('precio_reducido').addEventListener('change',()=>{
               if(this.value ==="" || this.length === 0){



               }else{
                   $('#msg').html('')
                   document.getElementById('btn_sub').removeAttribute('disabled');

               }
                  })

        }else{
            $('#msg').html('')
            document.getElementById('btn_sub').removeAttribute('disabled');
        }
    })


}
*/






var pontsData = [];
$.each(estadisticas, function(index, value) {
    var subObject = { label: value.nombre,  y: parseInt(value.precio)  };

    pontsData.push(subObject);
});
console.log(pontsData);
window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        theme: "light1", // "light2", "dark1", "dark2"
        animationEnabled: true, // change to true
        title:{
            text: "Gastos de cliente en € "
        },
        data: [
            {
                type: "line",
                dataPoints: pontsData
            }
        ]
    });
    chart.render();

};


