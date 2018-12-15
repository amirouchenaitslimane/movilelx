
<?php
$title = "index";
require_once 'application/parts/frontend/header.php' ?>
    <div class="container">
        <div class="row">
         <?php require_once 'application/parts/frontend/categories.php'?>
            <div class="col-md-9">
                <aside class="cta-bg oferta-bg ">
                    <div class="container">
                        <div class="row p-2">
                            <div class="col-md-8">
                                <h2>Descubre las mejores ofertas de Navidad! </h2>

                            </div>
                            <div class="row">
                                <div class="col-md-6">

                                    <img src="assets/images/oferta.png" alt="" class="" width="100%">
                                </div>
                                <div class="col-md-6">

                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

                                    <a  class="btn btn-primary" href="">Ver ofertas</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </aside>
                <div class="product-block">
                    <h3>Productos nuevos</h3>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-xs-center">
																<span class="oferta">Oferta</span>
																<img class="card-img-top" src="assets/images/samsung_galaxy_s9_oro.jpg" alt="Card image cap" >
                                <div class="card-block">
                                    <h5 class="card-title">Samsung Galaxy s9 plus</h5>
																		<p>Pantalla "infinita" Super AMOLED táctil capacitiva de 6.2" </p>

																		<p class="card-text price">600€ </p>
                                    <a href="#" class="btn btn-success">Add to Cart</a> </div>
                            </div>
                        </div>



                        <div class="col-md-4">
                            <div class="card text-xs-center"> <img class="card-img-top" src="assets/images/nokia-7-1-gris.jpg" alt="Card image cap">
                                <div class="card-block">
                                    <h5 class="card-title">Product Name</h5>
																		<p>Pantalla "infinita" Super AMOLED táctil capacitiva de 6.2" </p>

																		<p class="card-text price">$500</p>
                                    <a href="#" class="btn btn-success">Add to Cart</a> </div>
                            </div>
                        </div>
												<div class="col-md-4">
														<div class="card text-xs-center"> <img class="card-img-top" src="assets/images/samsung_galaxy_note_9_azul.jpg" alt="Card image cap">
																<div class="card-block">
																		<h5 class="card-title">Product Name</h5>
																		<p>Pantalla "infinita" Super AMOLED táctil capacitiva de 6.2" </p>

																		<p class="card-text price">$500</p>
																		<a href="#" class="btn btn-success">Add to Cart</a> </div>
														</div>
												</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once 'application/parts/frontend/footer.php' ?>