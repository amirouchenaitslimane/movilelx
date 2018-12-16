<?php
include_once "application/includes.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Movilelx | <?= (isset($title) ? $title: "no title ")?></title>

    <!-- Bootstrap core CSS -->
<!--    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/frontend/css/style.css">
</head>

<body>
<nav class="navbar navbar-expand-lg  ">
		<div class="container">
		<a class="navbar-brand" href="index.php">Movilelx</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ml-auto">
						<li class="nav-item active"> <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
						<li class="nav-item"> <a class="nav-link" href="quienessomos.php">Quiénes somos</a> </li>
            <?php if(isset($_SESSION['user'])): ?>
								<li class="nav-item"> <a class="nav-link" href="logout.php">salir (<?= $_SESSION['user']->getNombre() ?>)</a> </li>

                <?php if(!$_SESSION['user']->isCliente()): ?>
										<li class="nav-item"> <a class="nav-link " href="admin/index.php"><i class="fa fa-dashboard icon-cart"></i>Dashboard</a> </li>
                <?php else:?>
										<li class="nav-item"> <a class="nav-link" href="areacliente.php">Area Cliente</a> </li>

                <?php endif;?>
            <?php else:?>
								<li class="nav-item"> <a class="nav-link" href="login.php">Login</a> </li>
								<li class="nav-item"> <a class="nav-link" href="registrar.php">Hazte Cliente</a> </li>

            <?php endif;?>

						<li class="nav-item">
								<a class="nav-link " href="#"><i class="fa fa-shopping-cart icon-cart"></i> Cart(3)
								</a>
						</li>
				</ul>
		</div>
		</div>
</nav>
<section>