<?php
$title = "Carrito";
require_once 'application/parts/frontend/header.php' ;

?>
<div class="container">
		<div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
				<div class="col-md-9 col-sm-12 col-12 wrapper">
						<div class="card card-form  ">
								<div class="card-header card-header-primary">
										<h4 class="card-title"><?= $title ?></h4>

								</div>
								<div class="card-body">
                    <?php
                    flash('info');
                    $products = $cart->getCrrito();
                    if(isset($_COOKIE['carrito'])){
                        $c = unserialize($_COOKIE['carrito']);
										}
                    ?>
										<div class="table-responsive cart_info">
                        <?php if(count($products) > 0 && count($c) > 0 ):?>

														<table class="table table-condensed">
																<thead>
																<tr class="cart_menu">
																		<th class="">producto</th>
																		<th class=""></th>
																		<th class="">Precio</th>
																		<th class="">Quantidad</th>
																		<th>rebaja</th>
																		<th class="">Total</th>
																		<th></th>
																</tr>
																</thead>
																<tbody>


                                <?php foreach ($products as $product):?>
																		<tr>
																				<td class="cart_product">
																						<img src="uploads/products/<?= $product->getImagen() ?>" alt="" class=" img-fluid "  >
																				</td>
																				<td class="cart_description">
																						<p><a href="verproducto.php?id=<?= $product->getId() ?>"><?= $product->getNombre() ?></a></p>

																				</td>
																				<td class="cart_price">
																						<p><?= $product->getPrecio() ?> €</p>
																				</td>
																				<td class="cart_quantity">
																						<div class="col-md-9">
																								<form method="post" action="updatecrrito.php">
																										<input type="number" id="qty" name="qty" min="1" max="10" autocomplete="off" size="2" value="<?= $c[$product->getId()]; ?>">
																										<input type="hidden" name="prodict_id" class="form-control" value="<?= $product->getId(); ?>">
																										<button type="submit" name="submit" class="btn btn-primary btn-update mt-2">
																												<i class="fa fa-refresh" aria-hidden="true"></i>
																										</button>
																								</form>
																						</div>
																				</td>
																				<td><?= (($product->getPrecioReducido() !== null) ? $product->getPrecioReducido().' €' : 'No') ?></td>
																				<td class="cart_total">
																						<p class="cart_total_price"><?= $carrito_manager->precioTotal($product,$c)?> €</p>
																				</td>
																				<td class="cart_delete">
																						<a class="cart_quantity_delete btn btn-danger" href="deletproductocarrito.php?id=<?= $product->getId() ?>" ><i class="fa fa-times"></i></a>
																				</td>
																		</tr>
                                <?php endforeach;?>

																<tr>
																		<td>  </td>
																		<td>  </td>

																		<td><h3>Total</h3></td>
																		<td>  </td>
																		<td class="text-right"><h5><strong><?= $cart->total(); ?> €</strong></h5></td>
																</tr>



																</tbody>
														</table>

												<div class="col-md-12 col-12 col-sm-12">
														<div class="total_area">
																<ul class="">
																<li >Total sin IVA  <span><?= $cart->total(); ?> €</span></li>
																<li >IVA  <span><?= (\app\Cart::_IVA * 100); ?> %</span></li>
																<li >Total con IVA  <span><?= $cart->totalIva(); ?> €</span></li>
														</ul>
														</div>
														<a href="index.php" class="btn btn-movilex pull-left" >
																seguir comprando
														</a>
														<a  href="procesarcarrito.php" class="btn btn-success pull-right" >
																Procesar Carrito
														</a>
												</div>
                        <?php else: echo "<h3>Carrito vacio</h3>"?>
                        <?php endif; ?>


										</div>
								</div>
						</div>

				</div>
		</div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>