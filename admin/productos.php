<?php
$title ="Productos";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
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
                <div class="col-md-12 mt-3">
                    <?php


                    $clientes=$producto_manager->getAll();



										?>

										<table id="table_id" class="table display">
												<thead>
												<tr>
														<th>nombre</th>

														<th>precio</th>
														<th>fecha creacion</th>
														<th>Estado</th>
														<th>Accion</th>
												</tr>
												</thead>
												<tbody>
												<?php foreach ($clientes as $p):?>
												<tr>
														<td><?= $p->getNombre() ?></td>

														<td><?= $p->getPrecio() ?> €</td>
														<td><?= $p->getCreated_at() ?></td>
														<td><?= $p->getEstadoOption()[$p->getActive()]?></td>
														<td>
																<a href="productocaractiristicas.php?id=<?= $p->getId()?>" title="Caracteristicas" class="btn btn-success"><i class="fa fa-cog"></i></a>

																<a href="productoedit.php?id=<?= $p->getId()?>" title="Editar" class="btn btn-info"><i class="fa fa-pencil"></i></a>
																<a href="productoview.php?id=<?= $p->getId() ?>" title="Ver" class="btn btn-primary"><i class="fa fa-eye"></i></a>
																<a href="productodelete.php?id=<?= $p->getId() ?>" title="Eliminar" class="btn btn-danger " onclick="return confirm('¿Seguro quires eliminar el producto ?') "><i class="fa fa-trash"></i></a>
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