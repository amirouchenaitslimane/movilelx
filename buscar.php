<?php
$title = "Categorias";
require_once 'application/parts/frontend/header.php';
?>
<div class="container">
  <div class="row">
    <?php require_once 'application/parts/frontend/categories.php'?>
    <div class="col-md-9 col-sm-12 col-12 wrapper">
      <?php
if(isset($_GET['cat']) && isset($_GET['q'])){
$cat = $_GET['cat'];
$query = $_GET['q'];
$prod = $producto_manager->buscador_productos($cat,$query );
}else{
redirect('index');
}
?>
      <div class="col-md-12 col-sm-12 col-12">
        <div class="row">
          <?php if(count($prod) > 0):?>
          <div class="col-md-12 mt-4 mb-4">
            <div class="row">
              <h3 class="text-info">Hemos encontrado 
                <strong class="text-success">
                  <?= count($prod) ?> 
                </strong> resultado(s)
              </h3>
              <hr>
            </div>
          </div>
          <?php foreach ($prod as $products):?>
          <div class="col-sm-4 col-md-4 col-6">
            <div class="product-image-wrapper">
              <div class="single-products">
                <div class="productinfo text-center">
                  <span class="p-2 indicator <?=($products->tipo_oferta !== '0')?(new \app\Producto())->tipoOfertaOpcion()[$products->tipo_oferta]:'d-none' ?>">
                    <?= (new \app\Producto())->tipoOfertaOpcion()[$products->tipo_oferta]; ?>
                  </span>
                  <img src="uploads/products/<?= $products->imagen ?>" alt="" class="img-fluid" />
                  <h6 class="lead title">
                    <?= $products->nombre; ?> 
                  </h6>
                  <?php if($products->precio_reducido !== null):?>
                  <p>
                    <span class="precio">
                      <?= $products->precio_reducido; ?> €
                    </span>
                  </p>
                  <span class="dashed text-muted">
                    <?= $products->precio ?>€
                  </span> 
                  <span class="tt">
                    <?= porcentaje($products->precio,$products->precio_reducido)?>
                  </span>
                  <?php else:?>
                  <p>
                    <span class="precio">
                      <?= $products->precio; ?> €
                    </span>
                  </p>
                  <?php endif;?>
                  <p>
                    <a href="verproducto.php?id=<?= $products->id ?>&cat=<?= $_GET['id'] ?>" class="btn btn-movilex  btn-success "> Ver
                    </a>
                    <a href="addcard.php?product_id=<?= $products->id ?>&cat=<?= $_GET['id'] ?>" class="btn btn-default add-to-cart btn-movilex"> 
                      <i class="fa fa-shopping-cart">
                      </i> Añadir
                    </a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach;?>
          <?php else: echo '<h3 class="text-center text-warning">No Hay resultado !</h3>'; ?>
          <?php endif;?>
        </div>
      </div>
    </div>
    <?php require_once 'application/parts/frontend/footer.php' ?>
