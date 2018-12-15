<?php
$title = "Registrar";
require_once 'application/parts/frontend/header.php';

?>
<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>

        <div class="col-md-9">
            <div class="card card-form  ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Registrar</h4>
                    <p class="card-sub-title">¿Eres Cliente?....</p>
                </div>
                <div class="card-body">
                    <form class="form-register" method="POST" action="registrar.php">

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

                        <button type="submit" name="submit" class="btn btn-primary pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
