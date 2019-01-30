<?php
$title = 'Index';
require_once '../application/parts/backend/header.php';?>
<div class="content">
	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
				<div class="card">
						<div class="card-body">
								<div class="row">
										<div class="col-xl-3 col-sm-6 mb-3">
												<div class="card text-white bg-primary o-hidden h-100">
														<div class="card-body">
																<div class="mr-5">Total Productos en tienda <?= $producto_manager->count()?></div>
														</div>
														<a class="card-footer text-white clearfix small z-1" href="productos.php"><span class="float-left">View Details</span><span class="float-right"><i class="fa fa-angle-right"></i></span></a>
												</div>
										</div>
										<div class="col-xl-3 col-sm-6 mb-3">
												<div class="card text-white bg-warning o-hidden h-100">
														<div class="card-body">
																<div class="card-body-icon">
																		<i class="fa fa-fw fa-list"></i>
																</div>
																<div class="mr-5">Total Pedidos (<?= $pedido_manager->count() ?>)</div>
														</div>
														<a class="card-footer text-white clearfix small z-1" href="pedidos.php"><span class="float-left">View Details</span><span class="float-right"><i class="fa fa-angle-right"></i></span></a>
												</div>
										</div>
										<?php if($_SESSION['user']->isSuperAdmin()): ?>
												<div class="col-xl-3 col-sm-6 mb-3">
														<div class="card text-white bg-success o-hidden h-100">
																<div class="card-body">
																		<div class="card-body-icon"><i class="fa fa-fw fa-user"></i></div>
																		<div class="mr-5"> Total administradores de tienda (<?= $usuario_manager->countClientes(1)?>)</div>
																</div>
																<a class="card-footer text-white clearfix small z-1" href="usuarios.php"><span class="float-left">View Details</span><span class="float-right"><i class="fa fa-angle-right"></i></span></a>
														</div>
												</div>
										<?php endif; ?>
										<div class="col-xl-3 col-sm-6 mb-3">
												<div class="card text-white bg-danger o-hidden h-100">
														<div class="card-body">
																<div class="card-body-icon">
																		<i class="fa fa-fw fa-user"></i>
																</div>
																<div class="mr-5">Numero total Clientes (<?= $usuario_manager->countClientes(2) ?>)</div>
														</div>
														<a class="card-footer text-white clearfix small z-1" href="clientes.php"><span class="float-left">View Details</span><span class="float-right"><i class="fa fa-angle-right"></i></span></a>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<div class="col-md-12">
		<div class="card">
				<div class="card-header">
						<h4 class="card-title">Ultimos Productos Añadido</h4>
				</div>
				<div class="card-body">
						<table class="table table-responsive table-striped">
								<thead>
								<th>id</th>
								<th>imagen</th>
								<th>nombre</th>
								<th>precio</th>
								<th>categoria</th>
								<th>estado</th>
								<th>fecha</th>
								</thead>
								<tbody>
								<?php foreach ($producto_manager->getUltimosProductos() as $p):?>
										<tr>
												<td><?= $p->id ?></td>
												<td><img class="img-fluid " width="100px" height="100px" src="../uploads/products/<?= htmlspecialchars($p->imagen) ?>" alt=""></td>
												<td><?= $p->nombre;?></td>
												<td><?= $p->precio ?></td>
												<td><?= $p->category ?></td>
												<td><span class="badge badge-<?= (($p->active == '1')?'success':'danger') ?> p-2"><?= \app\Producto::estado()[$p->active] ?></span></td>
												<td><?= $p->created_at ?></td>
										</tr>
								<?php endforeach;?>
								</tbody>
						</table>
				</div>
		</div>
</div>
		<div class="col-md-12">
				<div class="card">
						<div class="card-header">
								<h4 class="card-title">
										Estadisticas de gastos clientes
								</h4>
						</div>
						<div class="card-body">
								<div id="chartContainer" style="height: 370px; width: 100%;"></div>
						</div>
				</div>
		</div>
</div>
</div>
	<div id="dom-target" style="display: none;">
				<?php
				$estad = json_encode($pedido_manager->pedidosEstadisicas());
				echo htmlspecialchars($estad);
				?>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>









