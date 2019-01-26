<?php
$title = "Area cliente";
require_once 'application/parts/frontend/header.php';
if(!$_SESSION['user']){
    redirect('index');
}else{
		$user = $_SESSION['user'];
}

?>
<div class="container">
    <div class="row">
        <?php require_once 'application/parts/frontend/categories.php'?>
        <div class="col-md-9">
            <div class="card card-form  ">
                <div class="card-header card-header-primary">
                    <h4 class="card-title"><?= $title ?></h4>
                </div>
                <div class="card-body">
									<?php
									flash('info');
									?>
                    <ul class="nav nav-tabs mt-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="ped" href="#pedidos" role="tab" data-toggle="tab">pedidos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#profile" role="tab" data-toggle="tab">Mi perfil</a>
                        </li>
                    </ul>
										<div class=" tab-content ">
												<div role="tabpanel" class="tab-pane fade in  " id="pedidos">
														<div class="card">
																<div class="card-header">
																		<h4 class="header-title">Mis Pedidos:</h4>
																</div>
																<div class="card-body">
																		<div class="row">
																				<div class="col-md-6 col-12 col-sm-6 " id="user">
																						<p   class="text-primary">Nombre: <strong id="nombre" class="text-dark"><?= htmlspecialchars(trim($user->getNombre())) ;?></strong></p>
																						<p class="text-primary" >Apeilldo: <strong class="text-dark name"><?= $user->getApellido(); ?></strong></p>
																						<p class="text-primary" >Email: <strong class="text-dark"><?= $user->getEmail(); ?></strong></p>
																				</div>
																				<div class="col-md-6 col-12 col-sm-6">
																						<p class="text-primary">Direccion: <strong class="text-dark"><?= $user->getDireccion(); ?></strong></p>
																						<p class="text-primary">Cuenta registrada desde: <strong class="text-dark"><?= $user->getCreated()?></strong></p>
																				</div>
																		</div>
                                    <?php  $pedidos = $pedido_manager->getPedido($_SESSION['user']->getId());
                                    if($pedidos != null ): foreach ($pedidos as $pedido):?>
																				<div id="accordion" >
																						<div class="card " id="acco-<?= $pedido->getId();?>">
																								<div class="card-header " id="<?= $pedido->getId() ?>">
																										<h5 class="mb-0">
																												<div data-toggle="collapse" data-target="#col<?= $pedido->getId() ?>" aria-expanded="true" aria-controls="collapseOne">
																														<p class="pull-left text-success lead">Pedido n=º <?= $pedido->getId() ?></p>
																														<p class="pull-right ">creado el dìa <?= $pedido->getFecha() ?></p>
																												</div>
																										</h5>
																								</div>
																								<div id="col<?= $pedido->getId() ?>" class="collapse show" aria-labelledby="<?= $pedido->getId() ?>" data-parent="#accordion">
																										<div class="card-body">
																												<h5><strong class="text-info bg-<?= $pedido->getEstado() ?>">Estado del pedido  </strong> <?=\app\Pedido::getEstadoOption()[$pedido->getEstado()]?></h5>
																												<table class="table"><thead><tr><th scope="col">n Producto </th><th scope="col">p . unit</th>	<th scope="col">c pedida </th><th scope="col">p compra</th></tr></thead><tbody><?php foreach ($linped_manager->getLinaPedidoPedido($pedido->getId()) as $linea): ?><tr><td><?= htmlspecialchars(trim($linea->nombre)) ?></td><td><?= htmlspecialchars(trim($linea->precio)) ?> €</td><td><?= htmlspecialchars(trim($linea->cantidad)) ?></td><td><?= htmlspecialchars(trim($linea->precio_compra)) ?> €</td></tr><?php endforeach; ?><tr><td><strong>Total:</strong></td><td></td><td></td><td>  <strong><?= trim($linped_manager->TotalPrecioCompra($pedido->getId())->total) ?> €</strong></td></tr></tbody></table>
																												<small class="text-muted">(n Producto *) Nombre del producto, (p . unit *) precio unitario ,(c pedida*  ) cantidad pedida,(p.compra*)precio compra </small>																												<hr>
																												<button class="download lead text-primary btn btn-light" id="download-<?= $pedido->getId(); ?>  ignore" onclick="download_DIVPdf(<?= $pedido->getId() ?>)">Descargar el pedido >> </button>
																										</div>
																								</div>
																						</div> 	 	
																				</div>
                                    <?php endforeach; else:echo '<h3 class="text-danger lead">No tienes pedidos todavía</h3>'; endif;?>
																</div>
														</div>
												</div>
												<div role="tabpanel" class="tab-pane fade" id="profile">
														<h3>Mi perfil </h3>
                            <?php  $cliente = $usuario_manager->findUsuario($_SESSION['user']->getId());?>
														<ul>
																<li><?= $cliente->getNombre();?></li>
																<li><?= $cliente->getApellido() ;?></li>
																<li><?= $cliente->getDireccion() ?></li>
																<li><?= $cliente->getEmail() ?></li>
														</ul>
														<a href="actualizarperfile.php" class="btn btn-orange btn-success">Cambiar mis datos</a>
												</div>
										</div>
                </div>
            </div>
           </div>
    </div>
</div>
<?php require_once 'application/parts/frontend/footer.php' ?>
<script>
    $(document).ready(()=>{
        $('#ped').tab('show')
    });
function download_DIVPdf(id) {
        $("#download-"+id).remove();
        var pdf = new jsPDF('p', 'pt', 'a4');
        var imageData = 'data:image/png;base64,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';
        pdf.addImage(imageData, 'png', 20, 20, 100, 30);

        pdf.text(140, 40, "tienda viretual movilex");
        var user = $("#user");



        pdf.setFontSize(9);
        var nombre = $("#nombre").text();
        nombre = nombre.replace(' ','-');
        var pdf_name = nombre+'pedido.pdf';
        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
				htm = user.append($("#acco-"+id));
        htmlsource = $.trim(htm.html());

        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
        "#ignore": function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 80,
            bottom: 60,
            left: 40,
            width: 522
        };

        pdf.fromHTML(
            htmlsource, // HTML string or DOM elem ref.
            margins.left, // x coord
            margins.top, { // y coord
                'width': margins.width, // max width of content on PDF
                'elementHandlers': specialElementHandlers
            },

            function (dispose) {

                pdf.save(pdf_name);
            }, margins);
        $('#ignore').show();
        location.reload();
    }
</script>
