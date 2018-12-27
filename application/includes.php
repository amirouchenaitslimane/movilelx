<?php
include_once 'functions.php';
require_once 'config.php';
require_once 'classes/Database.php';
require_once 'classes/Hydrator.php';
require_once 'classes/Usuario.php';
require_once 'classes/Categoria.php';
require_once 'classes/Caracteristicas.php';
require_once 'classes/Carrito.php';
require_once 'classes/Producto.php';

require_once 'managers/UsuarioManager.php';
require_once 'managers/CategoriaManager.php';
require_once 'managers/ProductoManager.php';
require_once 'managers/CataractisticasManager.php';
require_once 'managers/CarritoManager.php';
session_start();
$carrito = new \app\Carrito();
$usuario_manager = new \app\UsuarioManager();
$categoria_manager = new \app\CategoriaManager();
$producto_manager = new \app\ProductoManager();
$cm = new \app\CataractisticasManager();

$carrito_manager = new \app\CarritoManager();
