<?php
$title = "Nuevo usuario";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || !$_SESSION['user']->isSuperAdmin()){
    header('location:/movilelx/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>editar Administrador</h1>
            <hr>

            <div class="row">
                <div class="col-md-8">

                    <?php

                    if(isset($_POST['submit'])){
                        //si existe la variable post creo un nuevo usuario
                        $user = new \app\Usuario($_POST);

                        //el email es unico en la base de datos
                        if($usuario_manager->getByEmail($_POST['email'])){
                            $user->addError('USUARIO EXIST EN LA BASE DE DATOS');
                        }
                        if($_POST['password'] != $_POST['rpassword']){
                            $user->addError("la contraseña no coincede ");
                        }
                        //si no hay errores añadimos el nuevo usuario a la base de datos
                        if(empty($user->getErrors())){
                            $usuario_manager->addUsuario($user);
                            flash( 'success', 'Has Creado un nuevo usuario','alert-success' );

                           redidect('usuarios');
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

                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating" for="apellido">Apellido</label>
                            <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?= (isset($_POST['apellido'])?$_POST['apellido']:'');?>">

                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating" for="direccion">Dirección</label>
                            <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="<?= (isset($_POST['direccion'])?$_POST['direccion']:'');?>">

                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating" for="email">Correo</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="<?= (isset($_POST['email'])?$_POST['email']:'');?>">

                        </div>


                        <div class="form-group">
                            <label class="bmd-label-floating" for="password">Contraseña</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" >
                        </div>

                        <div class="form-group">
                            <label class="bmd-label-floating" for="password2">Repete Contraseña</label>
                            <input type="password" name="rpassword" class="form-control" id="password2" placeholder="Repite La Contraseña">

                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control" id="role" name="role">
                               <option value="2" <?= (isset($_POST['role']) == 2 ? "selected": "" ) ?>>CLIENTE</option>
                                <option value="1" <?= (isset($_POST['role']) == 1 ? "selected": "" ) ?>>ADMIN</option>
                            </select>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary pull-left btn-movilex">Registrar</button>
                        <div class="clearfix"></div>
                    </form>

                </div>

            </div>
        </div>




    </div>
    <!-- /.container-fluid -->
</div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
