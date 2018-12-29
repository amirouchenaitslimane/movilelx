<?php
$title = "generar Pedido";
require_once 'application/parts/frontend/header.php';
if(!isset($_SESSION['user']) ){
    $_SESSION['anony'] = 'anonymous';
   header('location:login.php');
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


        </div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
