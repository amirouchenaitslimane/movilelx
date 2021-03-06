<?php
$title ="nueva categoria";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?>
<div class="content">
		<div class="container-fluid">
				<div class="row">
						<div class="col-md-12">
                <?php
                flash('info');

                ?>
								<div class="card">
										<div class="card-header">
												<h4 class="card-title">
														Nueva Categoría

												</h4>
										</div>
										<div class="card-body">
                        <?php
                        if(isset($_POST['submit'])){


                            $category = new \app\Categoria($_POST);

                            if(($_POST['activo'] != '1') and ($_POST['activo']  != '0')){
                                $category->setErrors('El estado de la catgoria no es valido');
                            }
//    if(!$categoria_manager->getParentsCategory($_POST['padre_id'])){
//        $category->setErrors('No existe la categoria  padre ');
//    }


                            if(empty($category->getErrors())){
                                flash('success','Has añadido nueva categoria en la tienda !','alert-success');
                                $categoria_manager->addCategory($category);
                                redirect('categorias');
                            }else{
                                echo displayError($category->getErrors());
                            }


                        }
                        ?>
												<form method="post" action="nuevacategoria.php">
														<div class="form-group">
																<label for="nombre">Nombre categoria <small>(*)</small></label>
																<input type="text" name="nombre" class="form-control">
																<small id="nombre" class="form-text text-muted text-info">(*)este campo es obligatorio para crear categoria</small>
														</div>
														<div class="form-group">
																<label for="descipcion"> Descripción <small>(opcional)</small></label>
																<textarea name="descripcion" id="descipcion" class="form-control"></textarea>
																<small id="descipcion" class="form-text text-muted text-info">(opcional) puedes poner une pequeña descripción en la categoria</small>
														</div>
														<div class="form-group">
																<label for="padre">categoriaPadre</label>
																<select name="padre_id" class="form-control" id="padre">
																		<option value="0" >Es Categoria Principal</option>
                                    <?php foreach ($categoria_manager->getParents() as $categoria):?>
																				<option value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ;?></option>
                                    <?php endforeach;?>
																</select>
																<small id="padre" class="form-text text-muted text-info">Si es hija de alguna categoria principal selecciona una en la lista</small>


														</div>
														<div class="form-group">
																<label for="activo">Estado</label>
																<select name="activo" id="" class="form-control">
																		<option value="1">Activa</option>
																		<option value="0">Inavtiva</option>
																</select>
																<small id="activo" class="form-text text-muted text-info">¿Poner la categoria en publico selecciona activa?</small>

														</div>

														<button class="btn  btn-success btn-fill pull-right" name="submit" type="submit">Crear</button>
												</form>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>

