<?php
plantilla::aplicar();
$base = base_url('base');

?>
    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(<?=$base?>/img/bg-img/hero1.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Descubre tu hogar</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(<?=$base?>/img/bg-img/hero2.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Encuentra el hogar de tus sueños</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Hero Slide -->
            <div class="single-hero-slide bg-img" style="background-image: url(<?=$base?>/img/bg-img/hero3.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="hero-slides-content">
                                <h2 data-animation="fadeInUp" data-delay="100ms">Encuentra el hogar perfecto</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->
    <!-- ##### Featured Properties Area Start ##### -->
    <section class="featured-properties-area section-padding-100-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp">
                        <h2>Propiedades Destacadas</h2>
                        <!-- <p>En esta seccion se muestran las propiedades mas exclusivas</p> -->
                    </div>
                </div>
            </div>

            <div class="row">
                <?php
                    $propiedades = $this->propiedad_model->propiedades_dest();
                    foreach ($propiedades as $key => $value) {
                        if ($value['id_categoria'] == 1) {
                            $tipo = '<img src="'.$base.'/img/icons/flat.png" alt="Apartamento">';
                        }elseif ($value['id_categoria'] == 2) {
                            $tipo = '<img src="'.$base.'/img/icons/house2.png" alt="Casa">';
                        }
                        $link = base_url('propiedades/ver/'.$value['id']);
                    echo<<<PROPIEDAD
                    <!-- Single Featured Property -->
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Property Thumbnail -->
                        <div class="property-thumb">
                            <a href="{$link}"><img src="{$base}/img/bg-img/feature1.jpg" alt=""></a>

                            <div class="tag">
                                <span>Disponible</span>
                            </div>
                            <div class="list-price">
                                <p>{$value['precio']}</p>
                            </div>
                        </div>
                        <!-- Property Content -->
                        <div class="property-content">
                            <h5>{$value['nombre']}</h5>
                            <p class="location"><img src="{$base}/img/icons/location.png" alt="">{$value['direccion']}</p>
                            <p>{$value['descripcion']}</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    {$tipo}
                                    
                                </div>
                                <span>{$value['hab']} dorm.</span>

                                <div class="bathroom">
                                    <img src="{$base}/img/icons/bathtub.png" alt="">
                                    <span>{$value['banos']}</span>
                                </div>
                                <div class="garage">
                                    <img src="{$base}/img/icons/garage.png" alt="">
                                    <span>{$value['par']}</span>
                                </div>
                                <div class="space">
                                    <img src="{$base}/img/icons/space.png" alt="">
                                    <span>{$value['area']} m²</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        
                    
PROPIEDAD;
                    }
                ?>

                <!-- Single Featured Property -->
                <!-- <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms"> -->
                        <!-- Property Thumbnail -->
                        <!-- <div class="property-thumb">
                            <img src="<?=$base?>/img/bg-img/feature1.jpg" alt="">

                            <div class="tag">
                                <span>Disponible</span>
                            </div>
                            <div class="list-price">
                                <p>$945 679</p>
                            </div>
                        </div> -->
                        <!-- Property Content -->
                        <!-- <div class="property-content">
                            <h5>Villa in Los Angeles</h5>
                            <p class="location"><a href="" <img src="<?=$base?>/img/icons/location.png" alt=""></a>Upper Road 3411, no.34 CA</p>
                            <p>Una pequeña descripcion</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="<?=$base?>/img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="<?=$base?>/img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="<?=$base?>/img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="<?=$base?>/img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Single Featured Property -->
                <!-- <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="200ms"> -->
                        <!-- Property Thumbnail -->
                        <!-- <div class="property-thumb">
                            <img src="<?=$base?>/img/bg-img/feature2.jpg" alt="">

                            <div class="tag">
                                <span>Disponible</span>
                            </div>
                            <div class="list-price">
                                <p>$945 679</p>
                            </div>
                        </div> -->
                        <!-- Property Content -->
                        <!-- <div class="property-content">
                            <h5>Town House in Los Angeles</h5>
                            <p class="location"><img src="<?=$base?>/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                            <p>Una pequeña descripcion.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="<?=$base?>/img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="<?=$base?>/img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="<?=$base?>/img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="<?=$base?>/img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Single Featured Property -->
                <!-- <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="300ms"> -->
                        <!-- Property Thumbnail -->
                        <!-- <div class="property-thumb">
                            <img src="<?=$base?>/img/bg-img/feature3.jpg" alt="">

                            <div class="tag">
                                <span>Disponible</span>
                            </div>
                            <div class="list-price">
                                <p>$945 679</p>
                            </div>
                        </div> -->
                        <!-- Property Content -->
                        <!-- <div class="property-content">
                            <h5>Town House in Los Angeles</h5>
                            <p class="location"><img src="<?=$base?>/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                            <p>Una pequeña descripcion.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="<?=$base?>/img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="<?=$base?>/img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="<?=$base?>/img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="<?=$base?>/img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Single Featured Property -->
                <!-- <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="400ms"> -->
                        <!-- Property Thumbnail -->
                        <!-- <div class="property-thumb">
                            <img src="<?=$base?>/img/bg-img/feature4.jpg" alt="">

                            <div class="tag">
                                <span>For Sale</span>
                            </div>
                            <div class="list-price">
                                <p>$945 679</p>
                            </div>
                        </div> -->
                        <!-- Property Content -->
                        <!-- <div class="property-content">
                            <h5>Villa in Los Angeles</h5>
                            <p class="location"><img src="<?=$base?>/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                            <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="<?=$base?>/img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="<?=$base?>/img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="<?=$base?>/img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="<?=$base?>/img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Single Featured Property -->
                <!-- <div class="col-12 col-md-6 col-xl-4">
                    <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="500ms"> -->
                        <!-- Property Thumbnail -->
                        <!-- <div class="property-thumb">
                            <img src="<?=$base?>/img/bg-img/feature5.jpg" alt="">

                            <div class="tag">
                                <span>For Sale</span>
                            </div>
                            <div class="list-price">
                                <p>$945 679</p>
                            </div>
                        </div> -->
                        <!-- Property Content -->
                        <!-- <div class="property-content">
                            <h5>Town House in Los Angeles</h5>
                            <p class="location"><img src="<?=$base?>/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                            <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="<?=$base?>/img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="<?=$base?>/img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="<?=$base?>/img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="<?=$base?>/img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- Single Featured Property -->
                <!-- <div class="col-12 col-md-6 col-xl-4"> -->
                    <!-- <div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="600ms"> -->
                        <!-- Property Thumbnail -->
                        <!-- <div class="property-thumb">
                            <img src="<?=$base?>/img/bg-img/feature6.jpg" alt="">

                            <div class="tag">
                                <span>For Sale</span>
                            </div>
                            <div class="list-price">
                                <p>$945 679</p>
                            </div>
                        </div> -->
                        <!-- Property Content -->
                        <!-- <div class="property-content">
                            <h5>Town House in Los Angeles</h5>
                            <p class="location"><img src="<?=$base?>/img/icons/location.png" alt="">Upper Road 3411, no.34 CA</p>
                            <p>Integer nec bibendum lacus. Suspendisse dictum enim sit amet libero malesuada.</p>
                            <div class="property-meta-data d-flex align-items-end justify-content-between">
                                <div class="new-tag">
                                    <img src="<?=$base?>/img/icons/new.png" alt="">
                                </div>
                                <div class="bathroom">
                                    <img src="<?=$base?>/img/icons/bathtub.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="garage">
                                    <img src="<?=$base?>/img/icons/garage.png" alt="">
                                    <span>2</span>
                                </div>
                                <div class="space">
                                    <img src="<?=$base?>/img/icons/space.png" alt="">
                                    <span>120 sq ft</span>
                                </div>
                            </div>
                        </div> -->
                    <!-- </div> -->
                <!-- </div> -->
            </div>
        </div>
    </section>
    <!-- ##### Featured Properties Area End ##### -->

    <!-- ##### Call To Action Area Start ##### -->
    <section class="call-to-action-area bg-fixed bg-overlay-black" style="background-image: url(<?=$base?>/img/bg-img/cta.jpg)">
        <div class="container h-100">
            <div class="row align-items-center h-100">
                <div class="col-12">
                    <div class="cta-content text-center">
                        <h2 class="wow fadeInUp" data-wow-delay="300ms">Estas buscando una propiedad para rentar?</h2>
                        <h6 class="wow fadeInUp" data-wow-delay="400ms">Tambien tenemos la posibilidad de rentarte alguna de nuestras propiedades.</h6>
                        <a href="<?=base_url('propiedades')?>" class="btn south-btn mt-50 wow fadeInUp" data-wow-delay="500ms">Buscar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Call To Action Area End ##### -->

    <!-- ##### Testimonials Area Start ##### -->
    <section class="south-testimonials-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading wow fadeInUp" data-wow-delay="250ms">
                        <h2>Client testimonials</h2>
                        <p>Suspendisse dictum enim sit amet libero malesuada feugiat.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="testimonials-slides owl-carousel wow fadeInUp" data-wow-delay="500ms">

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="<?=$base?>/img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="<?=$base?>/img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>

                        <!-- Single Testimonial Slide -->
                        <div class="single-testimonial-slide text-center">
                            <h5>Perfect Home for me</h5>
                            <p>Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit amet tellus blandit. Etiam nec odio vestibulum est mattis effic iturut magna. Pellentesque sit am et tellus blandit. Etiam nec odio vestibul. Etiam nec odio vestibulum est mat tis effic iturut magna.</p>

                            <div class="testimonial-author-info">
                                <img src="<?=$base?>/img/bg-img/feature6.jpg" alt="">
                                <p>Daiane Smith, <span>Customer</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Testimonials Area End ##### -->
    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area section-padding-100-0 bg-img gradient-background-overlay" style="background-image: url(<?=$base?>/img/bg-img/cta.jpg);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>About Us</h6>
                            </div>

                            <img src="<?=$base?>/img/bg-img/footer.jpg" alt="">
                            <div class="footer-logo my-4">
                                <img src="<?=$base?>/img/core-img/logo.png" alt="">
                            </div>
                            <p>Integer nec bibendum lacus. Suspen disse dictum enim sit amet libero males uada feugiat. Praesent malesuada.</p>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Hours</h6>
                            </div>
                            <!-- Office Hours -->
                            <div class="weekly-office-hours">
                                <ul>
                                    <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span> <span>09 AM - 19 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09 AM - 14 PM</span></li>
                                    <li class="d-flex align-items-center justify-content-between"><span>Sunday</span> <span>Closed</span></li>
                                </ul>
                            </div>
                            <!-- Address -->
                            <div class="address">
                                <h6><img src="<?=$base?>/img/icons/phone-call.png" alt=""> +45 677 8993000 223</h6>
                                <h6><img src="<?=$base?>/img/icons/envelope.png" alt=""> office@template.com</h6>
                                <h6><img src="<?=$base?>/img/icons/location.png" alt=""> Main Str. no 45-46, b3, 56832, Los Angeles, CA</h6>
                            </div>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Useful Links</h6>
                            </div>
                            <!-- Nav -->
                            <ul class="useful-links-nav d-flex align-items-center">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Properties</a></li>
                                <li><a href="#">Listings</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Properties</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Elements</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-xl-3">
                        <div class="footer-widget-area mb-100">
                            <!-- Widget Title -->
                            <div class="widget-title">
                                <h6>Featured Properties</h6>
                            </div>
                            <!-- Featured Properties Slides -->
                            <div class="featured-properties-slides owl-carousel">
                                <!-- Single Slide -->
                                <div class="single-featured-properties-slide">
                                    <a href="#"><img src="<?=$base?>/img/bg-img/fea-product.jpg" alt=""></a>
                                </div>
                                <!-- Single Slide -->
                                <div class="single-featured-properties-slide">
                                    <a href="#"><img src="<?=$base?>/img/bg-img/fea-product.jpg" alt=""></a>
                                </div>
                                <!-- Single Slide -->
                                <div class="single-featured-properties-slide">
                                    <a href="#"><img src="<?=$base?>/img/bg-img/fea-product.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Copywrite Text -->
        <div class="copywrite-text d-flex align-items-center justify-content-center">
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <!-- <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="<?=$base?>/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="<?=$base?>/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?=$base?>/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="<?=$base?>/js/plugins.js"></script>
    <script src="<?=$base?>/js/classy-nav.min.js"></script>
    <script src="<?=$base?>/js/jquery-ui.min.js"></script>
    <!-- Active js -->
    <script src="<?=$base?>/js/active.js"></script>

</body>

</html>
