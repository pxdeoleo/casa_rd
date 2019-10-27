<?php
plantilla::aplicar();
$base = base_url('base');
$isFilter = false;

function getFiltro(){
    $filtro = new stdClass();
    $filtro->keyword = $_GET['keyword'];
    $filtro->ciudad = $_GET['ciudad'];
    $filtro->hab =$_GET['hab'];
    $filtro->banos = $_GET['banos'];
    $filtro->minArea = $_GET['min_area'];
    $filtro->maxArea = $_GET['max_area'];
    $filtro->minPrecio= $_GET['min_precio'];
    $filtro->maxPrecio= $_GET['max_precio'];   
    $filtro->categoria = $_GET['categoria'];
    return $filtro;
}
if($_POST){

}
else{
    if((isset($_GET['keyword']) && $_GET['keyword']!= "") || 
    (isset($_GET['ciudad']) && 
    $_GET['ciudad']!= "*") || 
    (isset($_GET['hab']) && $_GET['hab'] != "%")  || 
    (isset($_GET['banos'])  && $_GET['banos'] != "%")|| 
    (isset($_GET['min_area']) && $_GET['min_area'] > 0)|| 
    (isset($_GET['max_area'])  && $_GET['max_area'] > 0)|| 
    (isset($_GET['min_precio']) && $_GET['min_precio'] > 0) || 
    (isset($_GET['max_precio']) && $_GET['max_precio']>0)|| 
    (isset($_GET['categoria']) && 
     $_GET['categoria'] != "%")){
        $isFilter = true;
    }else{
        $isFilter = false;
    }
}

?>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(<?=$base?>/img/bg-img/hero1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Propiedades</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Advance Search Area Start ##### -->
    <div class="south-search-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="advanced-search-form">
                        <!-- Search Title -->
                        <div class="search-title">
                           <p><a href="propiedades" style="color: whitesmoke; font-size: 20px;" type="submit">Busca tu hogar</a></p> 
                        </div>
                        <!-- Search Form -->
                        <form action="" method="get" id="advanceSearch">
                            <div class="row">

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <input type="input" class="form-control" name="keyword" placeholder="Palabra clave">
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <select class="form-control" id="ciudad" name="ciudad">
                                            <option value = "%">Todas las ciudades</option>
                                            <?php
                                            $propiedades = $this->propiedad_model->ciudades();
                                            foreach ($propiedades as $key => $value) {
                                                echo "<option value='{$value['ciudad']}'>{$value['ciudad']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select class="form-control" id="hab" name="hab">
                                            <option  value = "%">Dormitorios</option>
                                            <?php
                                            $dormitorios = $this->propiedad_model->dormitorios();
                                            foreach ($dormitorios as $key => $value) {
                                                echo "<option value='{$value['hab']}'>{$value['hab']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 col-xl-2">
                                    <div class="form-group">
                                        <select class="form-control" id="banos" name="banos">
                                            <option  value = "%">Baños</option>
                                            <?php
                                            $banos = $this->propiedad_model->banos();
                                            foreach ($banos as $key => $value) {
                                                echo "<option value='{$value['banos']}'>{$value['banos']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-8 col-lg-12 col-xl-5 d-flex">
                                    <!-- Area Range -->
                                    <?php
                                    $rango = $this->propiedad_model->rango_area();
                                    ?>

                                    <div class="slider-range">
                                        <div data-min="<?=$rango[0]['min_area']?>" data-max="<?=$rango[0]['max_area']?>" data-unit=" m²" class="slider-range-area ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="<?=$rango[0]['min_area']?>" data-value-max="<?=$rango[0]['max_area']?>">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range"><?=$rango[0]['min_area']?> m² - <?=$rango[0]['max_area']?> m²</div>
                                    </div>

                                    <!-- Area hidden input -->

                                    <input type="hidden" name="min_area" id="min_area" value="<?=$rango[0]['min_area']?>">
                                    <input type="hidden" name="max_area" id="max_area" value="<?=$rango[0]['max_area']?>">

                                    <!-- Price Range -->
                                    <?php
                                    $rango = $this->propiedad_model->rango_precio();
                                    ?>
                                    <div class="slider-range">
                                        <div data-min="<?=$rango[0]['min_precio']?>" data-max="<?=$rango[0]['max_precio']?>" data-unit=" USD" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="<?=$rango[0]['min_precio']?>" data-value-max="<?=$rango[0]['max_precio']?>">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                        </div>
                                        <div class="range"><?=$rango[0]['min_precio']?> USD - <?=$rango[0]['max_precio']?> USD</div>
                                    </div>

                                    <!-- Price hidden inputs -->

                                    <input type="hidden" name="min_precio" id="min_precio" value="<?=$rango[0]['min_precio']?>">
                                    <input type="hidden" name="max_precio" id="max_precio" value="<?=$rango[0]['max_precio']?>">

                                </div>

                                <div class="col-12 col-md-4 col-lg-3">
                                            <div class="form-group">
                                                <select class="form-control" id="categoria" name="categoria">
                                                    <option  value = "%">Todos los tipos</option>
                                                    <?php
                                                    $tipos = $this->propiedad_model->cont_tipos();
                                                    foreach ($tipos as $key => $value) {
                                                        $nombre = ucfirst($value['nombre']);
                                                        echo<<<TIPOS
                                                        <option data-value="{$value['id']}" value="{$value['id']}">{$nombre} <span>({$value['contador']})</span></option>
TIPOS;}
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                            <div class="col-12 d-flex justify-content-between align-items-end">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn south-btn">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Listing Content Wrapper Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <!-- <div class="row">
                <div class="col-12">
                    <div class="listings-top-meta d-flex justify-content-between mb-100">
                        <div class="view-area d-flex align-items-center">
                            <span>View as:</span>
                            <div class="grid_view ml-15"><a href="#" class="active"><i class="fa fa-th" aria-hidden="true"></i></a></div>
                            <div class="list_view ml-15"><a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a></div>
                        </div>
                        <div class="order-by-area d-flex align-items-center">
                            <span class="mr-15">Order by:</span>
                            <select>
                              <option selected>Default</option>
                              <option value="1">Newest</option>
                              <option value="2">Sales</option>
                              <option value="3">Ratings</option>
                              <option value="3">Popularity</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row">

            <?php
           
            if($isFilter){
                $propiedades = $this->propiedad_model->filtrarPropiedades(getFiltro());
                if(count($propiedades)> 0){
                    foreach ($propiedades as $key => $value) {
                        $base = base_url('base');
                        if ($value['id_categoria'] == 1) {
                            $tipo = '<img src="'.$base.'/img/icons/flat.png" alt="Apartamento">';
                        }elseif ($value['id_categoria'] == 2) {
                            $tipo = '<img src="'.$base.'/img/icons/house2.png" alt="Casa">';
                        }else{
                            $tipo = '<img src="'.$base.'/img/icons/flat.png" alt="Apartamento">';
                        }
                        $this->propiedad_model->showCard($value,$tipo);
                    }
                }else{
                    echo <<<ERROR
                    <h1>No se encontraron propiedades</h1> 
                    ERROR;
                }
            }
            else
            {
                $propiedades = $this->propiedad_model->ultPropiedades();
                foreach ($propiedades as $key => $value) {
                    $base = base_url('base');
                    if ($value['id_categoria'] == 1) {
                        $tipo = '<img src="'.$base.'/img/icons/flat.png" alt="Apartamento">';
                    }elseif ($value['id_categoria'] == 2) {
                        $tipo = '<img src="'.$base.'/img/icons/house2.png" alt="Casa">';
                    }
                    $this->propiedad_model->showCard($value,$tipo);
                }
            }
                ?>

            </div>

            <!-- <div class="row">
                <div class="col-12">
                    <div class="south-pagination d-flex justify-content-end">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link active" href="#">01</a></li>
                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- ##### Listing Content Wrapper Area End ##### -->

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
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
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