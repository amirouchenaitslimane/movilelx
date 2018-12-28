<?php
$title = "Carrito de compra";
require_once 'application/parts/frontend/header.php';
if(isset($_GET['id'])){
   $producto = $producto_manager->getProduct($_GET['id']);


$carrito->remove($producto);
flash('info','!!! Vaya has quitado el product de la cesta !!! ','alert-info');
redidect('vercarrito');

}




?>


