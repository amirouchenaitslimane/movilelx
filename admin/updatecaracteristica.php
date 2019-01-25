<?php
$title = "Editar Caracteristica";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx/index.php');
}

?>

<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Editar Caracteristica
												</h4>
										</div>
										<div class="card-body">
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
                                flash('info','caracteristica actualizada co exito ','success');
                                redirectWithParam('productoview','id='.$_GET['producto']);
                                // header('location:productoview.php?id='.$_GET['producto']);
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

														<input type="submit" name="submit" class="btn btn-primary btn-fill pull-right" value="Submit">
												</form>

										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>