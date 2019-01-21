<?php
$title = "Pedidos";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}
?>
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
                <?= flash('info');?>
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Gestión Pedidos
												</h4>
										</div>
										<div class="card-body">
                        <?php $pedidos = $pedido_manager->getpedidos(); ?>
												<table class="table table-responsive table-striped">
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
																		<td ><p class="p-2 bg_<?=$pedido->estado ?>"><?= \app\Pedido::getEstadoOption()[$pedido->estado] ?></p></td>
																		<td><a href="pedidodetail.php?id=<?= $pedido->id ?>" class="btn btn-primary pull-right btn-fill"> <i class="fa fa-eye"></i></a></td>
																</tr>
                            <?php endforeach;?>
														</tbody>
												</table>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>
