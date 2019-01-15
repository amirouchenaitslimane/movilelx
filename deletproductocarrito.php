<?php
require_once 'application/includes.php';
if(isset($_GET['id'])){
   $producto = $producto_manager->getProduct($_GET['id']);


$cart->remove($producto);
flash('info','!!! Vaya has quitado el product de la cesta !!! ','alert-info');
redirect('vercarrito');

}




?>


