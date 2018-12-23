<?php
$title ="Categorias";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>Nuevo  Producto</h1>
            <hr>

            <div class="row">

                <div class="col-md-12 mt-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <?php
                            $producto = $producto_manager->getProduct($_GET['id']);


                            ?>

                            <form action="productocaractiristicas.php?id=<?= $producto->getId(); ?>" method="post">
                                <div class="jumbotron" id="cara">
                                    <button class="btn btn-danger pull-right"><i class="fa fa-trash"></i></button>
                                    <div class="form-group">
                                        <input type="text" name="label[]" class="form-control" id="" placeholder="Introduce nombre de la caracteristica">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="valor[]" class="form-control" id="" placeholder="Introduce el valor de la caracteristica">
                                    </div>
                                </div>

                                <button class="btn btn-primary pull-left"> Crear</button>
                            </form>
                            <button class="btn btn-primary pull-right" onclick="add_row()"> Otra</button>



                        </div>
                    </div>
                </div>

            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
<script>
    function add_row()
    {
        $rowno=$("#cara").length;

        $rowno=$rowno+1;
        $("#cara:last ").after(createJum($rowno));
    return false;
    }
    function createJum(id) {
        let div = " <div class='jumbotron' id='cara"+id+"' > <h1>carac "+id+"</h1>" +
            "<button class='btn btn-danger pull-right mb-3' onclick='return delete_row("+id+")' ><i class='fa fa-trash'></i></button>" +
            "<div class='form-group'>" +
            "<input type='text' name='label[]' class='form-control'  placeholder='Introduce nombre de la caracteristica'>" +
            "</div>" +
            "<div class='form-group'>" +
            "<input type='text' name='valor[]' class='form-control' placeholder='Introduce el valor de la caracteristica'>" +
            "</div>" +
            "</div>";
        return div;
        //<tr id='row"+$rowno+"'><td><input type='text' name='name[]' placeholder='Enter Name'></td><td><input type='text' name='age[]' placeholder='Enter Age'></td><td><input type='text' name='job[]' placeholder='Enter Job'></td><td><input type='button' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>"
    }

    function delete_row(rowno)
    {

        $('#cara'+rowno).hide('slow',function () {
            this.remove();
        });
        return false;
    }

</script>