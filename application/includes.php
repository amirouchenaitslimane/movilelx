<?php
include_once 'functions.php';
require_once 'config.php';
require_once 'classes/Database.php';
require_once 'classes/Hydrator.php';
require_once 'classes/Usuario.php';
require_once 'classes/Categoria.php';

require_once 'managers/UsuarioManager.php';
require_once 'managers/CategoriaManager.php';

session_start();
$usuario_manager = new \app\UsuarioManager();
$categoria_manager = new \app\CategoriaManager();
