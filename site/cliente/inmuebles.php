<?php
require '../../conexion/conexion.php';
require_once __DIR__ . '/../../app/controllers/consultasController.php';

$propiedades = consultasController::mostrarPropiedades();
?>
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
    <style>
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-img-top {
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
        }

        .box-categories-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }

        .imagenciudad {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        @media (max-width: 768px) {
            .card-img-top {
                height: 150px;
            }
        }
    </style>
    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="page">
        <header class="section page-header">
            <!-- RD Navbar-->
            <div class="rd-navbar-wrap">
            <nav class="rd-navbar rd-navbar-corporate" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="106px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="rd-navbar-collapse-toggle rd-navbar-fixed-element-1" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
                <div class="rd-navbar-aside-outer">
                <div class="rd-navbar-aside">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                    <!-- RD Navbar Toggle-->
                    <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                    <!-- RD Navbar Brand-->
                    <div class="rd-navbar-brand">
                        <!--Brand--><a class="brand" href="index.php"><h2>RentFlow</h2></a>
                    </div>
                    </div>
                </div>
                </div>
                <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <div class="rd-navbar-nav-wrap">
                    <ul class="list-inline list-inline-md rd-navbar-corporate-list-social">
                        <li><a class="icon fa fa-facebook" href="#"></a></li>
                        <li><a class="icon fa fa-twitter" href="#"></a></li>
                        <li><a class="icon fa fa-google-plus" href="#"></a></li>
                        <li><a class="icon fa fa-instagram" href="#"></a></li>
                    </ul>
                    <!-- RD Navbar Nav-->
                    <ul class="rd-navbar-nav">
                        <li class="rd-nav-item active"><a class="rd-nav-link" href="index.php">Inicio</a>
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">Info</a>
                        </li>
                        <!---<li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a>--->
                        </li>
                        <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Contactenos</a>
                        </li>
                    </ul>
                    </div>
                </div>
                </div>
            </nav>
            </div>
        </header>
        <section class="section section-lg bg-gray-4">
            <div class="container">
                <div class="row">
                    <?php foreach ($propiedades as $propiedad): ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="<?php echo '../images/' . $propiedad['url_foto']; ?>" alt="Foto de la propiedad">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $propiedad['titulo']; ?></h5>
                                    <p class="card-text"><strong>Precio:</strong> $<?php echo $propiedad['precio']; ?></p>
                                    <p class="card-text"><strong>Ubicación:</strong> <?php echo $propiedad['ubicacion']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>
    <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>