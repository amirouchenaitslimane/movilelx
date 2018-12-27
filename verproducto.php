
<?php
$title = "ver producto";
require_once 'application/parts/frontend/header.php';

DEBUG($_SESSION['carrito']);
?>
<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
        <div class="col-md-9">
						<div class="flash-message">
								<?php flash('info');?>
						</div>
           <div class="row">
							<?php $producto = $producto_manager->getProductDetail($_GET['id'])?>
                   <div class="col-md-4 item-photo">
                       <img  class="img-thumbnail" src="uploads/products/<?= $producto->getImagen(); ?>" />
                   </div>
                   <div class="col-md-8" >
                      <h1 class="mb-3" ><?= $producto->getNombre()?></h1>
											 <hr>

                       <h3 class="font-italic pull-right precio"><?= $producto->getPrecio()?> €</h3>

											 <form action="addcard.php" method="get">


																<div class="form-group">
																		<label for="cantidad">Cantidad: </label>
																		<select name="cantidad" id="cantidad" class="form-control">
                                        <?php for($i=1;$i<=10;$i++):		 ?>
																						<option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor;?>
																		</select>
																</div>
																<input type="hidden" name="product_id" value="<?= $producto->getId()?>">




													 <button type="submit" class="btn btn-success btn-orange btn-lg btn-block">Comprar</button>
											 </form>






                   </div>
           </div>

						<div class="col-md-12 mt-4">
							<h3 class=>Descripción:</h3>
								<div class="">
										<?= $producto->getDescripcion() ?>
								</div>
						</div>

						<div class="col-md-12">

		<h3>Caracteristicas:</h3>


				<ul class="list-group">

            <?php foreach ($producto->getCaracteristicas() as $caracteristica):?>
								<li class="list-group-item"><i class="fa fa-angle-right"></i><?= $caracteristica->getLabel()." : ".$caracteristica->getValor() ?></li>
            <?php endforeach;?>
				</ul>

</div>


						<div class="jumbotron mt-3 jumbotron-credit">
								<div class="col-md-12">
										<h2 class="text-center">Paga de forma segura </h2>
								</div>
								<img src="assets/images/credit.png"  alt="">
						</div>
        </div>
    </div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>