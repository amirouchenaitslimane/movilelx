<?php require_once '../application/includes.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
		redirect('../index');}
?>
<!DOCTYPE html>
<html lang="es">
<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Movilelx| <?= (isset($title) ? $title: "no title ")?></title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<link href="../assets/backend/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/backend/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
		<link href="../assets/backend/css/demo.css" rel="stylesheet" />
</head>
<body>
<div class="wrapper">
		<?php
		require_once 'sidebar.php';
		?>
		<div class="main-panel">
				<nav class="navbar navbar-expand-lg " color-on-scroll="500">
						<div class=" container-fluid ">
								<a class="navbar-brand" href="index.php"> Administración </a>

								<button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
										<span class="navbar-toggler-bar burger-lines"></span>
										<span class="navbar-toggler-bar burger-lines"></span>
										<span class="navbar-toggler-bar burger-lines"></span>
								</button>
								<div class="collapse navbar-collapse justify-content-end" id="navigation">
										<ul class="nav navbar-nav mr-auto">
												<li class="nav-item"><a href="index.php" class="nav-link" data-toggle="dropdown"><i class="nc-icon nc-palette"></i><span class="d-lg-none">Administración</span></a></li>
												</ul>
										<ul class="navbar-nav ml-auto">
												<li class="nav-item "><a class="nav-link text-success" href="../index.php"><span class="no-icon">Ir a la tienda</a></li>
												<li class="nav-item"><a class="nav-link" href="../logout.php"><span class="no-icon">Logout<span class="small">(<?= htmlspecialchars(trim($_SESSION['user']->getNombre()));?>)</span></span></a></li>
										</ul>
								</div>
						</div>
				</nav>
