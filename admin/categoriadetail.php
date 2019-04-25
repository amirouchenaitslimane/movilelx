<?php
$title ="Categorias";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?>
<div class="content">
		<div class="container-fluid">
		<?php
		  $products = $categoria_manager->getProductsCategoryAdmin($_GET['id']);

		  $category = $categoria_manager->getOneCategory($_GET['id']);
		?>
		<div class="row">
		  <div class="col-md-12">
                <?php
                flash('info');
                ?>
		   <div class="card">
			<div class="card-header">
			<h4 class="card-title text-warning">
					<?= $category->getNombre() ; ?> - <strong class="text-white p-1 <?=(($category->getActivo() == '0')? 'bg-danger':'bg-success' ) ?>"><?= \app\Categoria::getEstadoOption()[$category->getActivo()]?></strong>
			</h4>
			</div>
			<div class="card-body">
			<div class="col-md-12 col-sm-12">
			<table class="table table-responsive table-striped">
			<thead>
			<tr>
			<th>nombre</th>
			<th>descripcion</th>
			<th>Acciones</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td><?= $category->getNombre() ?></td>
			<td><?= $category->getDescripcion()?></td>
			<td>
			<a href="deletecategoria.php?id=<?= $category->getId() ?>" onclick="return confirm('¿Quieres eliminar la categoria ?')" class=" mr-1 btn btn-danger btn-fill" title="Eliminar la categoría"><i class="fa fa-trash"></i></a>
			<a href="editcategoria.php?id=<?= $category->getId() ?>"  class="btn btn-primary btn-fill " title="Editar la categoria"><i class="fa fa-pencil"></i></a></td>

			</tr>
			</tbody>
			</table>
			</div>

			</div>
			</div>
		<div class="card">
		<div class="card-header">	
		<h4 class="card-title text-warning">Productos Relacionados</h4>
		<hr>
		</div>
		<div class="card-body">

		<table id="table_id" class="table display table-striped table-responsive">
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
			<?php foreach ($products as $p):?>
			<tr>
			<td>

			<img src="../uploads/products/<?= $p->imagen?>" class="img-fluid img-responsive" width="100px" height="100px">
			<?= $p->nombre ?></td>

			<td><?= $p->precio ?> €</td>
			<td><?= $p->created_at ?></td>
			<td>
			<i class="<?= (($p->active == '1')?'fa fa-check-circle  text-success':'fa fa-ban text-danger' ) ?> "></i>
			<?= \app\Producto::estado()[$p->active]?></td>

			<td>
			<a href="productocaractiristicas.php?id=<?= $p->id?>" class="btn btn-success mr-1 btn-fill"><i class="fa fa-cog"></i></a>

			<a href="productoedit.php?id=<?= $p->id?>" class="btn btn-info btn-fill"><i class="fa fa-pencil "></i></a>
			</td>
			</tr>
			<?php endforeach;?>
		</tbody>
		</table>

</div>
</div>
</div>
</div>
</div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>
