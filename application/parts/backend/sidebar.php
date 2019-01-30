<div class="sidebar" data-image="../assets/backend/img/sidebar-5.jpg">
		<div class="sidebar-wrapper">
				<div class="logo"><a href="" class="simple-text"><?= $_SESSION['user']->getNombre(); ?></a></div>
				<ul class="nav">
						<li class="nav-item active"><a class="nav-link" href="index.php"><i class="nc-icon nc-chart-pie-35"></i><p>Dashboard</p></a></li>
						<li class="nav-item active"><a class="nav-link" href="productos.php"><i class="nc-icon nc-chart-pie-35"></i><p>Productos</p></a></li>
						<li class="nav-item active"><a class="nav-link" href="clientes.php"><i class="nc-icon nc-chart-pie-35"></i><p>Gestión clientes</p></a></li>
						<li class="nav-item active"><a class="nav-link" href="pedidos.php"><i class="nc-icon nc-chart-pie-35"></i><p>Pedidos</p></a></li>
						<li class="nav-item active"><a class="nav-link" href="categorias.php"><i class="nc-icon nc-chart-pie-35"></i><p>Gestón Categorias</p></a></li>
<?php
if($_SESSION['user']->isSuperAdmin()):?>
						<li class="nav-item active"><a class="nav-link" href="usuarios.php"><i class="nc-icon nc-chart-pie-35"></i><p>Gestion Usuarios</p></a></li>
<?php endif;?>
				</ul>
		</div>
</div>
