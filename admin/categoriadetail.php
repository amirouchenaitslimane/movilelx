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
            <h1>Gestión de Categorías</h1>
            <hr>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <a href="nuevacategoria.php" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva categoria</a>
                </div>
                <div class="col-md-12 mt-3">

                 <?php
                 DEBUG($categoria_manager->getProductsCategory($_GET['id']));
                 ?>
                </div>

            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
