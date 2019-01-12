<?php
$title ="Categorias";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>Nuevo  Producto</h1>
            <hr>
<?php
$p= $producto_manager->getProductDetail($_GET['id']);
if($p == null){
		flash('info','El productos solicitado ya no existe','alert-info');
		redirect('productos');
}


?>
            <div class="row">

                <div class="col-md-12 mt-3">
                    <div class="card mb-3">
												<div class="card-header">
														<h3><a href="productoview.php?id=<?= $p->getId() ?>" class="text-black-50"><?= $p->getNombre() ?></a></h3>
														<p class="lead">Contiene <?= count($p->getCaracteristicas()) ?> caractristicas</p>
												</div>
                        <div class="card-body">
                            <?php
$producto = $producto_manager->getProduct($_GET['id']);
if(isset($_POST['submit'])){
		$caracs = arrayHelperCaracteristicas($_POST);
    $objs_carac = [];
    foreach ($caracs as $carac) {
    		$c =  new \app\Caracteristicas($carac);
    		$c->setProductId($producto->getId());
				$objs_carac[] =$c;
    }
		$cm->addCaracteristicas($objs_carac);
    header('location:productoview.php?id='.$producto->getId());
}

                            ?>

                            <div id="form_div">
                                <form method="post" action="productocaractiristicas.php?id=<?= $producto->getId() ?>">
                                <div class="col-md-8">
                                    <table id="employee_table" class="table table-borderless">
                                        <tr id="row1">
                                            <td><input class="form-control" type="text" name="label[]" placeholder="Nombre de la cacteristica"></td>
                                            <td><input class="form-control" type="text" name="valor[]" placeholder="Valor de la caracteristica"></td>
                                           </tr>
                                    </table>
                                    <button type="button" onclick="add_row();" class="btn btn-success pull-left"><i class="fa fa-plus"></i> Más caracteristicas</button>
                                    <input type="submit" name="submit" value="Crear" class="btn btn-primary pull-right">

                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
						<div class="row">
								<div class="col-md-12">
										<div class="card">
												<div class="card-body">
														<div class="col-md-12">
																<table class="table">
																		<thead>
																		<tr>
																				<th scope="col">#</th>
																				<th scope="col">nombre</th>
																				<th scope="col">valor</th>
																				<th></th>

																		</tr>
																		</thead>
																		<tbody>
																		<?php foreach ($p->getCaracteristicas() as $caracteristica):?>
																		<tr>
																				<td><?= $caracteristica->getId() ?></td>
																				<td><?= $caracteristica->getLabel() ?></td>
																				<td><?= $caracteristica->getValor() ?></td>
																		</tr>

																		<?php endforeach; ?>
																		</tbody>
																</table>

														</div>
												</div>
										</div>
								</div>
						</div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>
