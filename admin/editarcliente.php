<?php
$title = "Editar Cliente";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx/index.php');
}

?>
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Editar Cliente
												</h4>
										</div>
										<div class="card-body">
                        <?php
                        if(isset($_GET['id'])){
                            $user = $usuario_manager->findUsuario($_GET['id']);
                            if($user === null){
                                redirect('clientes');
                            }

                        }else{
                            redirect('clientes');
                        }
                        if(isset($_POST['submit'])){
                            $user->setNombre($_POST['nombre']);
                            $user->setApellido($_POST['apellido']);
                            $user->setEmail($_POST['email']);
                            $user->setDireccion($_POST['direccion']);
                            $user->setActive($_POST['active']);
                            if(empty($user->getErrors())){
                                $usuario_manager->Update($user);
                                flash('info','Has cambiado el usuario ','alert-info');
                                redirect('clientes');
                            }else{
                                echo displayError($user->getErrors());
                            }
                        }
                        ?>

												<form method="POST" action="">
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
																<label for="activo">Estado</label>
																<select name="active" id="activo" class="form-control">
																		<option value="1" <?= ($user->isActive() == '1' ? "selected":"") ?> >Activo</option>
																		<option value="0" <?= ($user->isActive() == '0' ? "selected":"") ?>>Inactivo</option>
																</select>
																<small id="activo" class="form-text text-muted">si no quieres desabilitar acceso a ese cliente ponlo en 	INACTIVO </small>

														</div>

														<input type="submit" name="submit" class="btn btn-primary btn-fill pull-right" value="Submit">
												</form>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>