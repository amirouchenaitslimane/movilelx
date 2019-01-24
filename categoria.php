<?php
$title = "Categorias";
require_once 'application/parts/frontend/header.php';

?>


<div class="container">
		<div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
				<div class="col-md-9 col-sm-12 col-12 wrapper">
					<div class="row">
							<div class="col-md-12">
              <?php
              $c = $categoria_manager->getOneCategory($_GET['id']);
              if($c== null){
              		redirect('index');
							}
              if($c->getActivo() !=='0'):?>
							<div class="jumbotron jumbotron-category">
									<h3><?= $c->getNombre() ?> </h3>
									<p><?= $c->getDescripcion() ?></p>
							</div>
									<div class="col-md-12">

													<?php
													flash('info');
													flash('error');
													?>

									</div>
							</div>

									<div class="col-md-12 col-sm-12 col-12">
											<div class="row">
                      <?php
                      $num_product_database = $categoria_manager->contProductsCategory($_GET['id']);
											$url = 'categoria.php?id='.htmlspecialchars($_GET['id']);
                      $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);
											$pagination = new \App\Pagination($page,$num_product_database,6);
											$prod = $categoria_manager->getProductsCategory($_GET['id'],$pagination->offset(),$pagination->getRecordsPerPage());


											?>
                      <?php if(count($prod) > 0):?>
											<?php foreach ($prod as $products):?>
															<div class="col-sm-4 col-md-4 col-6">
																	<div class="product-image-wrapper">
																			<div class="single-products">
																					<div class="productinfo text-center">

																							<span class="p-2 indicator <?=($products->tipo_oferta !== '0')?(new \app\Producto())->tipoOfertaOpcion()[$products->tipo_oferta]:'d-none' ?>"><?= (new \app\Producto())->tipoOfertaOpcion()[$products->tipo_oferta]; ?></span>
																							<img src="uploads/products/<?= $products->imagen ?>" alt="" class="img-fluid" />
																							<h6 class="lead title"><?= $products->nombre; ?> </h6>
																							<?php if($products->precio_reducido !== null):?>
																									<p><span class="precio"><?= $products->precio_reducido; ?> €</span></p>
																									<span class="dashed text-muted"><?= $products->precio ?>€</span> <span class="tt"><?= porcentaje($products->precio,$products->precio_reducido)?></span>
																								<?php else:?>
																									<p><span class="precio"><?= $products->precio; ?> €</span></p>

                                              <?php endif;?>

																					<p>
																							<a href="verproducto.php?id=<?= $products->id ?>&cat=<?= $_GET['id'] ?>" class="btn btn-movilex  btn-success "> Ver</a>

																							<a href="addcard.php?product_id=<?= $products->id ?>&cat=<?= $_GET['id'] ?>" class="btn btn-default add-to-cart btn-movilex"> <i class="fa fa-shopping-cart"></i> Añadir</a>

																					</p>
																					</div>

																			</div>
																	</div>
															</div>

											<?php endforeach;?>

											<?php endif;?>

									</div>
									<div class="col-md-12">

                          <?php
                          echo $pagination->nav($url);


                          ?>


									</div>
									</div>
					</div>


				</div>
		</div>
</div>
<?php endif;?>
<?php require_once 'application/parts/frontend/footer.php' ?>
