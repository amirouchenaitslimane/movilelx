<?php require_once 'application/parts/frontend/header.php';
if(isset($_GET['product_id'])) {
    if (isset($_GET['cantidad'])) {
        $cty = (int)$_GET['cantidad'];


    } else {
        $cty = 1;
    }

    //aqui no se puede poner un valor mas de 10;
    if($cty >10){
        flash( 'info', 'No se puede comprar mas de 10 unidades  ','alert-danger' );

        redirectWithParam('verproducto','id='.$_GET['product_id']);
    }else {

        $product = $producto_manager->getProduct($_GET['product_id']);
        if ($product !== null) {
            flash('info', 'Producto añadido a la cesta  ', 'alert-success');

            $carrito->add($product, $cty);
            (isset($_GET['cantidad']) ? redirectWithParam('verproducto', 'id=' . $_GET['product_id']) : redirectWithParam('categoria', 'id=' . $_GET['cat']));
        } else {
            redirectWithParam('categoria', 'id=' . $_GET['cat']);
        }

    }

}else{
		redidect('index');
}
    ?>

