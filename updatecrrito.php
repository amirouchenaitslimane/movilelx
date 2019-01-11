<?php
$title = "Carrito de compra";
require_once 'application/parts/frontend/header.php';

//logic
if(isset($_POST['submit'])){
    //$carrito->updateQty()

if(isset($_POST['prodict_id'])){
    $product = $producto_manager->getProduct($_POST['prodict_id']);
    //DEBUG($product);
}

if(isset($_POST['qty'])){
    $qty = $_POST['qty'];
}else{
    $qty = 1;
}

if($qty <= 10 || (int)($qty + $_SESSION['carrito'][$product->getId()]) <= 10 ) {
    $carrito->updateQty($product, $qty);
    flash('info', 'Has actualizado la cantidad del producto', 'alert-success');
    redidect('vercarrito');
}else{
    flash( 'info', 'No se puede comprar mas de 10 unidades  ','alert-danger' );

    redidect('vercarrito');
}
}


?>


