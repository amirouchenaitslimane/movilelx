<?php
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

if(isset($_GET['id'])){
     $categoria_manager->deleteCategoria($_GET['id']);
     flash('info','Has eliminado la categoía','alert-danger');
     redirect('categorias');

}