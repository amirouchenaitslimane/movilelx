<?php
$title ="Categorias";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx.site/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>Client detail</h1>
            <hr>

            <div class="row">
             <div class="col-md-12">
                 <div class="card">
                     <div class="card-body">
                         <?php
                         $cliente = $usuario_manager->findUsuario($_GET['id']);
                       if ($cliente == null){
                          redidect('clientes');
                       }
                         ?>

                         <p><strong class="text-info">Nombre </strong> <?= $cliente->getNombre() ?></p>
                         <p><strong class="text-info">Apellido </strong> <?= $cliente->getApellido() ?></p>
                         <p><strong class="text-info">Email </strong> <?= $cliente->getEmail() ?></p>
                         <p><strong class="text-info">fecha creación </strong> <?= $cliente->getCreated() ?></p>
<div >
<?php
$pedidos= $pedido_manager->getPedido($cliente->getId())

?>
    <h4>Pedidos</h4>
    <table class="table">
        <thead>
        <th>id</th>
        <th>estado</th>
        <th>fecha</th>
        <th></th>
        </thead>
        <tbody>
        <?php foreach ($pedidos as $pedido):?>
        <tr>
            <td><?= $pedido->getId() ?></td>
            <td><?= $pedido->getEstado() ?></td>
            <td><?= dateFormatter($pedido->getFecha()) ?></td>
            <td>ver</td>
        </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
                     </div>

                 </div>
             </div>
            </div>
        </div>
    </div>
</div>
<?php include_once  '../application/parts/backend/footer.php'?>