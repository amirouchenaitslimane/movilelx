<?php
$title = "generar Pedido";
require_once 'application/parts/frontend/header.php';
if(!isset($_SESSION['user']) ){
    $_SESSION['anony'] = 'anonymous';
 redirect('login');
}else{
		$user = $_SESSION['user'];
}
?>
<div class="container">
    <div class="row">
        <?php
        include_once 'application/parts/frontend/categories.php';
        ?>
        <div class="col-md-9">
<?php
$p = [];//devolver los productos del carrito
foreach ($_SESSION['carrito'] as  $id_product=>$cantidad) {
		$p[] = $producto_manager->getProduct($id_product);
}
$pedido = new \app\Pedido();//crear instancia del pedido
$pedido->setUsuarioId($user->getId());//agregar ek id del usuario
foreach ($p as $product) {//recorrer productos para crear lineas de pedido
    $linea = new \app\LineaPedido();//crear instancia de linea
		$linea->setProductoId($product->getId());
		$linea->setCantidad($_SESSION['carrito'][$product->getId()]);//cantidad de cada producto agregadon en el carrito
		$linea->setPrecioCompra($_SESSION['carrito'][$product->getId()]*$product->getPrecio());//precio de campra de cada producto agregado al carrito con su cantidad
		$pedido->setLineas($linea);//agregar linea al carrito
}



$pedido_manager->process($pedido);
unset($_SESSION['carrito']);
flash('info','Pedido procesado con exito ! Gracias por confiar en movilelx','alert-success');

redirectWithParam('areacliente','id='.$user->getId())

?>

        </div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
