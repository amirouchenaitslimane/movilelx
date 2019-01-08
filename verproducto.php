<?php
$title = "ver producto";
require_once 'application/parts/frontend/header.php';?>
<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
				<div class="col-md-9 col-sm-12 col-12 wrapper">
						<div class="flash-message">
								<?php flash('info');?>
						</div>
           <div class="row">
							<?php
							$producto = $producto_manager->getProductDetail($_GET['id']);
							if($producto==null){
									flash('error','Producto solicitado no existe','alert-danger');
								redirectWithParam('categoria','id='.$_GET['cat']);
							}

							?>
                   <div class="col-md-4 col-sm-4 col-12">
                       <img  class=" img-fluid" src="uploads/products/<?= $producto->getImagen(); ?>" />
                   </div>
                   <div class="col-md-8 col-sm-8 col-12" >
                      <h1 class="mb-3 lead product_name " ><?= $producto->getNombre()?></h1>
											 <hr class="lead">

                       <h3 class="font-italic pull-right precio"><?= $producto->getPrecio()?> €</h3>
											 <form action="addcard.php" method="get">
																<div class="form-group">
																		<label for="cantidad" class="lead ">Cantidad: </label>
																		<select name="cantidad" id="cantidad" class="form-control">
                                        <?php for($i=1;$i<=10;$i++):		 ?>
																						<option value="<?= $i ?>"><?= $i ?></option>
                                        <?php endfor;?>
																		</select>
																</div>
																<input type="hidden" name="product_id" value="<?= $producto->getId()?>">




													 <button type="submit" class="btn btn-success btn-movilex btn-lg btn-block">Comprar</button>
											 </form>
                   </div>
           </div>

						<div class="col-md-12 mt-4">
							<h3 class="prod-title">Descripción:</h3>
								<div class="">
										<?= $producto->getDescripcion() ?>
								</div>
						</div>

						<div class="col-md-12">

		<h3 class="prod-title">Caracteristicas:</h3>


				<ul class="list-group">

            <?php foreach ($producto->getCaracteristicas() as $caracteristica):?>
								<li class="list-group-item"><i class="fa fa-angle-right"></i> <?= $caracteristica->getLabel()." : ".$caracteristica->getValor() ?></li>
            <?php endforeach;?>
				</ul>

</div>



        </div>
    </div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>