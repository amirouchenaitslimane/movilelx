<?php
$title = "Editar Cliente";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>editar Administrador</h1>
            <hr>
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
            <div class="row">
                <div class="col-md-8">
                    <?php
                    if(isset($_POST['submit'])){
                        $user->setNombre($_POST['nombre']);
                        $user->setApellido($_POST['apellido']);
                        $user->setEmail($_POST['email']);
                        $user->setDireccion($_POST['direccion']);
                        $user->setRole($_POST['role']);
                        $user->setActive($_POST['active']);

                        if(empty($user->getErrors())){
                            $usuario_manager->Update($user);
                            flash('info','Has cambiado el usuario ','alert-info');
                            redirect('usuarios');
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
																<option value="1" <?= ($user->isActive() == '1' ? "selected":"") ?> >Activo</option>
																<option value="0" <?= ($user->isActive() == '0' ? "selected":"") ?>>Inactivo</option>
														</select>
														<small id="activo" class="form-text text-muted">si no quieres desabilitar acceso a ese Admin ponlo en 	INACTIVO </small>

												</div>
                        <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                    </form>
                </div>

            </div>
        </div>




    </div>
    <!-- /.container-fluid -->
</div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
