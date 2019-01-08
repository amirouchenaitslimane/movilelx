<?php
$title = "Categorias";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}
?>
<div id="wrapper">
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
								<?php
								$pedidos = $pedido_manager->getpedidos();
								?>
                <div class="col-md-12">

                </div>

                <div class="col-md-12 mt-3">

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id pedido</th>
														<th scope="col">Nombre cliente</th>
														<th scope="col">dereccion</th>
														<th scope="col">fecha</th>
                            <th scope="col">cant prod</th>
                            <th scope="col">estado</th>

                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
												<?php foreach ( $pedidos as $pedido):?>
                        <tr>
                            <th scope="row"><?= $pedido->id ?></th>
                            <td><a href="vercliente.php?id=<?= $pedido->usuario_id ?>" class="text-primary"><?= $pedido->nombre  ?></a></td>
                            <td><?= $pedido->direccion ?></td>
                            <td><?= dateFormatter($pedido->fecha)?></td>
														<td><?= $pedido->num_lineas ?></td>
														<td ><p class="bg-dark"><?= $pedido->estado ?></p></td>

												<th></th>
												</tr>
												<?php endforeach;?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
        <?php include_once  '../application/parts/backend/footer.php'?>
