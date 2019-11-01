<?php
session_start();
$base = base_url('base');

?>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
    <!-- Title  -->
    <title>Casas RD - Agencia de bienes raices</title>

    <!-- Favicon  -->
    <link rel="icon" href="<?=$base?>/img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?=$base?>/style.css">
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="south-load"></div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="h-100 d-md-flex justify-content-between align-items-center">
                <div class="email-address">
                    <a href="mailto:contact@southtemplate.com">contact@casasrd.com</a>
                </div>
                <div class="phone-number d-flex">
                    <?php
                    if(isset($_SESSION['user'])){
                        $logoff_url = base_url("cuenta/logoff");
                        $user = $_SESSION['user'];
                        echo<<<LOGOFF
                        <div class="icon">
                            <a href="{$logoff_url}"><img src="{$base}/img/icons/logout.png" alt=""></a>         
                        </div>
                        <div class="number">
                            <a href="#">Bienvenido, {$user}</a>
                        </div>
LOGOFF;
                    }else{
                        $login_url = base_url("cuenta/login");
                        echo<<<LOGIN
                        <div class="number">
                            <a href="{$login_url}">Iniciar Sesion</a>
                        </div>
LOGIN;
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- Main Header Area -->
        <div class="main-header-area" id="stickyHeader">
            <div class="classy-nav-container breakpoint-off">
                <!-- Classy Menu -->
                <nav class="classy-navbar justify-content-between" id="southNav">

                    <!-- Logo -->
                    <a class="nav-brand" href="<?=base_url("")?>"><img src="<?=$base?>/img/core-img/logo.png" alt="">  </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="<?=base_url()?>">Inicio</a></li>
                                <li><a href="about-us.html">Acerca</a></li>
                                <li><a href="<?=base_url('propiedades')?>">Propiedades</a></li>
                                <?php
                                if(isset($user)){
                                    echo('<li><a href="'.base_url('propiedades/mis_propiedades').'">Mis Propiedades</a></li>');
                                    // echo('<li><a href="'.base_url('propiedades/agregar').'">Agregar Propiedad</a></li>');
                                }
                                ?>
                                
                                <li><a href="contact.html">Contacto</a></li>
                            </ul>

                            <!-- Search Form -->
                            <div class="south-search-form">
                                <form action="#" method="post">
                                    <input type="search" name="search" id="search" placeholder="Search Anything ...">
                                    <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </form>
                            </div>

                            <!-- Search Button -->
                            <!-- <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a> -->
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->