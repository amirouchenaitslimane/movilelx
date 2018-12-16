<?php require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
   header('location:/movilelx/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
		<div id="content-wrapper">
				<div class="container-fluid">
						<!-- Page Content -->
						<h1>Gestión de tienda</h1>
						<hr>

						<div class="row">
								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-primary o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fas fa-fw fa-comments"></i>
														</div>
														<div class="mr-5">Total Productos en tienda (150)</div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="#">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>
								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-warning o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fa fa-fw fa-list"></i>
														</div>
														<div class="mr-5">Total Pedidos (10)</div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="#">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>
								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-success o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fas fa-fw fa-shopping-cart"></i>
														</div>
														<div class="mr-5">Usuario de tienda (4)</div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="#">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>
								<div class="col-xl-3 col-sm-6 mb-3">
										<div class="card text-white bg-danger o-hidden h-100">
												<div class="card-body">
														<div class="card-body-icon">
																<i class="fas fa-fw fa-life-ring"></i>
														</div>
														<div class="mr-5">Clientes (6)</div>
												</div>
												<a class="card-footer text-white clearfix small z-1" href="#">
														<span class="float-left">View Details</span>
														<span class="float-right">
                    <i class="fa fa-angle-right"></i>
                  </span>
												</a>
										</div>
								</div>
						</div>
						<div class="row">
								<h1>Ultimos productos Añadidos Hoy</h1>

								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda, commodi consectetur cum deserunt ea eaque eius expedita inventore itaque maxime, neque nostrum possimus quas ratione reiciendis rem repellendus sunt?
						</div>



				</div>
				<!-- /.container-fluid -->
		</div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
