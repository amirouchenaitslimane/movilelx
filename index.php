
<?php
$title = "index";
require_once 'application/parts/frontend/header.php' ;

?>
<div class="container">
		<div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
				<div class="col-md-9 col-sm-12 col-12 wrapper">

						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
										<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
										<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
                    <?php $p = $categoria_manager->getParents();?>

										<div class="carousel-item active">

												<h3>Ofertas</h3>
												<p>Descubre nu<span>estras ofertas de movilelx</span></p>
												<a href="ofertas.php" class="btn btn-success link-car">Acceder</a>
										</div>

                    <?php foreach ($p as $cparent):?>
												<div class="carousel-item ">

														<h3><?= $cparent->getNombre(); ?></h3>
														<p><?= $cparent->getDescripcion(); ?></p>
														<a href="categoria.php?id=<?= $cparent->getId() ?>" class="btn btn-success link-car">Ver la oferta</a>
												</div>
                    <?php endforeach;?>

								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
								</a>
						</div>
						<div class="jumbotron text-center oferta">
								<h3 class="lead">Descubre nu<span>estras ofertas de movilelx</span></h3>
								<a href="ofertas.php" class="btn btn-light text-info">Accede aqui !</a>
						</div>
						<div class="col-md-12 col-sm-12 col-12">
								<div class="row">
                    <?php
                    $products = $producto_manager->promo();
                    foreach ($products as $product):?>
												<div class="col-sm-4 col-md-4 col-6">
														<div class="product-image-wrapper">
																<div class="single-products">
																		<div class="productinfo text-center">

																				<span class="p-2 indicator <?=($product->tipo_oferta !== '0')?(new \app\Producto())->tipoOfertaOpcion()[$product->tipo_oferta]:'d-none' ?>"><?= (new \app\Producto())->tipoOfertaOpcion()[$product->tipo_oferta]; ?></span>
																				<img src="uploads/products/<?= $product->imagen ?>" alt="" class="img-fluid" />
																				<h6 class="lead title"><?= $product->nombre; ?> </h6>
                                        <?php if($product->precio_reducido !== null):?>
																						<p><span class="precio"><?= $product->precio_reducido; ?> €</span></p>
																						<span class="dashed text-muted"><?= $product->precio ?>€</span> <span class="tt"><?= porcentaje($product->precio,$product->precio_reducido)?></span>
                                        <?php else:?>
																						<p><span class="precio"><?= $product->precio; ?> €</span></p>

                                        <?php endif;?>

																				<p>
																						<a href="verproducto.php?id=<?= $product->id ?>" class="btn btn-movilex  btn-success "> Ver</a>

																						<a href="addcard.php?product_id=<?= $product->id ?>" class="btn btn-default add-to-cart btn-movilex"> <i class="fa fa-shopping-cart"></i> Añadir</a>

																				</p>
																		</div>

																</div>
														</div>
												</div>

                    <?php endforeach;?>

								</div>
						</div>

				</div>
		</div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>