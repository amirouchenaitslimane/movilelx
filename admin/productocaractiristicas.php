<?php
$title ="Caracteristicas";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}?>
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
								<?php
								$p= $producto_manager->getProductDetail($_GET['id']);
								if($p == null){
								flash('info','El productos solicitado ya no existe','alert-info');
								redirect('productos');
								}


								?>
								<div class="card ">
										<div class="card-header ">
												<h4 class="card-title">Caracteristicas Del Producto</h4>
												<p class="text-muted">Ver más informaciones del producto <a href="productoview.php?id=<?= $p->getId() ?>" class="text-success"><?= $p->getNombre() ?></a> <strong class=" p-2 text-white <?= (($p->getActive() == '1')?'bg-success ':'bg-danger') ?>"> <?= \app\Producto::estado()[$p->getActive()]?></strong></p>
												<p class="lead">Contiene <?= count($p->getCaracteristicas()) ?> caractristicas</p>

										</div>
										<div class="card-body">
                        <?php
                        $producto = $producto_manager->getProduct($_GET['id']);
                        if(isset($_POST['submit'])){
                            $caracs = arrayHelperCaracteristicas($_POST);

                          if(empty($caracs)){
                              echo displayError(['No has creado ninguna caracteristica']);

                          }else{
                              $objs_carac = [];
                              foreach ($caracs as $carac) {
                                  $c =  new \app\Caracteristicas($carac);
                                  $c->setProductId($producto->getId());
                                  $objs_carac[] =$c;
                              }
                              $cm->addCaracteristicas($objs_carac);
                              redirectWithParam('productoview','id='.$producto->getId());
                              //header('location:productoview.php?id='.$producto->getId());

                            	}
													}




                        ?>

												<div id="form_div">
														<form method="post" action="productocaractiristicas.php?id=<?= $producto->getId() ?>">
																<div class="col-md-8">
																		<table id="employee_table" class="table table-striped">
																				<tr id="row1">
																						<td><input class="form-control" type="text" name="label[]" placeholder="Nombre de la cacteristica" required></td>
																						<td><input class="form-control" type="text" name="valor[]" placeholder="Valor de la caracteristica" required></td>
																				</tr>
																		</table>
																		<button type="button" onclick="add_row();" class="btn btn-success btn-fill pull-left"><i class="fa fa-plus"></i> Más caracteristicas</button>
																		<input type="submit" name="submit" value="Crear" class="btn  btn-primary btn-fill pull-right">

																</div>
														</form>

												</div>
								</div>
						</div>
				</div>

		</div>
				<div class="row">
						<div class="col-md-12">
								<div class="card ">
										<div class="card-header ">
												<h4 class="card-title">Caracteristicas:</h4>
												<hr>
										</div>
										<div class="card-body">
												<table class="table table-striped table-hover table-bordered">
														<thead>
														<tr>
																<th scope="col">#</th>
																<th scope="col">nombre</th>
																<th scope="col">valor</th>
																<th></th>

														</tr>
														</thead>
														<tbody>
                            <?php foreach ($p->getCaracteristicas() as $caracteristica):?>
																<tr>
																		<td><?= $caracteristica->getId() ?></td>
																		<td><?= $caracteristica->getLabel() ?></td>
																		<td><?= $caracteristica->getValor() ?></td>
																</tr>

                            <?php endforeach; ?>
														</tbody>
												</table>
										</div>
								</div>

						</div>
				</div>
</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>


