<?php require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || $_SESSION['user']->isCliente()){
    header('location:/movilelx/index.php');
}
if(isset($_GET['id'])){
    $user = $usuario_manager->findUsuario($_GET['id']);

    if($user === null){
        //flash usuario  not exist
        flash('error','Usuario solictado no existe en la base de datos','alert-danger');
        redirect('usuarios');
    }

    $usuario_manager->delete($user);
    //flash success
    flash('success','Usuario Ha Sido eliminado de la base de datos','alert-success');

    redirect('usuarios');
}else{
    //flash error id not exist
    flash('error','Id del usuario solicitado no existe','alert-danger');

    redirect('usuarios');
}