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
										<table class="table table-bordered" >
												<thead>
												<th>id </th>
												<th>Nombre </th>
												<th>padre</th>
												<th>Estado</th>
												<th></th>
												</thead>
												<tbody>
												<?php foreach ($categoria_manager->displayCategorias() as $categoria):?>
														<tr class="bg-dark text-white">
																<td><?= $categoria->getId() ?></td>
																<td ><?= $categoria->getNombre() ?></td>
																<td >-</td>
																<td ><i class="<?= (($categoria->getActivo()== '1')?'fa fa-check-circle  text-success':'fa fa-ban text-danger' ) ?> "></i> <?= \app\Categoria::getEstadoOption()[$categoria->getActivo()] ?></td>
																<td>
																		<a href="categoriadetail.php?id=<?= $categoria->getId() ?>"  class="btn btn-light "><i class="fa fa-search-plus"></i></a>
																</td>
														</tr>
												<?php if(count($categoria->getChilds()) > 0):?>
														<?php foreach ( $categoria->getChilds() as $c):?>
																<tr>
																		<td><?= $c->getId() ?></td>
																		<td><?= $c->getNombre() ?></td>
																		<td ><?= $categoria->getNombre()?></td>
																		<td ><i class="<?= (($c->getActivo()== '1')?'fa fa-check-circle  text-success':'fa fa-ban text-danger' ) ?> "></i> <?= \app\Categoria::getEstadoOption()[$c->getActivo()] ?></td>
																			<td><a href="categoriadetail.php?id=<?= $c->getId() ?>"  class="btn btn-light text-info"><i class="fa fa-search-plus"></i></a></td>

																</tr>
														<?php endforeach;?>
													<?php endif;?>
												<?php endforeach;?>
												</tbody>
										</table>
								</div>
						</div>
				</div>
<?php include_once  '../application/parts/backend/footer.php'?>