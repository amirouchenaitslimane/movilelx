<?php
$title = "Registrar";
require_once 'application/parts/frontend/header.php';
echo $_SERVER['SERVER_NAME'];
?>
<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>

        <div class="col-md-9">
            <div class="col-md-6 ">
                <div class="card p-2" >
                    <div class="card-body">
                        <h5 class="card-title">Registrarse</h5>

                        <h6 class="card-subtitle mb-2 text-muted"><a href="?p=login">Login</a></h6>
                        <?php

                        if(isset($_POST['submit'])){
                            //si existe la variable post creo un nuevo usuario
                            $user = new \app\Usuario($_POST);
                            //el email es unico en la base de datos
                            if($usuario_manager->getByEmail($_POST['email'])){
                                $user->addError('USUARIO EXIST EN LA BASE DE DATOS');
                            }
                            //si no hay errores añadimos el nuevo usuario a la base de datos
                            if(empty($user->getErrors())){
                                $usuario_manager->addUsuario($user);
                                flash( 'info', 'Felicidades Ya eres Nuestro Cliente ','alert-success' );

                              redidect('login');
                            }else{
                                //mostrar errores del formulario
                                echo displayError($user->getErrors());
                            }
                        }
                        ?>

                        <form method="POST" action="registrar.php">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre ..." value="<?= (isset($_POST['nombre'])?$_POST['nombre']:'');?>">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?= (isset($_POST['apellido'])?$_POST['apellido']:'');?>">
                            </div>
                            <div class="form-group">
                                <label for="direccion">Direccion</label>
                                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="<?= (isset($_POST['direccion'])?$_POST['direccion']:'');?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="<?= (isset($_POST['email'])?$_POST['email']:'');?>">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" >
                            </div>
                            <div class="form-group">
                                <label for="password2">Contraseña</label>
                                <input type="password" name="rpassword" class="form-control" id="password2" placeholder="Repite La Contraseña">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit">
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
