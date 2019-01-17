<?php
$title ="producto";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>ver Producto</h1>
            <hr>

            <div class="row">

                <div class="col-md-12 mt-3">
                    <div class="card mb-3">
                        <div class="card-body">
                           <?php
													 $id = (int)$_GET['id'];
                           $p = $producto_manager->getProductDetail($_GET['id']);
														if($p === null){
																flash('error','Producto solicitado no existe ','alert-danger');
																redirect('productos');
														}


                           ?>

														<div class="card">
																<div class="card-header">
																		<h3><?= $p->getNombre() ?></h3>
																</div>
																<?php
																if(isset($_POST['submit']) && isset($_POST['caracteristica'])){

                                        foreach ($_POST['caracteristica'] as $id) {
																					$cm->deleteCaracteristica($id);
																				}

                                        redirect("productoview.php?id=".$p->getId() );

																}

																?>
																<div class="card-body">
																		<div class="row">
																				<div class="col-md-3">
																						<img src="../uploads/products/<?= $p->getImagen() ?> " class="img-thumbnail" alt="" width="250px" height="300px">

																				</div>
																				<div class="col-md-9">
																						<p><?= $p->getDescripcion() ?></p>
																						<p><strong>Precio: </strong><?= $p->getPrecio() ?> €</p>
																						<p>Estado: <?= $p->getEstadoOption()[$p->getActive()]?></p>


																				</div>
																		</div>
																		<?php if(!empty($p->getCaracteristicas())):?>
																				<div class="row">
																						<div class="col-md-12">
																								<h3>Carateristicas</h3>
																						</div>
																						<div class="col-md-12">
																								<form method="post" action="productoview.php?id=<?=$p->getId() ?>">
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

                                                        <?php	foreach($p->getCaracteristicas() as $c):?>


																														<tr id="<?= $c->getId() ?>">
																																<td ><input type="checkbox" name="caracteristica[]" id="<?= $c->getId()?>" value="<?= $c->getId()?>" onchange="enableButton(<?= $c->getId() ?>)" <?= ((isset($_POST['caracteristica'])&&in_array($c->getId(),$_POST['caracteristica'])) ? "checked":"") ?>/></td>
																																<td><?= $c->getLabel() ?></td>
																																<td><?= $c->getValor() ?></td>
																																<td><a href="updatecaracteristica.php?id=<?= $c->getId()?>&producto=<?= $p->getId()?>">update</a></td>
																														</tr>

                                                        <?php endforeach;?>
																												</tbody>
																										</table>
																										<button type="submit" id="delete" class="btn btn-danger " name="submit" >Eliminar Seleccionados</button>
																								</form>
																						</div>
																				</div>
																		<?php endif;?>

																</div>
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
<script type="application/javascript">
    $("#delete").hide();
		function enableButton(id) {

			 if($("#"+id).attr('checked', true)){
           $("#delete").show();
			 }else{
           $("#delete").hide();
			 }




   }
</script>