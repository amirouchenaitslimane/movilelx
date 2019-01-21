<?php
$title = "Pedido Detail";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}
?>
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-8">
                <?= flash('info');?>
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Pedido Detalle
												</h4>
										</div>
										<div class="card-body">
                        <?php

                        $cliente = $usuario_manager->getByPedido($_GET['id']);

                        if($cliente->getId() === null){
                            flash('info','Pedido solicitado no existe','danger');
                            redirect('pedidos');
                        }
                        if(isset($_POST['submit'])) {

                            $estado = (int)$_POST['estado'];


                            if ($estado !== 0 && $estado !== 1 && $estado !== 2) {
                                flash('info', 'estado del pedido erroneo ', 'danger');
                                unset($_POST);
                                redirectWithParam('pedidodetail', 'id=' . $_GET['id']);
                            } else {

                                $cliente->getPedidos()->setEstado((string)$estado);
                                $pedido_manager->updateStatus($cliente->getPedidos());
                                flash('info', 'pedido actualizado  ', 'success');
                                redirectWithParam('pedidodetail', 'id=' . $_GET['id']);
                            }
                        }
                        ?>
												<div class="col-md-12">
														<h3 class="lead">Estado Actual Del Pedido <strong class=" p-2 bg_<?= $cliente->getPedidos()->getEstado()?>"> <?= $cliente->getPedidos()::getEstadoOption()[$cliente->getPedidos()->getEstado()] ?></strong></h3>
														<hr>
														<div class="mt-4">

																<div class="jumbotron text-white" style="background: #72d1f6;color: white;">
																		<form action="pedidodetail.php?id=<?= $_GET['id'] ?>" method="post">
																				<div class="form-group">
																						<label class="text-white" for="estado">Cambiar estado del pedido</label>
																						<select name="estado" id="estado" class="form-control">
                                                <?= \app\Pedido::getEstadoOptionList($cliente->getPedidos()->getEstado()) ?>
																						</select>
																				</div>
																				<button name="submit" type="submit" class="btn btn-dark btn-fill pull-right">Validar</button>
																		</form>

																</div>
														</div>
												</div>


										</div>

								</div>
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Información Del Pedido
												</h4>

										</div>
										<div class="card-body">
												<table class="table table-striped table-responsive">
														<thead>
														<th>Código</th>
														<th>fecha</th>
														<th>cantidad productos</th>

														</thead>
														<tbody>
														<tr>
																<td><?= $cliente->getPedidos()->getId()?></td>
																<td><?= $cliente->getPedidos()->getFecha()?></td>
																<td><?= count($cliente->getPedidos()->getLineas())?></td>
														</tr>
														</tbody>
												</table>
										</div>
								</div>
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Productos comprados
												</h4>
										</div>
										<div class="card-body">
												<table class="table table-striped">
														<thead>
														<th></th>
														<th>Producto</th>
														<th>precio.€</th>
														<th>cantidad</th>
														<th>precio compra.€</th>

														</thead>
														<tbody>

                            <?php foreach ($cliente->getPedidos()->getLineas() as $pedido):?>
																<tr>
                                    <?php foreach ($pedido->getProductos() as $producto):?>
																				<td><img class="img-fluid img-thumbnail" src="../uploads/products/<?= $producto->getImagen()?>" alt="" width="50%" height="50%"></td>

																				<td><?= $producto->getNombre() ?></td>
																				<td> <?= $producto->getPrecio() ?> €</td>
                                    <?php endforeach;?>
																		<td><?=$pedido->getCantidad()?></td>
																		<td><?= $pedido->getPrecioCompra()?> €</td>
																</tr>
                            <?php endforeach ;?>


														</tbody>
												</table>
										</div>
								</div>
						</div>
						<div class="col-md-4">
								<div class="card">
										<div class="card-body">
												<h3 class="lead">Informacion Del Cliente </h3>
												<hr>
												<p class="mb-0">Correo Electronico: </p>
												<p class="text-info "><a href="mailto:<?= $cliente->getEmail()?>"><i class="fa fa-envelope"></i> <?= htmlspecialchars($cliente->getEmail())?></a></p>
												<p class="mb-0 mt-2">Cuenta Registrada: </p>
												<p class="text-muted "><i class="fa fa-calendar"></i> <?= htmlspecialchars($cliente->getCreated())?></p>
												<p class="mb-0 mt-2">Gasto Total Del Cliente: </p>
												<p class=" "><span class="badge badge-success badge-pill"> <?= htmlspecialchars($pedido_manager->gastosCliente($cliente->getId()))?> € </span></p>

												<h3 class="lead">Derección de envio</h3>
												<hr>
												<p class="mb-0">Direccón: </p>
												<p class="text-info "><i class="fa fa-map-marker "></i> <?= htmlspecialchars($cliente->getDireccion())?></p>
												<p class="lead">
														<span class="text-info ">Nombre: </span><?= $cliente->getNombre()?>


												</p>
												<p class="lead">
														<span class="text-info ">Apellido: </span><?= $cliente->getApellido()?>


												</p>


										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>