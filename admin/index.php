<?php
require_once '../application/includes.php';

if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
   header('location:/movilelx/index.php');
}

?>
<h1>Esta pagina es solo para los administradores de la tienda</h1>
