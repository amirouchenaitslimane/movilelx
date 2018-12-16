
<?php
$title = "Area cliente";
require_once 'application/parts/frontend/header.php';
if(!$_SESSION['user']->isCliente()){
    redidect('index');
}
?>

<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
        <div class="col-md-9">
            <div class="card card-form  ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-body">

                    <ul class="nav nav-tabs mt-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" href="#pedidos" role="tab" data-toggle="tab">pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Mi perfil</a>
                        </li>


                    </ul>


                    <div class=" tab-content ">
                        <div role="tabpanel" class="tab-pane fade in active " id="pedidos">
                            <h3>Mis pedidos</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad at consequuntur corporis cum cumque, deserunt dicta dolorum earum eligendi fugit incidunt itaque laudantium magni optio praesentium quos reprehenderit saepe.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <h3>Mi perfil </h3>
                            <?php
														$cliente = $usuario_manager->findUsuario($_SESSION['user']->getId());

														?>

														<ul>
																<li><?= $cliente->getNombre();?></li>

																<li><?= $cliente->getApellido() ;?></li>
																<li><?= $cliente->getDireccion() ?></li>
																<li><?= $cliente->getEmail() ?></li>
														</ul>
                        </div>

                        </div>


                </div>
            </div>
						
           </div>
    </div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>