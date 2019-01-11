<?php
$title = "Categorias";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:'._SERVER.'index.php');
}
?>
<div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
		<div id="content-wrapper">
				<div class="container-fluid">
						<!-- Page Content -->
						<h1>Gestión de Categorías</h1>
						<hr>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
						<div class="row">
								<div class="col-md-12">
										<a href="nuevacategoria.php" class="btn btn-primary"><i class="fa fa-plus"></i> Nueva categoria</a>
								</div>

								<div class="col-md-12 mt-3">
										<table class="table" border="1">
												<thead>
												<tr>
														<th>Nombre padre</th>
														<th>Hijos</th>

												</tr>
												</thead>
												<tbody>
                        <?php foreach ($categoria_manager->displayCategorias() as $cate):?>
														<tr>
																<td rowspan="<?= count($cate->getChilds())?>"><?= $cate->getNombre(); ?>  <a href="categoriadetail.php?id=<?= $cate->getId() ?>" class=" btn btn-success"><i class="fa fa-eye"></i> ver</a></td>
																<td><?php	foreach ($cate->getChilds() as $child):?>
																				<ul>
																						<li><?= $child->getNombre() ?>- <a href="categoriadetail.php?id=<?= $child->getId() ?>" class="btn btn-success"><i class="fa fa-eye"></i></a></li>

																				</ul>
                                    <?php endforeach; ?></td>
														</tr>

                        <?php endforeach; ?>


												</tbody>
										</table>
								</div>
						</div>
				</div>
<?php include_once  '../application/parts/backend/footer.php'?>