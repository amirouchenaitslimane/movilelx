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

            <div class="row">

                <div class="col-md-12 mt-3">
                    <?php
                    if(isset($_POST['submit'])){
                    $product = new \app\Producto($_POST);



										$product->setImage($_FILES['image']['name']);

										if(empty($product->getErrors())){
												$producto_manager->addProducto($product);
                            $product->upload($_FILES);
                       			 redidect('productos');

										echo "is empty";
										}else{
												echo displayError($product->getErrors());
										}
                    }
                    ?>
                    <form action="nuevoproducto.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre">Nombre del producto <small>(*)</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= (isset($_POST['nombre']) ? $_POST['nombre'] : "") ?>" required >
														<small id="nombre" class="form-text text-muted">(*) En este campo hay que escribir el nombre del producto </small>

												</div>

                        <div class="form-group">
                            <label for="descripcion">Descripcon del producto</label>

                            <textarea name="descripcion" class="form-control"  id="descripcion" cols="30" rows="10" ><?= (isset($_POST['descripcion']) ? $_POST['descripcion'] : "") ?></textarea>
														<small id="descripcion" class="form-text text-muted">En este campo tienes que describir el producto</small>

												</div>

                        <div class="form-group">
														<label for="precio">precio producto <small>(*)	</small></label>
                            <input type="text" class="form-control" name="precio" pattern="[-+]?[0-9]*[.,]?[0-9]+" title="se acceptan solo numeros" id="precio" required value="<?= (isset($_POST['precio']) ? $_POST['precio'] : " " )?>">
														<small id="precio" class="form-text text-muted">Escriba el precio del producto</small>

												</div>
                        <div class="form-group">
                            <label for="activo">Es Activo</label>
                            <select name="active" id="activo" class="form-control">
                                <option value="1" <?= ((isset($_POST['activo'])&& $_POST['activo'] == "1" ) ? "selected": ""  ) ?>>Activo</option>
                                <option value="0" <?= ((isset($_POST['activo'])&& $_POST['activo'] == "0" ) ? "selected": ""  ) ?>>Inactivo</option>
                            </select>
														<small id="activo" class="form-text text-muted">si no quieres mostrar el producto selecciona INACTIVO </small>

												</div>

                        <div class="form-group">
                            <label for="imagen">Imagen <small>(*)</small></label>
                            <input type="file" name="image" id="imagen" value="<?=(isset($_FILES['image']['name']) ? $_FILES['image']['name'] : "") ?>"  required>
														<small id="imagen" class="form-text text-muted">(*) Imagen del product es obligatoria con (.png,jpg..) </small>

												</div>
                        <div class="form-group">
                            <label for="categoria">Su Categoria</label>
                            <select name="categoria_id" id="categoria" class="form-control">
                                <?php foreach ($categoria_manager->displayCategorias() as $categoria): ?>
                                    <?php if(!empty($categoria->getChilds())):?>
                                        <optgroup label="<?= $categoria->getNombre() ?>">
                                            <?php foreach ($categoria->getChilds() as $child):?>
                                                <option value="<?= $child->getId();?>"><?= $child->getNombre();?></option>

                                            <?php endforeach; ?>

                                        </optgroup>

                                    <?php else: ?>
                                        <option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre();?></option>
                                    <?php endif;?>




                                <?php endforeach; ?>

                            </select>
                        </div>

                        <button class="btn btn-group-lg btn-success" name="submit" type="submit">Crear</button>
                    </form>
                </div>

            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
