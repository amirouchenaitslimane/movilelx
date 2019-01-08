
<?php
$title = "Area cliente";
require_once 'application/parts/frontend/header.php';
if(!$_SESSION['user']){
    redidect('index');
}else{
		$user = $_SESSION['user'];
}
$precio_total = 0;
?>
<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
        <div class="col-md-9">
            <div class="card card-form  ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-body">
									<?php
									flash('info');
									?>
                    <ul class="nav nav-tabs mt-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="ped" href="#pedidos" role="tab" data-toggle="tab">pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#profile" role="tab" data-toggle="tab">Mi perfil</a>
                        </li>


                    </ul>


                    <div class=" tab-content ">
                        <div role="tabpanel" class="tab-pane fade in  " id="pedidos">
                            <h3>Mis pedidos</h3>

														<div class="panel">
																<div class="panel-header">
																		<div class="row">
																		<div class="col-md-6 col-12 col-sm-6">
																				<p class="text-primary">Nombre: <?= $user->getNombre(); ?></p>
																				<p>Apeilldo: <?= $user->getApellido(); ?></p>
																				<p>Email: <?= $user->getEmail(); ?></p>
																		</div>
																		<div class="col-md-6 col-12 col-sm-6">
																				<p>Direccion: <?= $user->getDireccion(); ?></p>
																		</div>
																		</div>

																</div>
														</div>


                            <?php
													$pedidos = $pedido_manager->getPedido($_SESSION['user']->getId());
													if($pedidos != null ):
													?>
                            <?php  foreach ($pedidos as $pedido):?>
														<div id="accordion">
																<div class="card">
																		<div class="card-header" id="<?= $pedido->getId() ?>">
																				<h5 class="mb-0">
																						<button class="btn btn-link" data-toggle="collapse" data-target="#col<?= $pedido->getId() ?>" aria-expanded="true" aria-controls="collapseOne">
																								<h5 class="lead">Pedido n=º <?= $pedido->getId() ?> </h5><p>creado el dìa <?= $pedido->getFecha() ?></p>
																						</button>
																				</h5>
																		</div>

																		<div id="col<?= $pedido->getId() ?>" class="collapse show" aria-labelledby="<?= $pedido->getId() ?>" data-parent="#accordion">
																				<div class="card-body">
																						<table class="table">
																								<thead>
																								<tr>

																										<th scope="col">n Producto </th>
																										<th scope="col">p . unit</th>
																										<th scope="col">c pedida </th>
																										<th scope="col">p compra</th>
																										<th scope="col"></th>
																								</tr>
																								</thead>
																								<tbody>
                                                <?php foreach ($linped_manager->getLinaPedidoPedido($pedido->getId()) as $linea): $precio_total += $linea->precio_compra ?>
																										<tr>
																												<td>
                                                            <?= $linea->nombre ?>
																												</td>
																												<td>
                                                            <?= $linea->precio ?> €
																												</td>
																												<td>
                                                            <?= $linea->cantidad ?>
																												</td>

																												<td>
                                                            <?= $linea->precio_compra ?> €
																												</td>

																										</tr>


                                                <?php endforeach; ?>
																								<tr>
																										<td></td>
																										<td></td>
																										<td></td>
																										<td>total:  <strong><?= $precio_total?> €</strong></td>
																								</tr>
																								</tbody>
																						</table>
																						<small class="text-muted">(n Producto *) Nombre del producto, (p . unit *) precio unitario ,(c pedida*  ) cantidad pedida,(p.compra*)precio compra </small>




																				</div>
																		</div>
																</div>

														</div>
                            <?php endforeach;?>
													<?php else: echo '<h3 class="text-danger lead">No tienes pedidos todavía</h3>'?>
														<?php endif;?>


												</div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <h3>Mi perfil </h3>
                            <?php
														$cliente = $usuario_manager->findUsuario($_SESSION['user']->getId());

														?>

														<ul>
																<li><?= $cliente->getNombre();?></li>

																<li><?= $cliente->getApellido() ;?></li>
																<li><?= $cliente->getDireccion() ?></li>
																<li><?= $cliente->getEmail() ?></li>
														</ul>
                        </div>

                        </div>


                </div>
            </div>

           </div>
    </div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>
<script>
    $(document).ready(()=>{
        $('#ped').tab('show')
    })

</script>
