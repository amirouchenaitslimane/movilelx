<?php
$title ="Categorias";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?>
		<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
		<div class="card">
		<div class="card-header">
				<h4 class="card-title">
						Ver cliente
				</h4>
		</div>
				<div class="card-body">
            <?php
            $cliente = $usuario_manager->findUsuario($_GET['id']);
            if ($cliente == null){
            		flash('info','cliente solicitado no existe','danger');
                redirect('clientes');
            }
            ?>
						<div class="jumbotron bg-light">
								<p class="mb-0">Correo Electronico: </p>
								<p class="text-info "><a href="mailto:<?= $cliente->getEmail()?>"><i class="fa fa-envelope"></i> <?= htmlspecialchars($cliente->getEmail())?></a></p>
								<p class="mb-0 mt-2">Cuenta Registrada: </p>
								<p class="text-muted "><i class="fa fa-calendar"></i> <?= htmlspecialchars($cliente->getCreated())?></p>
								<p class="mb-0 mt-2">Gasto Total Del Cliente: </p>
								<p class=" "><span class="badge badge-success badge-pill"> <?= htmlspecialchars($pedido_manager->gastosCliente($cliente->getId()))?> € </span></p>

								<h3 class="lead">Derección de envio</h3>

								<p class="mb-0">Direccón: </p>
								<p class="text-info "><i class="fa fa-map-marker "></i> <?= htmlspecialchars($cliente->getDireccion())?></p>
								<p class="lead">
										<span class="text-info ">Nombre: </span><?= $cliente->getNombre()?>
								</p>
								<p class="lead">
										<span class="text-info ">Apellido: </span><?= $cliente->getApellido()?>
								</p>
						</div>
                <?php $pedidos= $pedido_manager->getPedido($cliente->getId());
									if(!empty($pedidos)) : ?>
								<h4>lista de pedidos</h4>
								<table class="table table-hover table-striped">
										<thead>
										<th>id</th>
										<th>estado</th>
										<th>fecha</th>
										<th></th>
										</thead>
										<tbody>
                    <?php foreach ($pedidos as $pedido):?>
												<tr>
														<td><?= $pedido->getId() ?></td>
														<td><?= \app\Pedido::getEstadoOption()[ $pedido->getEstado()]?></td>
														<td><?= dateFormatter($pedido->getFecha()) ?></td>
														<td><a href="pedidodetail.php?id=<?= $pedido->getId() ?>" class="btn btn-info pull-right btn-fill"><i class="fa fa-eye"></i></a></td>
												</tr>
                    <?php endforeach;?>
										</tbody>
								</table>
						<?php else: echo "<h4 class='text-white bg-danger p-2'>No tiene pedidos</h4>"; ?>
									<?php endif;?>


		</div>
		</div>
						</div>
				</div>
		</div>
		</div>


<?php include_once  '../application/parts/backend/footer.php'?>