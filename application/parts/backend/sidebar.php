<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fa fa-tachometer"></i>
            <span>Dashboard</span>
        </a>
    </li>

				<li class="nav-item">
						<a class="nav-link" href="clientes.php">
								<i class="fa fa-fw fa-user"></i>
								<span>Gestion Clientes</span></a>
				</li>

    <?php
    if($_SESSION['user']->isSuperAdmin()):?>
				<li class="nav-item">
						<a class="nav-link" href="usuarios.php">
								<i class="fa fa-fw fa-user"></i>
								<span>Gestion Usuarios</span></a>
				</li>
    <?php endif;?>
    
</ul>