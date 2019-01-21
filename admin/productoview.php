<?php
$title ="producto";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?>
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
								<?php flash('info') ?>

						</div>
            <?php
            $id = (int)$_GET['id'];
            //$p = $producto_manager->getProductDetail($id);
            $p= $producto_manager->getProductInfo($id);
            if($p->nombre === null){
                flash('info','Producto solicitado no existe ','danger');
                redirect('productos');
            }

            if(isset($_POST['submit']) && isset($_POST['caracteristica'])){

						foreach ($_POST['caracteristica'] as $id) {
							$cm->deleteCaracteristica($id);
						}
						flash('info','carcteristica eliminada ','danger');


                redirectWithParam('productoview','id='.$p->id);
						}
           ?>
						<div class="col-md-12">
								<h4>Ver producto</h4>
								<div class="row">
										<div class="col-md-6">
												<div class="card">
														<div class="card-body">
																<h5 class="lead text-success">Imagen del producto:</h5>
																<img src="../uploads/products/<?= $p->imagen ?> " class="img-fluid" alt=""  >
														</div>
												</div>
										</div>
										<div class="col-md-6">
												<div class="card">
                            <?php  $cara =  $cm->findByProduct($id); ?>

														<div class="card-body">
															<h4><?= $p->nombre ?></h4>

																<h5 class="mb-0">Estado del Producto: </h5>
																<p class="lead m-3 "><span class="badge <?= (($p->active=='1')?'bg-success':'bg-danger') ?> p-2 badge-pill"><?= \app\Producto::estado()[$p->active]?></span></p>

																<h5 class=" lead mb-0">Categoría: </h5>
																<p class=" m-3 "><i class="fa fa-list-alt text-success" aria-hidden="true"></i>
                                     <?= $p->category?>
																</p>
																<h5 class="mb-0 lead">Producto creado: </h5>
																<p class="text-muted m-3"><i class="fa fa-calendar"></i> <?= htmlspecialchars(dateFormatter($p->created_at))?></p>

																<h5 class=" lead mb-0">Total en venta : </h5>
																<p class="m-3 "><span class="badge badge-info badge-pill"><?= $p->en_venta ?></span></p>

														<h4 class="mt-2">Precio: <?= $p->precio ?> €</h4>
														</div>
												</div>
										</div>
								</div>

						</div>
				</div>

				<div class="row">
						<div class="col-md-12">
						<div class="card">
								<div class="card-header">
										<h4 class="card-title">Caracteristicas</h4>

								</div>
								<div class="card-body">
										<?php if(count($cara) > 0):?>
										<form method="post" action="productoview.php?id=<?=$p->id ?>" onsubmit="return confirm('¿seguro?')">
												<table class="table">
														<thead>
														<tr>
																<th scope="col">#</th>
																<th scope="col">nombre</th>
																<th scope="col">valor</th>
																<th></th>

														</tr>
														</thead>
														<tbody>

                            <?php	foreach($cm->findByProduct($id) as $c):?>

																<tr id="<?= $c->getId() ?>">
																		<td ><input type="checkbox" name="caracteristica[]" id="<?= $c->getId()?>" value="<?= $c->getId()?>" onchange="enableButton(<?= $c->getId() ?>)" <?= ((isset($_POST['caracteristica'])&&in_array($c->getId(),$_POST['caracteristica'])) ? "checked":"") ?>/></td>
																		<td><?= $c->getLabel() ?></td>
																		<td><?= $c->getValor() ?></td>
																		<td><a href="updatecaracteristica.php?id=<?= $c->getId()?>&producto=<?= $p->id?>">update</a></td>
																</tr>

                            <?php endforeach;?>
														</tbody>
												</table>
												<button type="submit" id="delete" class="btn btn-danger " name="submit" >Eliminar Seleccionados</button>

										</form>
<?php endif; ?>
								</div>
						</div>
						</div>
				</div>
				<div class="row">
						<div class="col-md-12">
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Descripción
												</h4>
										</div>
										<div class="card-body">
                        <?= $p->descripcion ?>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php' ;?>

<script type="application/javascript">
    $("#delete").hide();
    function enableButton(id) {

        if($("#"+id).attr('checked', true)){
            $("#delete").show();
        }else{
            $("#delete").hide();
        }




    }
</script>









