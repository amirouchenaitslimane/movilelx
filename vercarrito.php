<?php
$title = "Carrito de compra";
require_once 'application/parts/frontend/header.php';

?>
<div class="container">
    <div class="row">
        <?php
        include_once 'application/parts/frontend/categories.php';
        ?>
        <div class="col-md-9">
            <div class="card card-form  ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"><?= $title ?></h4>

                </div>
                <div class="card-body">
                    <?php
                   flash('info');
                   $products = $carrito_manager->getCrrito();

                    ?>
                    <div class="table-responsive cart_info">
                        <?php if(count($products) > 0):?>
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">
                                <td class="">img producto</td>
                                <td class=""></td>
                                <td class="">Price</td>
                                <td class="">Quantity</td>
                                <td class="">Total</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>


                            <?php foreach ($products as $product):?>
                                <tr>
                                    <td class="cart_product">
                                        <img src="uploads/products/<?= $product->getImagen() ?>" alt="" class=" img-fluid "  >
                                    </td>
                                    <td class="cart_description">
                                        <p><a href="verproducto.php?id=<?= $product->getId() ?>"><?= $product->getNombre() ?></a></p>

                                    </td>
                                    <td class="cart_price">
                                        <p><?= $product->getPrecio() ?> €</p>
                                    </td>
                                    <td class="cart_quantity">
                                       <div class="col-md-9">
                                           <form method="post" action="updatecrrito.php">
                                               <input type="number" name="qty" min="1" class="form-control" value="<?= $_SESSION['carrito'][$product->getId()]; ?>">
                                               <input type="hidden" name="prodict_id" class="form-control" value="<?= $product->getId(); ?>">
                                               <button type="submit" name="submit" class="btn btn-primary btn-update">
                                                   <i class="fa fa-refresh" aria-hidden="true"></i>
                                               </button>
                                           </form>
                                       </div>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?= ($product->getPrecio() * $_SESSION['carrito'][$product->getId() ]) ?> €</p>
                                    </td>
                                    <td class="cart_delete">
                                        <a class="cart_quantity_delete" href="deletproductocarrito.php?id=<?= $product->getId() ?>"><i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach;?>

                            <tr>
                                <td>  </td>
                                <td>  </td>

                                <td><h3>Total</h3></td>
                                <td>  </td>
                                <td class="text-right"><h5><strong><?= $carrito->total(); ?> €</strong></h5></td>
                            </tr>
                            <tr>
                                <td>  </td>
                                <td>  </td>
                                <td>  </td>
                                <td>
                                    <a type="button" href="index.php?p=guardar_carrito" class="btn btn-default">
                                        <span class="glyphicon glyphicon-shopping-cart"></span> Guardar Carrito
                                    </a></td>
                                <td>
                                    <a type="button" href="index.php?p=micarrito&process" class="btn btn-success">
                                        Procesar Carrito <span class="glyphicon glyphicon-play"></span>
                                    </a></td>
                                <td>
                                    <a type="button" href="index.php?p=vaciar_carrito" class="btn btn-success">
                                        Vaciar carrito <span class="glyphicon glyphicon-play"></span>
                                    </a></td>

                            </tr>

                            <?php else: echo "<h3>Carrito vacio</h3>"?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
