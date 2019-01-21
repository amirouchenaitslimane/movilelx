<?php
$title ="Usuarios";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || !$_SESSION['user']->isSuperAdmin()){
    header('location:/movilelx/index.php');
}

?>

<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
                <?php
                flash('info');

                ?>
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">Gestión de Usuario <a href="nuevousuario.php" class="btn btn-warning btn-fill pull-right"><i class="fa fa-plus "></i> Nuevo Empleado</a></h4>
										</div>
										<div class="card-body">
                        <?php

                        $numero_administradores_db = $usuario_manager->countClientes(1);
                        $url = 'usuarios.php?a=a';
                        $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);
                        $pagination = new \App\Pagination($page,$numero_administradores_db,10);
                        $adminstradores = $usuario_manager->getAdminstradores($pagination->offset(),$pagination->getRecordsPerPage());
                       	if(!empty($adminstradores)):?>
														<table class="table">
																<thead>
																<tr>
																		<th scope="col">Nombre</th>
																		<th scope="col">Apellido</th>
																		<th scope="col">Email</th>
																		<th scope="col">Role</th>
																		<th scope="col">Estado</th>
																		<th scope="col">
																		</th>
																</tr>
																</thead>
																<tbody>
                                <?php foreach ($adminstradores as $adminstrador):?>
																		<tr>
																				<td><?= $adminstrador->getNombre(); ?></td>
																				<td><?= $adminstrador->getApellido(); ?></td>
																				<td><?= $adminstrador->getEmail(); ?></td>
																				<td><?= $adminstrador->getRoleOption()[$adminstrador->getRole()] ?></td>
																				<td><strong class="p-1 text-white lead <?= (($adminstrador->isActive() == 1 )? 'bg-success':'bg-danger')?>"><?= $adminstrador->getEstadoOption()[$adminstrador->isActive()] ?></strong></td>
																				<th scope="row">
																						<a href="veradministradores.php?id=<?= $adminstrador->getId(); ?>" class="btn btn-success btn-fill"><i class="fa fa-eye"></i></a>

																						<a href="editaradministradores.php?id=<?= $adminstrador->getId(); ?>" class="btn btn-primary btn-fill"><i class="fa fa-edit"></i></a>
																						<a href="deletadministradores.php?id=<?= $adminstrador->getId(); ?>" class="btn btn-danger btn-fill" onclick=" return confirm('¿Qieres eliminar el adminstrador ?') "><i class="fa fa-trash"></i></a>
																				</th>
																		</tr>
                                <?php endforeach;?>
																</tbody>
														</table>
														<div class="col-md-12"><?php echo $pagination->nav($url);?></div>
                        		<?php else: echo "<h1> No hay adminstradores </h1>" ; endif;?>

										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>