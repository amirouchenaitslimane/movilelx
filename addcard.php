<?php require_once 'application/parts/frontend/header.php';



?>
<div class="" style="margin-top: 200px">
    <?php
if(isset($_GET['product_id'])) {
    if (isset($_GET['cantidad'])) {
        $cty = $_GET['cantidad'];
    } else {
        $cty = 1;
    }
    $product = $producto_manager->getProduct($_GET['product_id']);
    if($product !== null){
        flash( 'info', 'Producto añadido a la cesta  ','alert-success' );

        $carrito->add($product, $cty);
        header('location:verproducto.php?id='.$_GET['product_id']);
		}else{
    		header('location:categoria.php?id='.$_GET['product_id']);
		}



}else{
		redidect('index');
}
    ?>
</div>
