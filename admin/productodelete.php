<?php
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
header('location:/movilelx.site/index.php');
}

if(isset($_GET['id'])){
    $p = $producto_manager->getProduct($_GET['id']);
     if($p !== null){
         $producto_manager->deleteProduct($p);
         flash('info','Producto ha sido  eliminado ','alert-info');
         redirect('productos');
     }

}else{
    redirect('productos');
}
?>

