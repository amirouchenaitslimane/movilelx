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
                <?php

            if(isset($_GET['id'])){
                $user = $usuario_manager->findUsuario($_GET['id']);

                if($user === null){
                    redirect('usuarios');
                }

            }else{
                redirect('usuarios');
            }
            ?>


								<div class="col-md-8">
										<div class="card">
												<div class="card-header">
														<h4 class="card-title">Cambiar Datos Del Empleado</h4>
												</div>
												<div class="card-body">
                            <?php
                            if(isset($_POST['submit'])){
                                $user->setNombre(htmlspecialchars(trim($_POST['nombre'])));
                                $user->setApellido(htmlspecialchars(trim($_POST['apellido'])));
                                if($_POST['email'] !== $user->getEmail())
																{
																		$u = $usuario_manager->getByEmail(htmlspecialchars($_POST['email']));
																		if($u !== null){
																				$user->addError('El email introducido ya existe en la base de datos');
																		}else{
                                        $user->setEmail(htmlspecialchars(trim($_POST['email'])));
																		}
																}
                                $user->setDireccion(htmlspecialchars(trim($_POST['direccion'])));
                                $user->setRole(htmlspecialchars(trim($_POST['role'])));
                                $user->setActive(htmlspecialchars(trim($_POST['active'])));

                                if(empty($user->getErrors())){
                                    $usuario_manager->Update($user);
                                    flash('info','Has cambiado el usuario ','info');
                                    redirect('usuarios');
                                }else{
                                    echo displayError($user->getErrors());
                                }
                            }
                            ?>
														<form method="POST" action="<?= $_SERVER['PHP_SELF'].'?id='.$_GET['id'] ?>">
																<div class="form-group">
																		<label for="nombre">Nombre</label>
																		<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre ..." value="<?= $user->getNombre() ;?>">
																</div>
																<div class="form-group">
																		<label for="apellido">Apellido</label>
																		<input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?= $user->getApellido();?>">
																</div>
																<div class="form-group">
																		<label for="direccion">Dirección</label>
																		<input type="text" name="direccion" class="form-control" id="direccion" placeholder="Direccion" value="<?= $user->getDireccion();?>">
																</div>
																<div class="form-group">
																		<label for="email">Correo</label>
																		<input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="<?= $user->getEmail();?>">
																</div>
																<div class="form-group">
																		<label for="role">Role</label>
																		<select class="form-control" id="role" name="role">
																				<option value="<?= $user->getRole()?>"><?= $user->getRoleOption()[$user->getRole()]?></option>
																				<option value="2">CLIENTE</option>
																				<option value="1">ADMIN</option>
																		</select>
																</div>
																<div class="form-group">
																		<label for="activo">Estado</label>
																		<select name="active" id="activo" class="form-control">
																				<option value="1" <?= ($user->isActive() == 1 ? "selected":"") ?> >Activo</option>
																				<option value="0" <?= ($user->isActive() == 0 ? "selected":"") ?>>Inactivo</option>
																		</select>
																		<small id="activo" class="form-text text-muted">si no quieres desabilitar acceso a ese Admin ponlo en 	INACTIVO </small>

																</div>
																<input type="submit" name="submit" class="btn btn-primary" value="Submit">
														</form>


												</div>
										</div>
								</div>



								<div class="col-md-4">
										<div class="card card-user">
												<div class="card-image">
														<img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
												</div>
												<div class="card-body">
														<h3 class="lead">Informacion Del Empleado </h3>
														<hr>
														<p class="mb-0">Correo Electronico: </p>
														<p class="text-info "><a href="mailto:<?= $user->getEmail()?>"><i class="fa fa-envelope"></i> <?= htmlspecialchars($user->getEmail())?></a></p>
														<p class="mb-0 mt-2">Fecha de inicio: </p>
														<p class="text-muted "><i class="fa fa-calendar"></i> <?= htmlspecialchars($user->getCreated())?></p>


														<p class="mb-0 mt-2">Estado: </p>
														<p class="text-white badge p-2 <?= (($user->isActive() == '1') ?'bg-success' :'bg-danger') ?> "> <?= htmlspecialchars($user->getEstadoOption()[$user->isActive()])?></p>

														<h3 class="lead">Derección </h3>
														<hr>
														<p class="mb-0">Direccón: </p>
														<p class="text-info "><i class="fa fa-map-marker "></i> <?= htmlspecialchars($user->getDireccion())?></p>
														<p class="lead">
																<span class="text-info ">Nombre: </span><?= $user->getNombre()?>


														</p>
														<p class="lead">
																<span class="text-info ">Apellido: </span><?= $user->getApellido()?>


														</p>


												</div>
												<hr>

										</div>
								</div>
						</div>
				</div>
		</div>
<?php include_once  '../application/parts/backend/footer.php'?>