<?php
$title = "Quiénes Somos";
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
										<p><strong  class="text-primary">Movilelx</strong> es una empresa que pone al servicio de sus clientes los mejores productos</p>

										<p> de telefonía y electrónica a los mejores precios del mercado.

										<p>Podéis encontrar en nuestra tienda online, desde los últimos móviles salidos</p>

										<p> al mercado, hasta los mejores productos de informática para cubrir todas vuestras</p>

										<p> necesidades a los mejores precios, <strong class="text-primary">Movilelx</strong> no es solo una tienda de electrónica.</p>

										<p>Somos los mejores proveedores de todo lo que necesitas para estar al día en informática, telefonía y te </p>

										<p>ofrecemos precios sin competencia y productos de la mejor calidad.</p>

										<p>Todo lo relacionado con electrónica está al alcance de tu mano en </p>

										<p><strong class="text-primary">Movilelx </strong> con precio sin competencia y con la fiabilidad</p>

										<p> de una empresa líder en el sector que os acerca a casa todo lo que deseáis de las últimas</p>

										<p>tendencias en tecnología. Un clic te separa hacer tus deseos realidad, con la mayor facilidad del mercado</p>

										<p>en compra y pago de nuestros productos. No hay competencia, </p>

										<p>porque nadie te da lo que nosotros te damos. Calidad, precio y facilidad de compra.</p>


								</div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'application/parts/frontend/footer.php';
?>
