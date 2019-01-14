<?php
$title = "Index";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
   header('location:movilelx.site/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
		<div id="content-wrapper">
				<div class="container-fluid">
						<!-- Page Content -->
						<h1>Gestión de tienda</h1>

						<hr>

						<div class="row">
								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-primary o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fas fa-fw fa-comments"></i>
														</div>
														<div class="mr-5">Total Productos en tienda <?= $producto_manager->count()?></div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="productos.php">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>
								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-warning o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fa fa-fw fa-list"></i>
														</div>
														<div class="mr-5">Total Pedidos (<?= $pedido_manager->count(0) ?>)</div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="pedidos.php">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>

								<?php if($_SESSION['user']->isSuperAdmin()): ?>
								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-success o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fas fa-fw fa-shopping-cart"></i>
														</div>
														<div class="mr-5"> Total administradores de tienda (<?= $usuario_manager->countClientes(1)?>)</div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="usuarios.php">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>
								<?php endif; ?>


								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-danger o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fas fa-fw fa-life-ring"></i>
														</div>
														<div class="mr-5">Numero total Clientes (<?= $usuario_manager->countClientes(2) ?>)</div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="clientes.php">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>
						</div>
						<div class="col-md-12 mt-4">

										<div class="col-md-12">
												<h1 class="h1">Ultimos productos Añadido</h1>

												<table class="table table-bordered">
														<thead>
														<th>id</th>
														<th>imagen</th>
														<th>nombre</th>
														<th>categoria</th>
														<th>fecha</th>
														</thead>
														<tbody>
														<?php foreach ($producto_manager->getUltimosProductos() as $p):?>
														<tr>
																<td><?= $p->id ?></td>
																<td><img class="img-fluid " width="100px" height="100px" src="../uploads/products/<?= htmlspecialchars($p->imagen) ?>" alt=""></td>
																<td><?= $p->nombre;?></td>
																<td><?= $p->category ?></td>
																<td><?= $p->created_at ?></td>
														</tr>
														<?php endforeach;?>
														</tbody>

												</table>
										</div>
										<div class="col-md-12">

												<canvas id="speedChart" width="600" height="400"></canvas>


										</div>







						</div>



				</div>
				<!-- /.container-fluid -->
		</div>
</div>
<div id="dom-target" style="display: none;">
    <?php
    $estad = json_encode($pedido_manager->pedidosEstadisicas());
    echo htmlspecialchars($estad); /* You have to escape because the result
                                           will not be valid HTML otherwise. */
    ?>
</div>
<?php

?>
<?php include_once  '../application/parts/backend/footer.php'?>
