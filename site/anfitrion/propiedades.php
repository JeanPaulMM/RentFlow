<?php
session_start();
if(isset($_SESSION['user'])){
    $UID = $_SESSION['user_id'];
}

if (isset($_GET['cerrars'])) {
  session_unset();
  session_destroy();
  header("Location: login/login.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once '../../app/controllers/propiedadController.php';
  $controlador = new PropiedadController();
  $controlador->crear();
}

require_once __DIR__.'/../../app/controllers/consultasController.php';


$op = new consultasController();
$ciudades = $op->mostrarCiudades();
$propiedades = $op->mostrarPropiedades();

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:400,500,600,700%7CPoppins:400%7CTeko:300,400">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>
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
                    <!--Brand--><a class="brand" href="index.html"><h2>RentFlow</h2></a>
                  </div>
                </div>
                <div class="rd-navbar-aside-right rd-navbar-collapse">
                  <ul class="rd-navbar-corporate-contacts">
                    <?php if(isset($_SESSION['user'])){ ?>
                    </ul><a class="nav-link" href="?cerrars=true"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                          <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                          <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                          </svg></a>
                    <?php }else{ ?>
                    </ul><a class="button button-md button-default-outline-2 button-ujarak" href="login/login.php">Ingresar</a>
                    <?php } ?>
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
                    <li class="rd-nav-item"><a class="rd-nav-link" href="../index.php">Inicio</a>
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="about.html">Info</a>
                    </li>
                    <!---<li class="rd-nav-item"><a class="rd-nav-link" href="typography.html">Typography</a>--->
                    </li>
                    <li class="rd-nav-item"><a class="rd-nav-link" href="contact-us.html">Contactenos</a>
                    </li>
                    <li class="rd-nav-item active"><a class="rd-nav-link" href="../anfitrion/indxanfitrion.php">Modo Anfitrion</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>
      <section class="anfitrionpropiedades">
        <div class="container">
            <div class="tittle">
                <h2 style="margin-bottom: 30px">Propiedades Publicadas</h2>
            </div>
            <div class="propiedades-container">
              <?php foreach ($propiedades as $propiedad): ?>
                  <div class="propiedad-card">
                      <img src="<?php echo $propiedad['url_foto']; ?>" alt="Imagen de la propiedad" class="propiedad-img">
                      <div class="propiedad-info">
                          <h3><?php echo htmlspecialchars($propiedad['titulo']); ?></h3>
                          <p><?php echo htmlspecialchars($propiedad['ubicacion']) . ", " . htmlspecialchars($propiedad['ciudad_nombre']); ?></p>
                          <p><strong>Precio:</strong> $<?php echo number_format($propiedad['precio'], 2); ?></p>
                          <p><strong>Capacidad:</strong> <?php echo $propiedad['capacidad']; ?> personas</p>
                      </div>
                  </div>
              <?php endforeach; ?>
            </div>
            <div class="contbtn">
                <button class="btnprop" data-bs-toggle="modal" data-bs-target="#exampleModalToggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                    </svg> 
                    Agregar
                </button>
            </div>
        </div>
      </section>
      <!--	Our Services-->
        <div class="footer-corporate-bottom-panel">
          <div class="container">
            <div class="row justfy-content-xl-space-berween row-10 align-items-md-center2">
              <div class="col-sm-6 col-md-4 text-sm-right text-md-center">
                <div>
                  <ul class="list-inline list-inline-sm footer-social-list-2">
                    <li><a class="icon fa fa-facebook" href="#"></a></li>
                    <li><a class="icon fa fa-twitter" href="#"></a></li>
                    <li><a class="icon fa fa-google-plus" href="#"></a></li>
                    <li><a class="icon fa fa-instagram" href="#"></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-6 col-md-4 order-sm-first">
                <!-- Rights-->
                <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>Wonder Tour</span>. All Rights Reserved. Design by <a href="https://www.templatemonster.com">TemplateMonster</a></p>
              </div>
              <div class="col-sm-6 col-md-4 text-md-right">
                <p class="rights"><a href="#">Privacy Policy</a></p>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>

    <form method="post" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Agregar Inmueble</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos del primer modal -->
                        <input type="hidden" name="user" value="<?php echo $UID ?>">
                        <input type="text" name="titulo" placeholder="Titulo para la propiedad" class="form-control mb-3">
                        <input type="text" name="descripcion" placeholder="Descripcion" class="form-control mb-3">
                        <input type="text" name="tipo" placeholder="Tipo(casa, apartamento, apartaestudio, etc)" class="form-control mb-3">
                        <input type="number" name="precio" placeholder="Precio" class="form-control mb-3">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
                          Siguiente
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Agregar Inmueble</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Campos del segundo modal -->
                        
                        <select name="ciudad" class="form-control mb-3">
                          <?php foreach($ciudades as $ciudad){?>
                            <option value="<?php echo $ciudad['id']?>"><?php echo $ciudad['ciudad_nombre']?></option>
                          <?php } ?>
                        </select>
                        <input type="text" name="ubicacion" placeholder="ubicacion" class="form-control mb-3">
                        <input type="text" name="capacidad" placeholder="personas permitidas" class="form-control mb-3">
                        <input type="file" name="imagenes[]" multiple class="form-control mb-3">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                          Volver
                        </button>
                        <button type="submit" class="btn btn-success">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Javascript-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/core.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>