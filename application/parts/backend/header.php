<?php
require_once '../application/includes.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Movilelx| <?= (isset($title) ? $title: "no title ")?></title>

		<!-- Bootstrap core CSS-->
		<link href="../assets/backend/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom fonts for this template-->
		<link href="../assets/backend/css/all.min.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
		<!-- Page level plugin CSS-->
		<!--		<link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">-->

		<!-- Custom styles for this template-->
		<link href="../assets/backend/css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">
<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

		<a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

		<button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
				<i class="fa fa-bars"></i>
		</button>
		<ul class="navbar-nav ml-auto ml-md-0">

				<li class="nav-item">
						<a href="../logout.php" class="nav-link">Logout</a>
				</li>
		</ul>

</nav>

