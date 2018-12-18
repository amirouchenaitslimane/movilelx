<?php
$title = "Quiénes Somos";
require_once 'application/parts/frontend/header.php';

?>
<div class="container">
    <div class="row">
        <?php
        include_once 'application/parts/frontend/categories.php';
        ?>

        <div class="col-md-7">

						<div class="product-block">
								<h3>Productos nuevos</h3>
								<div class="row">

<?php
//crear la logica
$clientes_por_pagina = 3;
$numero_clientes_db = $categoria_manager->contProductsCategory($_GET['id']);


$page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);

$start = ($page  - 1)*$clientes_por_pagina;
$total_pages = ceil($numero_clientes_db / $clientes_por_pagina);



$prod = $categoria_manager->getProductsCategory($_GET['id'],$start,$clientes_por_pagina)



?>

										<?php if(count($prod) > 0):?>
										<?php foreach ($prod as $products):?>
												<div class="col-md-4">
														<div class="card text-xs-center"> <img class="card-img-top" src="assets/images/<?= $products->url ?>" alt="<?= $products->alt ?>">
																<div class="card-block">
																		<h5 class="card-title"><?= $products->nombre ?></h5>
																	<p><?= $products->descripcion ?></p>
																		<p class="card-text price"><?= $products->precio?> €</p>
																		<a href="#" class="btn btn-success">Add to Cart</a> </div>
														</div>
												</div>
										<?php endforeach;?>


										<ul class="pagination">
                        <?php
                        if($numero_clientes_db > $clientes_por_pagina) {

                        		if ($page > 1) {
                                ?>
																<li class="page-item"><a class="page-link"
																												 href="categoria.php?id=<?= $_GET['id'] ?>&page=<?= $page - 1 ?>">Previous</a>
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
																												 href="categoria.php?id=<?= $_GET['id'] ?>&page=<?= $page + 1 ?>">Next</a>
																</li>

                                <?php
                            }
                        }

                        ?>

										</ul>
										<?php else: echo "<h1>NO HAY RESULTADOS</h1>";endif;?>

								</div>
						</div>




        </div>
<div class="col-md-2 card-form"></div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
