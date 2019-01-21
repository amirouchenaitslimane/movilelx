<?php
$title = "Nuevo usuario";
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
												<h4 class="card-title"> Nuevo Empleado</h4>
										</div>
										<div class="card-body">
                        <?php

                        if(isset($_POST['submit'])){

                            //si existe la variable post creo un nuevo usuario
                            $user = new \app\Usuario($_POST);

                            //el email es unico en la base de datos
                            if($usuario_manager->getByEmail($_POST['email'])){
                                $user->addError('USUARIO CON EL MISMO EMAIL YA EXISTE EN LA BASE DE DATOS');
                            }
                            if($_POST['password'] != $_POST['rpassword']){
                                $user->addError("la contraseña no coincede ");
                            }

                            //si no hay errores añadimos el nuevo usuario a la base de datos
                            if(empty($user->getErrors())){
                                $usuario_manager->addUsuario($user);
                                flash( 'success', 'Has Creado un nuevo usuario','success' );

                               redirect('usuarios');
                            }else{
                                //mostrar errores del formulario
                                echo displayError($user->getErrors());
                            }


                        }
                        ?>
												<form class="form-register" method="POST" action="nuevousuario.php">

														<div class="form-group">
																<label class="bmd-label-floating" for="nombre">Nombre</label>
																<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre ..." value="<?= (isset($_POST['nombre'])?$_POST['nombre']:'');?>">
																<small id="nombre" class="form-text text-muted text-info">Elije el nombre del empleado </small>

														</div>

														<div class="form-group">
																<label class="bmd-label-floating" for="apellido">Apellido</label>
																<input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?= (isset($_POST['apellido'])?$_POST['apellido']:'');?>">
																<small id="apellido" class="form-text text-muted text-info">Elije el apellido del empleado </small>

														</div>

														<div class="form-group">
																<label class="bmd-label-floating" for="direccion">Dirección</label>
																<input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="<?= (isset($_POST['direccion'])?$_POST['direccion']:'');?>">
																<small id="nombre" class="form-text text-muted text-info">Elije la dirección del empleado </small>

														</div>

														<div class="form-group">
																<label class="bmd-label-floating" for="email">Correo</label>
																<input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="<?= (isset($_POST['email'])?$_POST['email']:'');?>">
																<small id="email" class="form-text text-muted text-info">Elije el email del empleado  </small>

														</div>


														<div class="form-group">
																<label class="bmd-label-floating" for="password">Contraseña</label>
																<input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" >
																<small id="password" class="form-text text-muted text-info">Elije contraseña del empleado </small>

														</div>

														<div class="form-group">
																<label class="bmd-label-floating" for="password2">Repete Contraseña</label>
																<input type="password" name="rpassword" class="form-control" id="password2" placeholder="Repite La Contraseña">
																<small id="nombre" class="form-text text-muted text-info">Repite la contraseña del empleado </small>

														</div>

														<div class="form-group">
																<label for="role">Role</label>
																<select class="form-control" id="role" name="role">

																		<option value="1">ADMIN</option>
																</select>
																<small id="role" class="form-text text-muted text-info">Role del empleado </small>

														</div>


														<div class="form-group">
																<label for="activo">Estado</label>
																<select name="active" id="activo" class="form-control">
																		<option value="0" <?= ((isset($_POST['active']) == "0") ? "selected":"") ?>>Inactivo</option>
																		<option value="1" <?= ((isset($_POST['active']) == "1") ? "selected":"") ?> >Activo</option>
																</select>
																<small id="activo" class="form-text text-muted text-info">Si no quieres desabilitar acceso a ese Admin ponlo en 	INACTIVO </small>

														</div>
														<button type="submit" name="submit" class="btn btn-primary btn-fill pull-right">Guardar</button>
														<div class="clearfix"></div>
												</form>

										</div>
								</div>
						</div></div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>