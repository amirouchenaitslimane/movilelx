<?php
$title = "index";
require_once 'application/parts/frontend/header.php' ;

?>
<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
        <div class="col-md-9 col-sm-12 col-12 wrapper">
            <div class="row">
                <div class="jumbotron oferta_banner">
                    <p class="lead text-center">Descubre las mejores ofertas de Movilelx!</p>
                    <div class="row no-gutters">

                        <hr class="my-4">
                        <div class="col-md-4 col-12 col-sm-4">
                            <img src="assets/frontend/img/oferta.png" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-8 col-12 col-sm-8 mt-4">

                            <p class="lead">No pierdes las mejores ofertas de nustra tienda descubre las últimas tecnologias en nustra tienda movilelx</p>
                            <p class="lead mt-5 ">
                                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12">
                <div class="row">
                    <?php
                    $products = $producto_manager->promo();
                    foreach ($products as $product):?>
                        <div class="col-sm-4 col-md-4 col-6">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        <span class="p-2 indicator <?=($product->tipo_oferta !== '0')?(new \app\Producto())->tipoOfertaOpcion()[$product->tipo_oferta]:'d-none' ?>"><?= (new \app\Producto())->tipoOfertaOpcion()[$product->tipo_oferta]; ?></span>
                                        <img src="uploads/products/<?= $product->imagen ?>" alt="" class="img-fluid" />
                                        <h6 class="lead title"><?= $product->nombre; ?> </h6>
                                        <?php if($product->precio_reducido !== null):?>
                                            <p><span class="precio"><?= $product->precio_reducido; ?> €</span></p>
                                            <span class="dashed text-muted"><?= $product->precio ?>€</span> <span class="tt"><?= porcentaje($product->precio,$product->precio_reducido)?></span>
                                        <?php else:?>
                                            <p><span class="precio"><?= $product->precio; ?> €</span></p>

                                        <?php endif;?>

                                        <p>
                                            <a href="verproducto.php?id=<?= $product->id ?>" class="btn btn-movilex  btn-success "> Ver</a>

                                            <a href="addcard.php?product_id=<?= $product->id ?>" class="btn btn-default add-to-cart btn-movilex"> <i class="fa fa-shopping-cart"></i> Añadir</a>

                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php endforeach;?>

                </div>
            </div>


        </div>
    </div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>
