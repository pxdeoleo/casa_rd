<?php
plantilla::aplicar();
// session_start();
$base = base_url('base/mis_propiedades');
$id_usuario = $_SESSION['id_usuario'];
$propiedades = $this->propiedad_model->propiedades_x_usuario($id_usuario);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->


    <!-- Core Stylesheet -->
    <link href="<?=$base?>/style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="<?=$base?>/css/responsive/responsive.css" rel="stylesheet">

</head>
<br>
<br>
<br>
<body>

    <!-- ***** Search Form Area ***** -->
    <div class="dorne-search-form d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-close-btn" id="closeBtn">
                        <i class="pe-7s-close-circle" aria-hidden="true"></i>
                    </div>
                    <form action="#" method="get">
                        <input type="search" name="caviarSearch" id="search" placeholder="Search Your Desire Destinations or Events">
                        <input type="submit" class="d-none" value="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ***** Listing Destinations Area Start ***** -->
    <section class="dorne-listing-destinations-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading dark text-center">
                        <span></span>
                        <h4>Todas mis propiedades</h4>
                        <p>Registro, edición o eliminación de propiedades</p>
                        <br>
                        <!-- Add listings btn -->
                            <div class="dorne-add-listings-btn">
                                <a href="<?=base_url('propiedades/agregar')?>" class="btn dorne-btn">+ Agregar propiedades</a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Single Features Area -->
                <?php
                foreach ($propiedades as $key => $value) {
                    $img = $this->propiedad_model->imagen_x_id($value['id']);
                    
                    $imagen = 'data:image/jpeg;base64,'.base64_encode($img[0]['foto']);
                    $url_borrar = base_url('propiedades/borrar/'.$value['id']);
                    $url_editar = base_url('propiedades/editar/'.$value['id']);
                    $precio = number_format($value['precio'], 2);
                    $url_ver = base_url('propiedades/ver/'.$value['id']);
                    $moneda = $value['moneda'];
                    echo<<<PROPIEDAD
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-features-area mb-50">
                            <a href="{$url_ver}"><img style="height:200px; width: 400; object-fit:cover; overflow:hidden;" src="{$imagen}" alt=""></a>
                            <!-- Price -->
                            <div class="price-start">
                                <p>{$moneda} {$precio}</p>
                            </div>
                            <div class="feature-content d-flex align-items-center justify-content-between">
                                <div class="feature-title">
                                    <h5>{$value['nombre']}</h5>
                                    <p>{$value['sector']}</p>
                                </div>
                                <div class="feature-favourite">
                                    <a href="{$url_editar}"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;
                                    <a href="{$url_borrar}" onclick="return confirm('¿Esta seguro?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </div>  
                            </div>
                        </div>
                    </div>
PROPIEDAD;
                }

                ?>
            </div>
        </div>
    </section>
    <!-- ***** Listing Destinations Area End ***** -->

    <!-- ****** Footer Area Start ****** ->
    <footer class="dorne-footer-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 d-md-flex align-items-center justify-content-between">
                    <div class="footer-text">
                        <p>
                            <-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. ->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. ->
                        </p>
                    </div>
                    <div class="footer-social-btns">
                        <a href="#"><i class="fa fa-linkedin" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-haspopup="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <-- ****** Footer Area End ****** -->

    <!-- jQuery-2.2.4 js -->
    <script src="<?=$base?>/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?=$base?>/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="<?=$base?>/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="<?=$base?>/js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="<?=$base?>/js/active.js"></script>
</body>

</html>