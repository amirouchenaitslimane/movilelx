<div class="col-md-3 col-sm-12 col-12">
		<div class="left-sidebar">
				<h3 >Categorias </h3>
				<div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php foreach ($categoria_manager->displayCategorias() as $categoria): ?>
            <?php if(!empty($categoria->getChilds())):?>
						<div class="panel panel-default">
								<div class="panel-heading">


										<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#accordian" href="#<?=$categoria->getNombre() ?>">
														<span class="badge pull-right"><?= (!empty($categoria->getChilds()) ? '<i class="fa fa-plus"></i>':"") ?></span>
                            <?= $categoria->getNombre();?>
												</a>
										</h4>
								</div>

								<div id="<?= $categoria->getNombre(); ?>" class="panel-collapse collapse show">
										<div class="panel-body">

												<ul>
														<li><a href="categoria.php?id=<?= $categoria->getId() ?>">Todos </a></li>
                            <?php foreach ($categoria->getChilds() as $child):?>


																<li><a href="categoria.php?id=<?= $child->getId() ?>"><?= $child->getNombre(); ?></a></li>

                            <?php endforeach;?>
												</ul>
										</div>
								</div>
						</div>
							<?php endif;?>
						<?php endforeach;?>
				</div><!--/category-products-->



		</div>
		<div class="col-12 col-sm-12 col-12 order-1">
				<div class="row">
        <?php
				$lastAddedProducts = $producto_manager->lastAdded();
				if(($lastAddedProducts !== null )&&count($lastAddedProducts) > 0):
						foreach ($lastAddedProducts as $product):?>

								<div class="col-sm-4 col-md-12 col-6">
										<div class="product-image-wrapper">
												<div class="single-products">
														<div class="productinfo text-center">

																<span class="p-2 indicator <?=($product->tipo_oferta !== '0')?(new \app\Producto())->tipoOfertaOpcion()[$product->tipo_oferta]:'d-none' ?>"><?= (new \app\Producto())->tipoOfertaOpcion()[$product->tipo_oferta]; ?></span>
																<img src="uploads/products/<?= $product->imagen ?>" alt="" class="img-fluid" />
																<h6 class="lead title"><?= $product->nombre_producto; ?> </h6>
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
				<?php endif;?>
		</div>
		</div>


</div>
