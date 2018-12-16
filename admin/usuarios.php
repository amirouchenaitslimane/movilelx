<?php
$title ="Usuarios";
require_once '../application/parts/backend/header.php';
if(!isset($_SESSION['user']) || !$_SESSION['user']->isSuperAdmin()){
    header('location:/movilelx/index.php');
}

?><div id="wrapper">
    <?php require_once '../application/parts/backend/sidebar.php'?>
    <div id="content-wrapper">
        <div class="container-fluid">
            <!-- Page Content -->
            <h1>Gestión de Usuario</h1>
            <hr>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">
                <div class="col-md-12">
                    <a href="nuevousuario.php" class="btn btn-primary">Nuevo usuario</a>
                </div>
            </div>
            <?php
            flash('info');
            flash('success');
            flash('error');
            ?>
            <div class="row">
                <?php
                //crear la logica
                $administradores_por_pagina = 10;
                $numero_administradores_db = $usuario_manager->countClientes(1);


                $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);

                $start = ($page  - 1)*$administradores_por_pagina;
                $total_pages = ceil($numero_administradores_db / $administradores_por_pagina);
                $page = (isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0 ? intval($_GET['page']) : 1);
                $start = ($page  - 1)*$administradores_por_pagina;
                $total_pages = ceil($numero_administradores_db / $administradores_por_pagina);

                $adminstradores=$usuario_manager->getAdminstradores($start,$administradores_por_pagina);




                ?>
                <?php if(!empty($adminstradores)):?>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>

                            <th scope="col">
                            </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($adminstradores as $adminstrador):?>
                            <tr>

                                <td><?= $adminstrador->getNombre(); ?></td>
                                <td><?= $adminstrador->getApellido(); ?></td>
                                <td><?= $adminstrador->getEmail(); ?></td>
                                <td><?= $adminstrador->getRoleOption()[$adminstrador->getRole()] ?></td>
                                <th scope="row">
                                    <a href="editaradministradores.php?id=<?= $adminstrador->getId(); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="deletadministradores.php?id=<?= $adminstrador->getId(); ?>" class="btn btn-danger" onclick=" return confirm('¿Qieres eliminar el adminstrador ?') "><i class="fa fa-trash"></i></a>
                                </th>
                            </tr>
                        <?php endforeach;?>


                        </tbody>
                    </table>
                    <?php else: echo "<h1> No hay adminstradores </h1>"?>
                    <?php endif;?>

                    <ul class="pagination">
                        <?php
                        if($numero_administradores_db > $administradores_por_pagina) {
                            if ($page > 1) {
                                ?>
                                <li class="page-item"><a class="page-link" href="usuarios.php?page=<?= $page - 1 ?>">Previous</a>
                                </li>

                                <?php
                            }
                            ?>

                            <?php for ($i = 1; $i < $total_pages; $i++): ?>

                                <?php if ($i === $page): ?>
                                    <li class="page-item active"><a class="page-link "><?= $i; ?></a></li>

                                <?php else: ?>
                                    <li class="page-item"><a class="page-link"
                                                             href="usuarios.php?page=<?= $i ?>"><?= $i; ?></a></li>

                                <?php endif; ?>

                            <?php endfor; ?>
                            <?php
                            if ($page < $total_pages) {
                                ?>
                                <li class="page-item"><a class="page-link"
                                                         href="usuarios.php?page=<?= $page + 1 ?>">Next</a></li>

                                <?php
                            }
                        }
                        ?>

                    </ul>
                </div>
            </div>




        </div>
        <!-- /.container-fluid -->
    </div>
</div>


<?php include_once  '../application/parts/backend/footer.php'?>
