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
            <h1>Gestión de tienda</h1>
            <hr>
            <a href="nuevacategoria.php">Add</a>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">


            </div>
            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
