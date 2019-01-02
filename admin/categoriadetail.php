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
            <h1>Gestión de Categorías</h1>
            <hr>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">

                <div class="col-md-12 mt-3">

                 <?php
                $products = $categoria_manager->getProductsCategory($_GET['id']);
                $category = $categoria_manager->getOneCategory($_GET['id']);


                ?>

									<div class="row">
											<div class="col-md-5">
													<table class="table ">
															<thead>
															<tr>
																	<th>nombre</th>
																	<th></th>
															</tr>
															</thead>
															<tbody>
															<tr>
																	<td><?= $category->getNombre() ?></td>
																	<td><a href="deletecategoria.php?id=<?= $category->getId() ?>" onclick="return confirm('¿Quieres eliminar la categoria ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
																	<td><a href="editcategoria.php?id=<?= $category->getId() ?>"  class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>

															</tr>
															</tbody>
													</table>
											</div>
									</div>


										<h3>Productos Relacionados</h3>
										<table id="table_id" class="table display">
												<thead>
												<tr>
														<th>nombre</th>
														<th>precio</th>
														<th>fecha creacion</th>

														<th>Accion</th>
												</tr>
												</thead>
												<tbody>
                        <?php foreach ($products as $p):?>
														<tr>
																<td><?= $p->nombre ?></td>

																<td><?= $p->precio ?> €</td>
																<td><?= $p->created_at ?></td>

																<td>
																		<a href="productocaractiristicas.php?id=<?= $p->id?>" class="btn btn-dark"><i class="fa fa-pencil"></i></a>

																		<a href="productoedit.php?id=<?= $p->id?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
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
<script>
    $(document).ready( function () {
        var table = $('#table_id');
        table.DataTable({
            "language": {

                "lengthMenu": "Mostrar  _MENU_  por página",
                "zeroRecords": "No hay resultado ",
                "info": "Mostrar página _PAGE_ de _PAGES_",
                "infoEmpty": "No Registros disponibles",
                "infoFiltered": "(filtrar de _MAX_  registros)",
                "search": "Buscar: _INPUT_ ",
                "paginate": {
                    "next": "Sigiente ",
                    "previous": "Atrás"
                },


            },

        });


    } );

</script>