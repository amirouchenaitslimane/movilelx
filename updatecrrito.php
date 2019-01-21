<?php

require_once 'application/includes.php';

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
    $cart->updateQty($product, $qty);
    flash('info', 'Has actualizado la cantidad del producto', 'success');
    redirect('vercarrito');
}else{
    flash( 'info', 'No se puede comprar mas de 10 unidades  ','danger' );

    redirect('vercarrito');
}
}


?>


