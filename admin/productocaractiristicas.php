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
if(isset($_POST['submit'])){
    DEBUG($_POST);
}

                            ?>
                            <div id="form_div">
                                <form method="post" action="productocaractiristicas.php?id=<?= $producto->getId() ?>">
                                <div class="col-md-8">
                                    <table id="employee_table" class="table table-borderless">
                                        <tr id="row1">
                                            <td><input class="form-control" type="text" name="label[]" placeholder="Nombre de la cacteristica"></td>
                                            <td><input class="form-control" type="text" name="valor[]" placeholder="Valor de la caracteristica"></td>
                                           </tr>
                                    </table>
                                    <button type="button" onclick="add_row();" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Más caracteristicas</button>
                                    <input type="submit" name="submit" value="Crear" class="btn btn-primary pull-right">

                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
<script type="text/javascript">
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
</script>