<?php
$title ="Clientes";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?>
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
								<?= flash('info');?>
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
													Gestion Clientes
												</h4>
										</div>
										<div class="card-body">
												<?php
                        $num_product_database = $usuario_manager->countClientes(2);
                        $url = 'clientes.php?a=a';
                        $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);
                        $pagination = new \App\Pagination($page,$num_product_database,10);
                        $clientes = $usuario_manager->getClientes($pagination->offset(),$pagination->getRecordsPerPage());



                        ?>
                        <?php if(!empty($clientes)):?>
												<table class="table table-hover table-striped table-responsive">
														<thead>
														<tr>
																<th scope="col">Nombre</th>
																<th scope="col">Apellido</th>
																<th scope="col">Email</th>
																<th scope="col">Estado</th>
																<th scope="col">
																</th>

														</tr>
														</thead>
														<tbody>
                            <?php foreach ($clientes as $cliente):?>
																<tr>

																		<td><?= $cliente->getNombre(); ?></td>
																		<td><?= $cliente->getApellido(); ?></td>
																		<td><a href="mailto:<?= htmlspecialchars($cliente->getEmail())?>"><?= $cliente->getEmail(); ?></a></td>
																		<td><span class="text-white p-1 <?= (($cliente->isActive() == '1')?'bg-success':'bg-danger') ?>"><?=$cliente->getEstadoOption()[$cliente->isActive()] ?></span></td>

																		<th scope="row">
																				<a href="vercliente.php?id=<?= $cliente->getId(); ?>" class="btn btn-primary btn-fill"><i class="fa fa-eye"></i></a>

																				<a href="editarcliente.php?id=<?= $cliente->getId(); ?>" class="btn btn-success btn-fill"><i class="fa fa-edit"></i></a>
																				<a href="deletecliente.php?id=<?= $cliente->getId(); ?>" class="btn btn-danger btn-fill" onclick=" return confirm('¿Qieres eliminar el cliente ?') "><i class="fa fa-trash"></i></a>
																		</th>
																</tr>
                            <?php endforeach;?>


														</tbody>
												</table>

												<div class="col-md-12">
                            <?php
                            echo $pagination->nav($url);


                            ?>

												</div>


                        <?php else: echo "<h1> No hay clientes </h1>"?>
                        <?php endif;?>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>