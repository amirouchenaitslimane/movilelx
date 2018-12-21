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
										//DEBUG($product->printPath());die();
										if(empty($product->getErrors())){
												$producto_manager->addProducto($product);
                            $product->upload($_FILES);
                       			 redidect('productos');
												}









                    }
                    ?>
                    <form action="nuevoproducto.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nombre">Nombre del producto</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= (isset($_POST['nombre']) ? $_POST['nombre'] : " ") ?>" required >
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripcon del producto</label>

                            <textarea name="descripcion" class="form-control"  id="descripcion" cols="30" rows="10" ><?= (isset($_POST['descripcion']) ? $_POST['descripcion'] : "") ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="precio">precio producto</label>
                            <input type="text" class="form-control" name="precio" id="precio" required value="<?= (isset($_POST['precio']) ? $_POST['precio'] : " " )?>">
                        </div>
                        <div class="form-group">
                            <label for="activo">Es Activo</label>
                            <select name="active" id="activo" class="form-control">
                                <option value="1" <?= ((isset($_POST['activo'])&& $_POST['activo'] == "1" ) ? "selected": ""  ) ?>>Activo</option>
                                <option value="0" <?= ((isset($_POST['activo'])&& $_POST['activo'] == "0" ) ? "selected": ""  ) ?>>Inactivo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" name="image" id="imagen"  required>
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
