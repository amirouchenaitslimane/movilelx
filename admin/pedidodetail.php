<?php
$title = "Pedido Detail";
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
            <h1>pedido </h1>
            <hr>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">
                <div class="col-md-12 mt-3">
                <div class="row">
                <div class="col-md-8">
                     <div class="card">
                         <div class="card-body">
                             <?php

                             $cliente = $usuario_manager->getByPedido($_GET['id']);

                           if($cliente->getId() === null){
                           		redidect('pedidos');
													 }

                             ?>
														 <div class="col-md-12">
																 <h3 class="lead">Estado Actual Del Pedido <strong class="bg-<?= $cliente->getPedidos()->getEstado()?>"> <?= $cliente->getPedidos()::getEstadoOption()[$cliente->getPedidos()->getEstado()] ?></strong></h3>
																 <hr>
																 <div class="mt-4"><?php
																		 if(isset($_POST['submit'])){
																		 DEBUG($_POST);
																		 }
?>
																		 <div class="jumbotron " style="background: #72d1f6;color: white;">
																		<form action="pedidodetail.php?id=<?= $_GET['id'] ?>" method="post">
																				<div class="form-group">
																						<label for="estado">Cambiar estado del pedido</label>
																						<select name="estado" id="estado" class="form-control">
                                                <?= \app\Pedido::getEstadoOptionList($cliente->getPedidos()->getEstado()) ?>
																						</select>
																				</div>
																				<button name="submit" type="submit" class="btn btn-dark pull-right">Validar</button>
																		</form>

																</div>
																 </div>
														 </div>

														 <div class="col-md-12 ">

																 <h3 class="lead mt-4 mb-4">Información Del Pedido</h3>


																<table class="table table-bordered">
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
														 <div class="col-md-12 ">

																 <h3 class="lead mt-4 mb-4">Productos comprados</h3>


																 <table class="table table-bordered">
																		 <thead>
																		 <th></th>
																		 <th>Producto</th>
																		 <th>precio</th>
																		 <th>cantidad</th>
																		 <th>precio compra</th>

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
																						 <td><?= $pedido->getPrecioCompra()?></td>
																				 </tr>
																				 <?php endforeach ;?>


																		 </tbody>
																 </table>
														 </div>
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
        <?php include_once  '../application/parts/backend/footer.php'?>
