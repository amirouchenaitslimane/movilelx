<?php require_once 'application/includes.php';
if(isset($_GET['product_id'])) {
    if (isset($_GET['cantidad'])) {
        $cty = (int)$_GET['cantidad'];


    } else {
        $cty = 1;
    }
    $product = $producto_manager->getProduct($_GET['product_id']);


    //aqui no se puede poner un valor mas de 10;
    if($cty >10 || $cty+ $cart->countProductSingle($product) >10 ){
        flash( 'info', 'No se puede comprar mas de 10 unidades  ','danger' );

        redirectWithParam('verproducto','id='.$_GET['product_id']);
    }else {

        if ($product !== null ) {
            flash('info', 'Producto añadido a la cesta  ', 'success');

            $cart->add($product,$cty);
            if(isset($_GET['cantidad'])){//si existe la cantidad (ha venido de ver producto)
                redirectWithParam('verproducto', 'id=' . $_GET['product_id']);
            }elseif(isset($_GET['cat'])){ //si existe la categiria ha venido de la categoria
                redirectWithParam('categoria', 'id=' . $_GET['cat']);
            }else{//ha venido de productos aleatorios
                redirect('vercarrito');
            }
            //(isset($_GET['cantidad']) ? redirectWithParam('verproducto', 'id=' . $_GET['product_id']) : redirectWithParam('categoria', 'id=' . $_GET['cat']));
            } else {

            redirectWithParam('categoria', 'id=' . $_GET['cat']);
         }

    }

}else{
		redirect('index');
}
    ?>

