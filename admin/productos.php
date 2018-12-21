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
            <h1>Gestión de Productos</h1>
            <hr>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <a href="nuevoproducto.php" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo producto</a>
                </div>
                <div class="col-md-12 mt-3">
                    <?php
                    //crear la logica
                    $clientes_por_pagina = 5;
                    $numero_clientes_db = $producto_manager->count();
                    $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);
                    $start = ($page  - 1)*$clientes_por_pagina;
                    $total_pages = ceil($numero_clientes_db / $clientes_por_pagina);
                    $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);
                    $start = ($page  - 1)*$clientes_por_pagina;
                    $total_pages = ceil($numero_clientes_db / $clientes_por_pagina);

                    $clientes=$producto_manager->getAll($start,$clientes_por_pagina);
										?>

										

                </div>

            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
