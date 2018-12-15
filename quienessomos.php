<?php
$title = "Qiuenes Somos";
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
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deserunt dignissimos distinctio fugit illo ipsum, minus nemo obcaecati optio quam qui quidem quis saepe, similique suscipit tempore, vel. Ipsam, numquam.</p>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque debitis minima nam nesciunt, nostrum quia rerum ut. Accusamus aut eveniet harum inventore sequi suscipit veritatis? Omnis optio placeat qui sapiente?</p>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
