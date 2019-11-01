<?php
plantilla::aplicar();
$base = base_url('base');
$id_propiedad = $this->uri->segment(3);
$propiedad = $this->propiedad_model->propiedad_x_id($id_propiedad)[0];

if($_POST){ 
    $mailcontent = new stdClass();
    $mailcontent->recipient = $_POST['recipient'];
    $mailcontent->reply = $_POST['email'];
    $mailcontent->nombre = $_POST['nombre']." ".$_POST['apellido'];
    $mailcontent->subject = $_POST['tema'];
    $mailcontent->mensaje = $_POST['mensaje'];
    $mailcontent->propiedad = $propiedad['nombre'];
    $this->propiedad_model->sendMail($mailcontent);
}
?>

    <!-- Material Design -->
  
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img" style="background-image: url(<?=$base?>/img/bg-img/hero1.jpg);">
        <!-- <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcumb-content">
                        <h3 class="breadcumb-title">Propiedad</h3>
                    </div>
                </div>
            </div>
        </div> -->
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    
    <!-- ##### Listings Content Area Start ##### -->
    <section class="listings-content-wrapper section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Single Listings Slides -->

                    <div class="single-listings-sliders owl-carousel">
                    <?php 
                         $img = $this->propiedad_model->imagenes_x_id($propiedad['id']);
                         for($i=0; $i < count($img); $i++ ){
                            echo '<img style="width:1150px; height:600px; object-fit:cover; overflow:hidden;" src= data:image/jpeg;base64,'.base64_encode( $img[$i]['foto']).' alt="">';
                         }
                    ?>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="listings-content">
                        <!-- Price -->
                        <div class="list-price">
                            <p>$<?= number_format($propiedad['precio'], 2);?></p>
                        </div>
                        <h5><?=$propiedad['nombre']?></h5>
                        <p class="location"><img src="<?=$base?>/img/icons/location.png" alt=""><?=$propiedad['direccion']?></p>
                        <!-- Meta -->
                        <div class="property-meta-data d-flex align-items-end">
                            <div class="new-tag">
                                <?php
                                if ($propiedad['id_categoria'] == 1) {
                                    echo '<img src="'.$base.'/img/icons/flat.png" alt="Apartamento">';
                                }elseif ($propiedad['id_categoria'] == 2) {
                                    echo '<img src="'.$base.'/img/icons/house2.png" alt="Casa">';
                                }
                                ?>
                                <!-- <img src="<?=$base?>/img/icons/new.png" alt=""> -->
                            </div>
                            <span><?=$propiedad['hab']?> dorm.</span>
                            <div class="bathroom">
                                <img src="<?=$base?>/img/icons/bathtub.png" alt="">
                                <span><?=$propiedad['banos']?></span>
                            </div>
                            <div class="garage">
                                <img src="<?=$base?>/img/icons/garage.png" alt="">
                                <span><?=$propiedad['par']?></span>
                            </div>
                            <div class="space">
                                <img src="<?=$base?>/img/icons/space.png" alt="">
                                <span><?=$propiedad['area']?> m²</span>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <p>
                        <?php
                            $descripcion = explode(PHP_EOL,$propiedad['descripcion']);
                            echo('<ul>');
                            foreach ($descripcion as $key => $value) {
                                if($value != ""){
                                    echo<<<CARACTERISTICA
                                    <li>{$value}</li>
CARACTERISTICA;
                            echo("</ul>");
                                }else{
                                    echo("<br>");
                                }
                                
                        }
                        $descripcion?></p>
                        <?php
                            if ($propiedad['caracteristicas'] != ''){
                                $caracteristicas = explode(PHP_EOL,$propiedad['caracteristicas']);
                                echo("<h2>Caracteristicas</h2>");

                                echo('<ul class="listings-core-features d-flex align-items-center">');
                                   foreach ($caracteristicas as $key => $value) {
                                    echo<<<CARACTERISTICA
                                    <li><i class="fa fa-check" aria-hidden="true"></i> {$value}</li>
    CARACTERISTICA;
                                }
                                echo('</ul>');
                            }
                        ?>
                        <div id="map" style="width: 700px; height: 500px"></div>

                        <!-- Core Features -->
                        <!-- <ul class="listings-core-features d-flex align-items-center">
                            <li><i class="fa fa-check" aria-hidden="true"></i> Gated Community</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Automatic Sprinklers</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Ocean Views</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Heated Floors</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Private Patio</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Window Shutters</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Fireplace</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Beach Access</li>
                            <li><i class="fa fa-check" aria-hidden="true"></i> Rooftop Terrace</li>
                        </ul> -->
                        <!-- Listings Btn Groups -->
                        <!-- <div class="listings-btn-groups">
                            <a href="#" class="btn south-btn">See Floor plans</a>
                            <a href="#" class="btn south-btn active">calculate mortgage</a>
                        </div> -->
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="contact-realtor-wrapper">
                        <div class="realtor-info">
                        <?php
                            $usuario = $this->cuenta_model->usuario_x_id($propiedad['usuario_id'])[0];
                            ?>
                            <img class="perfil" style="width:350px; height:350px; object-fit:cover; overflow:hidden;" src="<?= 'data:image/jpeg;base64,'.base64_encode($usuario['foto']);?>" alt="">
                            
                            <div class="realtor---info">
                                <h2><?=$usuario['nombre']?> <?=$usuario['apellido']?></h2>
                                <p>Agente de Bienes Raices</p>
                                <h6><img src="<?=$base?>/img/icons/phone-call.png" alt=""><?=$usuario['telefono']?></h6>
                                <h6><img src="<?=$base?>/img/icons/envelope.png" alt=""><?=$usuario['correo']?></h6>
                                <h6><button class="btn btn-success btn-block"><a style="color: white;" target="_blank"  href=" https://wa.me/<?=$usuario['telefono']?>"><i class="fa fa-whatsapp"></i> Contactar en Whatsapp</a></button></h6>
                                <h6><button class="btn btn-secondary btn-block" type="button" class="btn btn-primary" data-toggle="modal" 
                                data-target="#MContactForm" data-title="Formulario de Contacto"><i class="fa fa-envelope"></i> Enviar Mensaje</button></h6>
                            </div>
                            <!-- <div class="realtor--contact-form">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="realtor-name" placeholder="Your Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control" id="realtor-number" placeholder="Your Number">
                                    </div>
                                    <div class="form-group">
                                        <input type="enumber" class="form-control" id="realtor-email" placeholder="Your Mail">
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="realtor-message" cols="30" rows="10" placeholder="Your Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn south-btn">Send Message</button>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Listing Maps -->
            <!-- <div class="row">
                <div class="col-12">
                    <div class="listings-maps mt-100">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- ##### Listings Content Area End ##### -->

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

<!-- Modal Contacto -->
<div class="modal fade" id="MContactForm" role="dialog">
    <div class="modal-dialog">
        <br><br><br>
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
    
        <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body">
        <form id="contact-form" method="post" role="form">

    <div class="messages"></div>

    <div class="controls">
    <div class="row">
             <div class="col-md-7">
            <div  style="display: inline-block;">
            <label for="nombre">Para:</label>
                    <input id="recipient" type="text" name="recipient" readonly class="form-control" value="<?=$usuario['correo']?>">
           
             </div>
             </div>
    </div>
        <div class="row">
             
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombre">Nombre *</label>
                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Digite su nombre "  data-error="Firstname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input id="apellido" type="text" name="apellido" class="form-control" placeholder="Digite su Apellido"  data-error="Lastname is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Digite su correo electronico *" required="required" data-error="Valid email is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="form_need">Tema *</label>
                    <select id="tema" name="tema" class="form-control"  data-error="Please specify your need.">
                        <option value=""></option>
                        <option value="Solicitar Visita">Solicitar Visita</option>
                        <option value="Acerca del inmueble">Acerca del inmueble</option>
                        <option value="Contactos">Contactos</option>
                        <option value="Otros">Otros</option>
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="mensaje">Mensaje *</label>
                    <textarea id="mensaje" name="mensaje" class="md-textarea form-control" rows="5" required="required" data-error="Please, leave us a message."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-success btn-send" value="Enviar mensaje">
        </div>
      </div>
      </form>
    </div>
  </div>
  <!-- Fin Modal -->
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
    <!-- Google Maps -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuyLRa1uKNtbgx6xAJVmWy-zADgegA2s"></script> -->
    <script src="<?=$base?>/js/map-active.js"></script>
            <!-- JAVASCRIPT PARA QUE APAREZCA EL TITULO DEL MODAL -->
            <script>
$('#MContactForm').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)  // Boton que abrio el Modal
  var titulo = button.data('title');
  var modal = $(this)
  modal.find('.modal-title').text(titulo);

  });
  </script>
  <script>
  function enviarMensaje(){
  }
  </script>
    <script>
    function main(){
        var osm = L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {maxZoom: 18, minZoom: 7, attribution: 'FranWilbRol'});

        var map = L.map('map').setView([18.91668, -70.59814], 8).addLayer(osm);

        map.dragging.disable();
        map.touchZoom.disable();
        map.doubleClickZoom.disable();
        map.scrollWheelZoom.disable();
        map.boxZoom.disable();
        map.keyboard.disable();

        L.marker([<?= $propiedad['latitud'] ?>, <?= $propiedad['longitud'] ?>]).addTo(map);

    }
    window.onload = main;

</script>

</body>

</html>