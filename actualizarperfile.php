<?php
$title = "Actualizar perfil";
require_once 'application/parts/frontend/header.php';
if(!isset($_SESSION['user'])){
    redirect('index');
}else{
    $user = $usuario_manager->findUsuario($_SESSION['user']->getId());
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
                    </div>
                <div class="card-body">
                    <?php

                    flash('info');
                    if(isset($_POST['submit'])){

                        $nombre = htmlspecialchars(trim($_POST['nombre']));
                        $apellido = htmlspecialchars(trim($_POST['apellido']));
                        $direccion = htmlspecialchars(trim($_POST['direccion']));
                        $email = htmlspecialchars(trim($_POST['email']));
                        $user->setNombre($nombre);
                        $user->setApellido($apellido);
                        $user->setDireccion($direccion);
                        if($email !== $user->getEmail()){
                            if($usuario_manager->getByEmail($email) !== null){
                                $user->addError('El email introducido ya existe en la base de datos');
                            }else{
                                $user->setEmail($email);
                            }
                        }

                if(empty($user->getErrors())){
                    unset($_SESSION['user']);
                    flash( 'info', 'Tus datos han sido cambiados ','alert-success' );

                    $usuario_manager->Update($user);
                    $_SESSION['user'] = $user;
                    redirect('areacliente');
                }else{
                    echo displayError($user->getErrors());
                }


//DEBUG($user);


                    }

                    ?>
                    <div class="col-md-12 col-12 col-sm-12 mt-4">
                        <form class="form-register" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

                            <div class="form-group">
                                <label class="bmd-label-floating lead" for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre ..." value="<?= htmlspecialchars($user->getNombre() );?>">

                            </div>

                            <div class="form-group">
                                <label class="bmd-label-floating lead" for="apellido">Apellido</label>
                                <input type="text" name="apellido" class="form-control" id="apellido" placeholder="Apellido" value="<?= htmlspecialchars($user->getApellido() );?>">

                            </div>

                            <div class="form-group">
                                <label class="bmd-label-floating lead" for="direccion">Dirección</label>
                                <input type="text" name="direccion" class="form-control" id="direccion" placeholder="Dirección" value="<?= htmlspecialchars($user->getDireccion() );?>">

                            </div>

                            <div class="form-group">
                                <label class="bmd-label-floating lead" for="email">Correo</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="<?= htmlspecialchars($user->getEmail() );?>"">

                            </div>

                            <button type="submit" name="submit" class="btn btn-primary btn-lg pull-right btn-movilex">Actualizar</button>
                            <div class="clearfix"></div>
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
