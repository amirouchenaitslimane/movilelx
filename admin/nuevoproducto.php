<?php
$title ="Nuevo Producto";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}
?>
<div class="content">
<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 mt-3">
		<div class="card mb-3">
				<div class="card-body">
								<h1 class="h3 card-title lead">Nuevo Producto: </h1>
								<hr>
<?php
if(isset($_POST['submit'])){
		$product = new \app\Producto($_POST);
if($_FILES['image']['name'] !=="" ) {	$product->uploadImage('image');}
		if(isset($_POST['es_oferta']) && $_POST['es_oferta']== '1' )
		{
				$p_reducido = $_POST['precio_reducido'];
				$product->setPrecio_reducido($p_reducido);
				$tipo_oferta = (int)$_POST['tipo_oferta'];
				if($tipo_oferta !== 0 && $tipo_oferta !== 1 && $tipo_oferta !== 2){
						$product->addErrors('Tipo de oferta es requerido ');
				}else{
						$product->setTipo_oferta($tipo_oferta);
				}
		}else{
				$product->setPrecio_reducido(null);
				$product->setTipo_oferta(0);
		}
		if(empty($product->getErrors())){
				if($producto_manager->addProducto($product)){
						flash('info','product añadido a la base de datos ','success');
				}else{
            flash('info','product añadido a la base de datos ','danger');

				}
				redirect('productos');
		}else{
				echo displayError($product->getErrors());
		}
}
?>
								<form action="nuevoproducto.php" method="post" enctype="multipart/form-data" class="mt-4">
										<div class="form-group">
												<label for="nombre">Nombre del producto <small>(*)</label>
												<input type="text" class="form-control" name="nombre" id="nombre" value="<?= (isset($_POST['nombre']) ? $_POST['nombre'] : "") ?>" required >
												<small id="nombre" class="form-text text-muted text-info">(*) En este campo hay que escribir el nombre del producto </small>
										</div>
										<div class="form-group">
												<label for="descripcion">Descripcon del producto</label>
												<small id="descripcion" class="form-text text-primary">para definir subtitulo agregal entre &lt;h4 class="color-orange" &gt; &lt;/h4&gt; </small>
												<textarea name="descripcion" class="form-control"  id="descripcion" cols="30" rows="10" ><?= (isset($_POST['descripcion']) ? $_POST['descripcion'] : "") ?></textarea>
												<small id="descripcion" class="form-text text-muted text-info">En este campo tienes que describir el producto</small>
										</div>
										<div class="form-group">
												<label for="precio">precio producto <small>(*)	</small></label>
												<input type="text" class="form-control" name="precio"  title="se acceptan solo numeros" id="precio" required value="<?= (isset($_POST['precio']) ? $_POST['precio'] : "" )?>">
												<small id="precio" class="form-text text-muted text-info">Escriba el precio del producto usa punto(.) para decimales ex: 99.99</small>
										</div>
										<div class="form-group">
												<label for="activo">Estado</label>
												<select name="active" id="activo" class="form-control">
														<option value="1" <?= ((isset($_POST['activo'])&& $_POST['activo'] == "1" ) ? "selected": ""  ) ?>>Activo</option>
														<option value="0" <?= ((isset($_POST['activo'])&& $_POST['activo'] == "0" ) ? "selected": ""  ) ?>>Inactivo</option>
												</select>
												<small id="activo" class="form-text text-muted text-info">si no quieres mostrar el producto selecciona INACTIVO </small>

										</div>

										<div class="form-group">
												<label for="imagen">Imagen <small>(*)</small></label>
												<input type="file" class="form-control"  name="image" id="imagen" value="<?=(isset($_FILES['image']['name']) ? $_FILES['image']['name'] : "") ?>" >
												<small id="imagen-s" class="form-text text-muted text-info">(*) Imagen del product es obligatoria con (.png,jpg..) </small>
												<div class="col-md-5 mt-2">
														<img id="img" src="" alt=""  />
												</div>
										</div>
										<div class="form-group">
												<label for="categoria">Su Categoria</label>
												<a href="#" data-toggle="tooltip" id="tt" title="Los productos se colocan siempre en la categorias hijas " class="pull-right"><i class="fa fa-question-circle"></i></a>
												<select name="categoria_id" id="categoria" class="form-control">
<?php
foreach ($categoria_manager->displayCategorias() as $categoria): if(!empty($categoria->getChilds()) || $categoria->getPadreId()=='0'):
	?>
													<optgroup  label="<?= htmlspecialchars(trim($categoria->getNombre())); ?>">
<?php
foreach ($categoria->getChilds() as $child):
?>
													<option value="<?= $child->getId();?>"><?= $child->getNombre().' ('.$categoria->getNombre().' )';?></option>
<?php
endforeach;
?>
											 	</optgroup>
<?php
else:
?>
												<option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre();?></option>
<?php
endif;endforeach;
?>
										</select>
										</div>
										<div class="jumbotron bg-light">
												<div class="card">
														<div class="card-header">
																<h4 class="card-title">
																		crear oferta <small>(Opcional)</small>
																</h4>
														</div>
														<div class="card-body">
																<div class="form-group">
																		<label for="es_oferta">¿ Es Oferta ?</label>
																		<select name="es_oferta" id="es_oferta" class="form-control">
																				<option value="0" <?= ((isset($_POST['es_oferta'])&& $_POST['es_oferta'] == "0" ) ? "selected": ""  ) ?>>No</option>
																				<option value="1" <?= ((isset($_POST['es_oferta'])&& $_POST['es_oferta'] == "1" ) ? "selected": ""  ) ?>>Si</option>
																		</select>
																		<small id="activo" class="form-text text-muted text-info">si es oferta selecciona Si</small>

																</div>
																<div class="form-group">
																		<label for="tipo_oferta">Tipo de Oferta </label>
																		<select name="tipo_oferta" id="tipo_oferta" class="form-control">
																				<option value="0">No</option>
																				<option value="1" <?= ((isset($_POST['tipo_oferta'])&& $_POST['tipo_oferta'] == "1" ) ? "selected": ""  ) ?>>Rebaja</option>
																				<option value="2" <?= ((isset($_POST['tipo_oferta'])&& $_POST['es_oferta'] == "2" ) ? "selected": ""  ) ?>>Promocion</option>
																		</select>
																		<small id="activo" class="form-text text-muted text-info">Elije el tipo de oferta </small>
																</div>
																<div class="form-group">
																		<label for="precio_reducido">precio reducción <small>(*)	</small></label>
																		<input type="text" class="form-control" name="precio_reducido"  title="se acceptan solo numeros" id="precio_reducido"  value="<?= (isset($_POST['precio_reducido']) ? $_POST['precio_reducido'] : "" )?>" >
																		<small id="precio" class="form-text text-muted text-info">Escriba el precio del producto usa punto(.) para decimales ex: 99.99</small>

																</div>
														</div>
												</div>
										</div>
										<button class="btn btn-group-lg btn-success btn-fill pull-right" name="submit" id="btn_sub" type="submit">Crear</button>
								</form>

						</div>
				</div>
				</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>
<script>

    $("#imagen").change(function() {
        readURL(this);
    });

// validarOferta();


    $('#tt').tooltip({
        'selector': '',
        'placement': 'top',
        'container':'body'
    });
</script>