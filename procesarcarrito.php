<?php

require_once 'application/includes.php';
if(!isset($_SESSION['user']) ){
    $_SESSION['anony'] = 'anonymous';
 redirect('login');
}else{
		$user = $_SESSION['user'];
}
?>

<?php
$p = [];//devolver los productos del carrito
$c = unserialize($_COOKIE['carrito']);





foreach ($c as  $id_product=>$cantidad) {
		$p[] = $producto_manager->getProduct($id_product);
}



$pedido = new \app\Pedido();//crear instancia del pedido
$pedido->setUsuarioId($user->getId());//agregar ek id del usuario
foreach ($p as $product) {//recorrer productos para crear lineas de pedido
    $linea = new \app\LineaPedido();//crear instancia de linea
		$linea->setProductoId($product->getId());
		$linea->setCantidad($c[$product->getId()]);//cantidad de cada producto agregadon en el carrito
		$linea->setPrecioCompra($c[$product->getId()]*$product->getPrecio());//precio de campra de cada producto agregado al carrito con su cantidad
		$pedido->setLineas($linea);//agregar linea al carrito
}



$pedido_manager->process($pedido);
setcookie('carrito','',time() - (86400 / 30));

//DEBUG($_COOKIE['carrito']);

flash('info','Pedido procesado con exito ! Gracias por confiar en movilelx','alert-success');

redirectWithParam('areacliente','id='.$user->getId())

?>
