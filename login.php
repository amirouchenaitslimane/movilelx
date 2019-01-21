<?php
$title = "Login";
require_once 'application/parts/frontend/header.php';
if(isset($_SESSION['user'])){
    redirect('index');
}
?>
<div class="container">
    <div class="row">
        <?php
        include_once 'application/parts/frontend/categories.php';
        ?>
        <div class="col-md-9">
						<div class="card card-form  ">
								<div class="card-header card-header-primary">
										<h4 class="card-title lead"><?= $title ?></h4>
										<p class="card-sub-title lead"><strong>¿Quieres unirte a movilelx ?</strong> registrate  <a href="registrar.php">aqui</a>	</p>
								</div>
								<div class="card-body">
                    <?php

                    flash('info');
										//	DEBUG($_SESSION['anony']);
                    if(isset($_POST['submit']))
                    {
                        $errors = [];
                        $email = trim($_POST['email']);
                        $password = trim($_POST['password']);
                        if(empty($email)){
                            $errors[] = "email obligatorio para acceder";
                        }
                        if(empty($password)){
                            $errors[] = "contraseña obligatoria para acceder";
                        }
                        $user = $usuario_manager->getByEmail($email);

                        if($user === null){
                            $errors[] = 'usuario no existe en la base de datos';

                        }else {
                            if (!$user->isPasswordValid($password)) {
                                $errors[] = 'Contraseña incorrecta';
                            }
                            if($user->isActive() !== 1){
                                $errors[] = "Acceso denegado contacte con el administrador";
                            }
                        }



                        if(empty($errors)){
                            $_SESSION['user'] = $user;
												if(isset($_SESSION['anony'])){
														unset($_SESSION['anony']);
														redirect('procesarcarrito');

												}else{
														redirect('index');
												}
                        }else{
                            echo displayError($errors);
                        }
                    }
                    ?>
										<div class="col-md-12 col-12 col-sm-12 mt-4">
										<form class="form-register" method="post" action="<?= $_SERVER['PHP_SELF']?>">
												<div class="form-group mt-2">
														<label for="email" class="lead">Email: </label>
														<input type="email" class="form-control" id="email" name="email" placeholder="Correo ..." value="<?= (isset($_POST['email']) ? $_POST['email']:'')?>">

												</div>
												<div class="form-group mt-2">
														<label for="password" class="lead">Password: </label>
														<input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
												</div>

												<button type="submit" name="submit" class="btn pull-right btn-lg btn-movilex">Acceder</button>
										</form>
										</div>
										</div>
								</div>
				</div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
