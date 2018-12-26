<?php
$title = "Editar Caracteristica";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>editar Caracteristica</h1>
            <hr>

            <div class="row">
                <div class="col-md-8">
                <?php

                $c = $cm->getOne($_GET['id']);
                if(isset($_POST['submit'])){
                    $errors = [];
                    $label = trim($_POST['label']);
                    $valor = trim($_POST['valor']);
                    if(empty($label)){
                        $errors[] = "Nombre de la caracteristica es requerido";
                    }
                    if(empty($valor)){
                        $errors[] = "Valor de la caracteristica es requerido ";
                    }

                    if(empty($errors)){
                        $c->setLabel($label);
                        $c->setValor($valor);
                        $cm->updateOne($c);
                        redidect('productview');
                    }else{
                        echo displayError($errors);
                    }
                }

                ?>
                    <form method="POST" action="">
                       <div class="form-group">
                           <label for="label">Label (Nombre de la caracteristica )</label>
                           <input type="text" class="form-control" name="label" value="<?= $c->getLabel() ?>">
                       </div>
                        <div class="form-group">
                            <label for="valor">Valor  de la caracteristica </label>
                            <input type="text" class="form-control" name="valor" value="<?= $c->getValor() ?>">
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
