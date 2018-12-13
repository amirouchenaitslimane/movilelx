<?php
$title = "Login";
require_once 'application/parts/frontend/header.php';
if(isset($_SESSION['user'])){
    redidect('index');
}
?>
<div class="container">
    <div class="row">
        <?php
        include_once 'application/parts/frontend/categories.php';
        ?>

        <div class="col-md-9">

            <div class="col-md-6 mt-5">
                <div class="card p-2" >
                    <div class="card-body">
                        <h5 class="card-title">Logear</h5>
                        <?php
                        //session_destroy();
                        flash('info');
                        //DEBUG($_SESSION);
                        //                $p = password_hash('123456',PASSWORD_DEFAULT);
                        //
                        //                DEBUG(password_verify('123456',$p));

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
                            }
                            if(empty($errors)){

                                $_SESSION['user'] = $user;
                                redidect('index');

                            }else{
                                echo displayError($errors);
                            }
                        }
                        ?>

                        <h6 class="card-subtitle mb-2 text-muted"><a href="registrar.php">Registrarse</a>    </h6>
                        <form method="post" action="login.php">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo ..." value="<?= (isset($_POST['email']) ? $_POST['email']:'')?>">

                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Acceder</button>
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
