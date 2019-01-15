
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
                    $c = unserialize($_COOKIE['carrito']);

                    ?>
										<div class="table-responsive cart_info">
                        <?php if(count($products) > 0):?>

														<table class="table table-condensed">
																<thead>
																<tr class="cart_menu">
																		<td class="">img producto</td>
																		<td class=""></td>
																		<td class="">Precio</td>
																		<td class="">Quantidad</td>
																		<td class="">Total</td>
																		<td></td>
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
																										<input type="number" name="qty" min="1" class="form-control" value="<?= $c[$product->getId()]; ?>">
																										<input type="hidden" name="prodict_id" class="form-control" value="<?= $product->getId(); ?>">
																										<button type="submit" name="submit" class="btn btn-primary btn-update mt-2">
																												<i class="fa fa-refresh" aria-hidden="true"></i>
																										</button>
																								</form>
																						</div>
																				</td>
																				<td class="cart_total">
																						<p class="cart_total_price"><?= ($product->getPrecio() * $c[$product->getId() ]) ?> €</p>
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
																<tr>
																		<td>
																				<a href="index.php" class="btn btn-movilex" >
																						seguir comprando
																				</a></td>
																		<td></td>
																		<td>  </td>

																		<td></td>

																		<td>
																				<a  href="procesarcarrito.php" class="btn btn-success " >
																						Procesar Carrito
																				</a></td>


																</tr>


																</tbody>
														</table>

                        <?php else: echo "<h3>Carrito vacio</h3>"?>
                        <?php endif; ?>


										</div>
								</div>
						</div>

				</div>
		</div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>