<?php
$title ="nueva categoria";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>Nueva Categoria</h1>
            <hr>
            <?php
                $category=$categoria_manager->getOneCategory($_GET['id']);
               if($category){
                   if(isset($_POST['submit'])){
                       $nombre = $_POST['nombre'];
                       $descripcion = $_POST['descripcion'];
                       $padre = $_POST['padre_id'];
                       $estado = $_POST['activo'];
                       if($nombre !== $category->getNombre()){
                           if($categoria_manager->getByName($nombre)){
                               $category->setErrors('Nombre de la categoría ya existe');
                           }else{
                               $category->setNombre($nombre);
                           }
                       }
                       if(!empty($descripcion)){
                           $category->setDescripcion($descripcion);
                       }
                       

                       if(($estado != '1') and ($estado != '0')){
                           $category->setErrors('El estado de la catgoria no es valido');

                       }else{
                           $category->setActivo($estado);
                       }

                       if(empty($category->getErrors())){

                           $categoria_manager->updateCatgory($category);
                           flash('info','la categoria <b class="text-black-50">'.$category->getNombre().'</b></b> ha sido actualizada','alert-success');
                           header('location:categoriadetail.php?id='.$_GET['id']);


                       }else{
                           echo displayError($category->getErrors());
                       }
                   }





               }else{
                 flash('error','No puedes editar la categoria id no existe');
                 header('location:categorias.php');
               }
            ?>
            <form method="post" action="<?= $_SERVER['PHP_SELF']."?id=".$_GET['id'];?>">
                <div class="form-group">
                    <label for="nombre">Nombre categoria <small>(*)</small></label>
                    <input type="text" name="nombre" class="form-control" value="<?= $category->getNombre() ?>">
                    <small id="nombre" class="form-text text-muted">(*)este campo es obligatorio para crear categoria</small>
                </div>
                <div class="form-group">
                    <label for="descipcion"> Descripción <small>(opcional)</small></label>
                    <textarea name="descripcion" id="descipcion" class="form-control"><?= $category->getDescripcion() ?></textarea>
                    <small id="descipcion" class="form-text text-muted">(opcional) puedes poner une pequeña descripción en la categoria</small>
                </div>
                <div class="form-group">
                    <label for="padre">categoriaPadre</label>
                    <select name="padre_id" class="form-control" id="padre">
                        <option value="0" >Es Categoria Principal</option>
                        <?php foreach ($categoria_manager->getParents() as $categoria):?>
                            <option value="<?= $categoria->getId() ?>" <?= ($categoria->getId()== $category->getPadreId() ? "selected":"" ) ?>><?= $categoria->getNombre() ;?></option>
                        <?php endforeach;?>
                    </select>
                    <small id="padre" class="form-text text-muted">Si es hija de alguna categoria principal selecciona una en la lista</small>


                </div>
                <div class="form-group">
                    <label for="activo">Es Activa</label>
                    <select name="activo" id="" class="form-control">
                        <option value="1" <?= ($category->getActivo() == '1' ?"selected":"")?>>Activa</option>
                        <option value="0" <?= ($category->getActivo() == '0' ?"selected":"")?>>Inactiva</option>
                    </select>
                    <small id="activo" class="form-text text-muted">¿Poner la categoria en publico selecciona activa?</small>

                </div>

                <button class="btn btn-group-lg btn-success" name="submit" type="submit">Actualizar</button>
            </form>

        </div>




    </div>
    <!-- /.container-fluid -->
</div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
