<?php
$title ="Editar producto";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
		<div id="content-wrapper">
				<div class="container-fluid">
						<!-- Page Content -->
						<h1>Editar Producto</h1>
						<hr>

						<div class="row">

								<div class="col-md-12 mt-3">
										<div class="card mb-3">
												<div class="card-body">
                            <?php
                            $producto = $producto_manager->getProduct($_GET['id']);
                            //DEBUG($producto);die();
                            if(isset($_POST['submit']))
                            {
                                if(isset($_POST['nombre'])){
                                    $producto->setNombre(trim(htmlspecialchars($_POST['nombre'])));
                                }
                                if(isset($_POST['descripcion'])){
                                    $producto->setDescripcion(trim(htmlspecialchars($_POST['descripcion'])));
                                }
                                if(isset($_POST['precio'])){
                                    if (!preg_match("/^\d+(\.\d{2})?$/",trim($_POST['precio']))) {
                                        $producto->addErrors('precio del producto  incorrecto ');

                                    }
                                    $producto->setPrecio(trim(htmlspecialchars($_POST['precio'])));


                                }
                                if(isset($_POST['active'])){
                                    $producto->setActive(trim(htmlspecialchars($_POST['active'])));
                                }
                                if($_FILES['image']['name'] !=="" ){
                                    $producto->setImagen($_FILES['image']['name']);
                                    if(!upload('image','../uploads/products/')){
                                        $producto->addErrors('la imagen no se ha agregado al libriría');
                                    }
                                }else{
                                    $producto->setImagen($producto->getImagen());

                                }

                                if(isset($_POST['categoria_id'])){
                                		$c = $categoria_manager->getOneCategory($_POST['categoria_id']);

                                		if($c == null){
                                        $producto->addErrors('La categoria seleccionada no es adecuada ');

                                    }else{
                                        $producto->setCategoria_id((int)$_POST['categoria_id']);

																		}
                                }

                                if (empty($producto->getErrors())){

                                    $producto_manager->updateProduct($producto);
                                    flash('info','producto actualizado con exito! ','alert-info');

                                    redirect('productos');


                                }else{
                                    echo displayError($producto->getErrors());
                                }

                            }

                            ?>
														<form action="productoedit.php?id=<?= $producto->getId()?>" method="post" enctype="multipart/form-data">
																<div class="form-group">
																		<label for="nombre">Nombre del producto <small>(*)</label>
																		<input type="text" class="form-control" name="nombre" id="nombre" value="<?= $producto->getNombre(); ?>"  >
																		<small id="nombre" class="form-text text-muted">(*) En este campo hay que escribir el nombre del producto </small>

																</div>

																<div class="form-group">
																		<label for="descripcion">Descripcon del producto</label>
																		<small id="descripcion" class="form-text text-primary">para definir subtitulo agregal entre &lt;h4 class"color-orange" &gt; &lt;/h4&gt; </small>

																		<textarea name="descripcion" class="form-control"  id="descripcion" cols="30" rows="10" ><?= $producto->getDescripcion() ?></textarea>
																		<small id="descripcion" class="form-text text-muted">En este campo tienes que describir el producto</small>

																</div>

																<div class="form-group">
																		<label for="precio">precio producto <small>(*)	</small></label>
																		<input type="text" class="form-control" name="precio"  title="se acceptan solo numeros" id="precio" required value="<?= $producto->getPrecio() ?>">
																		<small id="precio" class="form-text text-muted">Escriba el precio del producto</small>

																</div>
																<div class="form-group">
																		<label for="activo">Es Activo</label>
																		<select name="active" id="activo" class="form-control">
																				<option value="1" <?= ($producto->getActive()=== '1'  ? "selected=selected" :""); ?>>Activo</option>
																				<option value="0" <?= ($producto->getActive()=== '0'  ? "selected=selected" :""); ?>  >Inactivo</option>
																		</select>
																		<small id="activo" class="form-text text-muted">si no quieres mostrar el producto selecciona INACTIVO </small>

																</div>

																<div class="form-group">
																		<label for="imagen">Imagen <small>(*)</small></label>
																		<input type="file"  name="image" id="imagen" value=""  >
																		<small id="imagen-s" class="form-text text-muted">(*) Imagen del product es obligatoria con (.png,jpg..) </small>

																		<div class="col-md-5 mt-2">
																				<img src="../uploads/products/<?= $producto->getImagen() ?>" class="img-thumbnail" id="img1">
																				<img id="blah" src="" alt=""  />
																		</div>
																</div>
																<div class="form-group">
																		<label for="categoria">Su Categoria</label>
																		<select name="categoria_id" id="categoria" class="form-control">
                                        <?php foreach ($categoria_manager->displayCategorias() as $categoria): ?>
                                            <?php if(!empty($categoria->getChilds())):?>
																								<optgroup label="<?= $categoria->getNombre() ?>">
                                                    <?php foreach ($categoria->getChilds() as $child):?>
																												<option value="<?= $child->getId();?>" <?= (($producto->getCategoriaId() == $child->getId()) ? "selected":"" ) ?> > <?= $child->getNombre();?> </option>

                                                    <?php endforeach; ?>

																								</optgroup>

                                            <?php else: ?>
																								<option value="<?= $categoria->getId() ?>" <?= (($producto->getCategoriaId() == $categoria->getId()) ? "selected":"") ?>><?= $categoria->getNombre();?></option>
                                            <?php endif;?>




                                        <?php endforeach; ?>

																		</select>
																</div>

																<button class="btn btn-group-lg btn-success" name="submit" type="submit">Crear</button>
														</form>

												</div>
										</div>
								</div>

						</div>




				</div>
				<!-- /.container-fluid -->
		</div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
<script>

    $("#imagen").change(function() {
        readImg(this);
    });

</script>