<?php
$title = "Categorias";
require_once 'application/parts/frontend/header.php';

?>

<?php
$title = "index";
require_once 'application/parts/frontend/header.php' ;

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
              		redidect('index');
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
                      //crear la logica
                      $clientes_por_pagina = 3;
                      $numero_clientes_db = $categoria_manager->contProductsCategory($_GET['id']);
                      $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);
                      $start = ($page  - 1)*$clientes_por_pagina;
                      $total_pages = ceil($numero_clientes_db / $clientes_por_pagina);
                      $prod = $categoria_manager->getProductsCategory($_GET['id'],$start,$clientes_por_pagina);
                      ?>
                      <?php if(count($prod) > 0):?>
											<?php foreach ($prod as $products):?>
															<div class="col-sm-4 col-md-4 col-6">
																	<div class="product-image-wrapper">
																			<div class="single-products">
																					<div class="productinfo text-center">
<!--																							<span class="indicator rebaja">promoción</span>-->
																							<img src="uploads/products/<?= $products->imagen ?>" alt="" class="img-fluid" />
																							<h6 class="lead title"><?= $products->nombre; ?> </h6>
																							<p><span class="precio"><?= $products->precio; ?> €</span></p>
<!--																							<span class="dashed text-muted">$160</span> <span class="tt">16%</span>-->

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
											<div class="pagination-area">
											<ul class="pagination">
                          <?php
                          if($numero_clientes_db > $clientes_por_pagina) {

                              if ($page > 1) {
                                  ?>
																	<li class="page-item"><a class="page-link"
																													 href="categoria.php?id=<?= $_GET['id'] ?>&page=<?= $page - 1 ?>">Atrás</a>
																	</li>

                                  <?php
                              }else{
                                  $page = 1;
                              }
                              ?>

                              <?php for ($i = 1; $i < $total_pages; $i++): ?>

                                  <?php if ($i === $page): ?>
																			<li class="page-item active"><a class="page-link "><?= $i; ?></a></li>

                                  <?php else: ?>
																			<li class="page-item"><a class="page-link"
																															 href="categoria.php?id=<?= $_GET['id'] ?>&page=<?= $i ?>"><?= $i; ?></a>
																			</li>

                                  <?php endif; ?>

                              <?php endfor; ?>
                              <?php
                              if ($page < $total_pages) {
                                  ?>
																	<li class="page-item"><a class="page-link"
																													 href="categoria.php?id=<?= $_GET['id'] ?>&page=<?= $page + 1 ?>">Seguiente</a>
																	</li>

                                  <?php
                              }
                          }

                          ?>

											</ul>
											</div>
									</div>
									</div>
					</div>


				</div>
		</div>
</div>
<?php endif;?>
<?php require_once 'application/parts/frontend/footer.php' ?>
