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
</div>
