<?php
$title = 'Productos';
require_once '../application/parts/backend/header.php';?>
		<div class="content">
				<div class="container-fluid">
						<div class="row">
								<div class="col-md-12">
									<?php flash('info')?>
										<div class="card strpied-tabled-with-hover ">
												<div class="card-header ">
														<h4 class="card-title mb-4">productos de la tienda

																<a href="nuevoproducto.php" class="btn btn-primary btn-fill pull-right"><i class="fa fa-plus"></i> Nuevo producto</a>
														</h4>
                            <?php  $productos=$producto_manager->getAll(); ?>
														<hr>
												</div>
												<?php if($productos !== null):?>
												<div class="card-body table-full-width table-responsive  ">
														<table id="table_id"  class="table table-hover table-striped table-bordered">
																<thead>
																<tr>
																		<th>image</th>
																		<th>nombre</th>
																		<th>precio</th>
																		<th>Estado</th>
																		<th>Tipo oferta</th>
																			<th>Reducción</th>
																		<th>categoría</th>

																		<th>Accion</th>
																</tr>
																</thead>
																<tbody>
                                <?php foreach ($productos as $p):?>
																		<tr>
																				<td><img src="../uploads/products/<?= $p->imagen ?>" class="img-fluid " width="100px" height="100px">	</td>
																				<td><?= $p->nombre ?></td>

																				<td><?= precioES($p->precio) ?> €</td>

																				<td> <span class="text-white p-1 <?= (($p->active=='1')?'bg-success':'bg-danger') ?>"><?= ((new \app\Producto())->getEstadoOption()[$p->active]) ?></span></td>
																				<td><?= ($p->tipo_oferta !== null)?(new \app\Producto())->tipoOfertaOpcion()[$p->tipo_oferta]:'-' ?></td>
																				<td><?= (($p->precio_reducido!== null) ? $p->precio_reducido.' €':'-')?> </td>
																				<td><?= $p->category ?></td>
<!--																				 $p->created_at?></td>-->
																				<td>
																						<a href="productocaractiristicas.php?id=<?= $p->id?>" title="Caracteristicas" class="btn btn-success btn-fill m-1"><i class="fa fa-cog"></i></a>

																						<a href="productoedit.php?id=<?= $p->id?>" title="Editar" class="btn btn-info  btn-fill m-1"><i class="fa fa-pencil"></i></a>
																						<a href="productoview.php?id=<?= $p->id ?>" title="Ver" class="btn btn-primary btn-fill m-1"><i class="fa fa-eye"></i></a>
																						<a href="productodelete.php?id=<?= $p->id ?>" title="Eliminar" class="btn btn-danger btn-fill m-1" onclick="return confirm('¿Seguro quires eliminar el producto ?') "><i class="fa fa-trash"></i></a>
																				</td>
																		</tr>
                                <?php endforeach;?>
																</tbody>

														</table>

												</div>

												<?php else:echo'<h3 class="display-4">No Hay Productos </h3>'; endif;?>
		</div>


				</div>
		</div>
				</div>
		</div>

<?php include_once  '../application/parts/backend/footer.php'?>