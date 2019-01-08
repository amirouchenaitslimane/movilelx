<?php require_once 'application/parts/frontend/header.php';
if(isset($_GET['product_id'])) {
    if (isset($_GET['cantidad'])) {
        $cty = (int)$_GET['cantidad'];
    } else {
        $cty = 1;
    }

    DEBUG($cty);

        $product = $producto_manager->getProduct($_GET['product_id']);
    if($product !== null){
        flash( 'info', 'Producto añadido a la cesta  ','alert-success' );

        $carrito->add($product, $cty);
        if(isset($_GET['cantidad'])){
            redirectWithParam('verproducto','id='.$_GET['product_id']);
				}else{
            redirectWithParam('categoria','id='.$_GET['cat']);
				}


		}else{
        redirectWithParam('categoria','id='.$_GET['cat']);


		}



}else{
		redidect('index');
}
    ?>

