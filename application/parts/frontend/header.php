<?php include_once "application/includes.php";?>
<!doctype html>
<html lang="en">
<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="icon" href="assets/frontend/img/favicon.ico">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" href="assets/frontend/css/style.css">
		<title>MovilElx| <?= (isset($title) ? $title: "no title ")?></title>
</head>
<body>
<div class="wrapper">
				<header>
						<div class="header_top"><!--header_top-->
								<div class="container">
										<div class="row">
												<div class="col-sm-6 col-12 col-md-6">
														<div class="contactinfo">
																<ul class="nav nav-pills">
																		<li class="nav-item"><a class="nav-link" href="tel:(34) 966 91 22 60 "><i class="fa fa-phone"></i> (34) 966 91 22 60 </a></li>
																		<li class="nav-item"><a class="nav-link" href="mailto:amirouchenaitslimane@gmail.com"><i class="fa fa-envelope"></i> amirouchenaitslimane@gmail.com</a></li>
																</ul>
														</div>
												</div>
												<div class="col-sm-6 col-12 col-md-6">
														<div class="social-icons pull-right">
																<ul class="nav nav-pills">
																		<li class="nav-item"><a class="nav-link" href="https://www.facebook.com/iesseveroochoaelche/"><i class="fa fa-facebook"></i></a></li>
																		<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"></i></a></li>
																		<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a></li>
																		<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-dribbble"></i></a></li>
																		<li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google-plus"></i></a></li>
																</ul>
														</div>
												</div>
										</div>
								</div>
						</div><!--/header_top-->
						<div class="header-middle"><!--header-middle-->
								<div class="container">
										<div class="row">
												<div class="col-sm-4 col-6 col-md-4">
														<div class="logo pull-left">
																<a class="navbar-brand" href="index.php"><img src="assets/frontend/img/logo1.png" alt="" class="img-fluid" /></a>
														</div>

												</div>
												<div class="col-sm-8 col-6 col-md-8">
														<div class="shop-menu pull-right">
																<ul class="nav">
																		<li class="nav-item menu">
																				<button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
																						<i class="fa fa-bars text-info"></i> Menú
																				</button></li>
                                    <?php if(isset($_SESSION['user'])): ?>

																		<li class="nav-item"><a href="logout.php"> <i class="fa fa-lock"></i> Logout (<?= $_SESSION['user']->getNombre() ?>)</a></li>
																		<?php else:?>
																				<li class="nav-item"><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>


                                    <?php endif;?>
																		<li class="nav-item"><a href="vercarrito.php"><i class="fa fa-shopping-cart"></i> Cart(<?= (($cart !== null) ? $cart->count() : 0 ) ?>)</a></li>

																</ul>
														</div>
												</div>
										</div>
								</div>
						</div><!--/header-middle-->
						<div class="header-bottom"><!--header-bottom-->
								<nav class="navbar navbar-expand-lg navbar-light " style="margin-right: 47px;">
										<div class="container">
												<div class="collapse navbar-collapse mainmenu" id="navbarSupportedContent">
														<ul class="navbar-nav mr-auto">
																<li class="nav-item active">
																		<a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
																</li>
																<li class="nav-item"> <a class="nav-link" href="quienessomos.php">Quiénes somos</a> </li>


																<li class="nav-item">
																		<a class="nav-link" href="registrar.php">Hazte cliente</a>
																</li>



														</ul>
														<ul class="nav navbar-nav navbar-right">
                               <?php if(isset($_SESSION['user'])):?>
																<li class="nav-item"> <a class="nav-link" href="areacliente.php">Area Cliente</a> </li>

																<?php if(!$_SESSION['user']->isCliente()): ?>
																		<li class="nav-item"> <a class="nav-link " href="admin/index.php"><i class="fa fa-dashboard icon-cart"></i> Dashboard</a> </li>



																<?php endif; endif?>
														</ul>
												</div>

										</div>
								</nav>
						</div>