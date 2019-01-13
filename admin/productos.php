<?php
$title ="Productos";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:'._SERVER.'admin/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>Gestión de Productos</h1>
            <hr>
            <?php

            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <a href="nuevoproducto.php" class="btn btn-primary"><i class="fa fa-plus"></i> Nuevo producto</a>
                </div>
                <div class="col-md-12 mt-3 mb-3">
                    <?php  $productos=$producto_manager->getAll(); ?>

										<table id="table_id" class="table table-bordered display">
												<thead>
												<tr>

														<th>image</th>
														<th>nombre</th>
														<th>precio</th>
														<th>fecha creacion</th>
														<th>Estado</th>
														<th>categoría</th>
														<th>fecha creacion</th>
														<th>Accion</th>
												</tr>
												</thead>
												<tbody>
												<?php foreach ($productos as $p):?>
												<tr>
														<td><img src="../uploads/products/<?= $p->imagen ?>" class="img-fluid " width="100px" height="100px">	</td>
														<td><?= $p->nombre ?></td>

														<td><?= $p->precio ?> €</td>
														<td><?= $p->created_at ?></td>
														<td><?= ((new \app\Producto())->getEstadoOption()[$p->active]) ?></td>
														<td><?= $p->category ?></td>
														<td><?= $p->created_at?></td>
														<td>
																<a href="productocaractiristicas.php?id=<?= $p->id?>" title="Caracteristicas" class="btn btn-success"><i class="fa fa-cog"></i></a>

																<a href="productoedit.php?id=<?= $p->id?>" title="Editar" class="btn btn-info"><i class="fa fa-pencil"></i></a>
																<a href="productoview.php?id=<?= $p->id ?>" title="Ver" class="btn btn-primary"><i class="fa fa-eye"></i></a>
																<a href="productodelete.php?id=<?= $p->id ?>" title="Eliminar" class="btn btn-danger " onclick="return confirm('¿Seguro quires eliminar el producto ?') "><i class="fa fa-trash"></i></a>
														</td>
												</tr>
												<?php endforeach;?>
												</tbody>
										</table>

                </div>

            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>
