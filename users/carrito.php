<?php
session_start();
if (!isset($_SESSION["nombre"])){
    header("Location: ../index.php");
}
include_once "../conexion.php";
?>
<!DOCTYPE html>
<html lang="es">  
    <head>    

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">

        <title>Mis pedidos - Fascanfood</title>

        <!-- Flaticon -->
        <link rel="apple-touch-icon" sizes="57x57" href="../icons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="../icons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../icons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="../icons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../icons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="../icons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="../icons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="../icons/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="../icons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../icons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../icons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../icons/favicon-16x16.png">

        <!-- jQuery library (served from Google) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- CDN Bootstrap-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

        <!--BxSlider-->
        <!-- bxSlider Javascript file -->
        <script src="../js/jquery.bxslider.js"></script>
        <!-- bxSlider CSS file -->
        <link href="../css/jquery.bxslider.css" rel="stylesheet"/>

        <!--Enlace para librería wow-->
        <link rel="stylesheet" href="../css/animate.css">
        <script src="../js/wow.js"></script>

        <!--Enlace a hoja de estilos-->
        <link rel="stylesheet" href="styles-ok.css">
        <link rel="stylesheet" href="../styles.css">
        <link rel="stylesheet" href="carrito.css">
        <!--Enlace a mis scripts-->
        <script src="../js/mis-scripts.js" type="text/javascript"></script>
        <script src="../js/carrito.js" type="text/javascript"></script>

        <!--Fuentes-->
        <!--        font-family: 'Roboto Slab', serif;-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!--        font-family: 'Montserrat', sans-serif;-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

        <!--        font-family: 'Oswald', sans-serif;-->
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    </head> 
    <body>

        <header class="barra_ampliada animacion wow fadeInDown">
            <div class="cabecera-1 animacion hidden-md hidden-sm hidden-xs">
                <div class="container mi_container animacion">
                    <div class="cabecera_1_contenido centrado">

                        <div class="cabecera_1_izquierda centrado izquierda">

                            <div class="icono_texto centrado">
                                <img src="../images/ubi.svg" alt="">
                                <p>Calle Pintor Pepé Dámaso, 2</p>
                            </div>

                            <div class="icono_texto centrado">
                                <img src="../images/tfn.svg" alt="">
                                <p>928 123 456</p>
                            </div>

                            <div class="icono_texto centrado">
                                <img src="../images/mail.svg" alt="">
                                <p>info@fascanfood.com</p>
                            </div>

                        </div>

                        <div class="cabecera_1_derecha centrado derecha">

                            <div class="icono_texto centrado">
                                <img src="../images/instagram.svg" alt="">
                                <p>fascanfood</p>
                            </div>

                            <div class="icono_texto centrado">
                                <img src="../images/facebook.svg" alt="">
                                <p>fascanfood</p>
                            </div>

                            <div class="icono_texto centrado">
                                <img src="../images/twitter.svg" alt="">
                                <p>fascanfood2020</p>
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            <div class="cabecera-2 animacion">
                <div class="container mi_container animacion">
                    <nav class="navbar animacion">

                        <!-- Disposición de elementos general-->
                        <div class="container-fluid animacion hidden-xs">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <a href="#" class="carrito animacion hidden-lg hidden-md hidden-sm">
                                    <img src="../images/carrito-de-compras.svg" alt="" class="img-responsive">
                                </a>

                                <a class="navbar-brand" href="../index.php">
                                    <img src="../images/Logo-ffffff.png" alt="logo" class="img-responsive animacion">
                                </a>

                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse animacion" id="bs-example-navbar-collapse-1">
                                <div class="navbar-right carrito animacion hidden-xs">
                                    <img src="../images/carrito-de-compras.svg" alt="" class="img-responsive animacion">
                                    <?php
                                    if(!isset($_SESSION["nombre"])){
                                        echo '
                                            <div class="carrito_mensaje animacion">
                                        <div class="carrito_mensaje_triangulo"></div>

                                        <a class="btn btn-default carrito_btn hvr-shutter-out-horizontal" href="users/inicio.php" role="button">Iniciar sesión</a>
                                    </div>';
                                    } else {
                                        echo '
                                        <div class="carrito_mensaje animacion grande">
                                        <div class="carrito_mensaje_triangulo"></div>

                                        <a class="btn btn-default carrito_btn hvr-shutter-out-horizontal" href="carrito.php" role="button" style="margin-bottom:10px">Ver mi carrito</a>
                                        <a class="btn btn-default carrito_btn hvr-shutter-out-horizontal" href="logout.php" role="button">Cerrar sesión</a>
                                    </div>';
                                    }
                                    ?>
                                </div>
                                <ul class="nav navbar-nav navbar-right animacion">
                                    <li><a href="../index.php#restaurantes" class="hvr-shutter-out-horizontal animacion">Restaurantes</a></li>
                                    <li><a href="../index.php#carta" class="hvr-shutter-out-horizontal animacion">Carta</a></li>
                                    <li><a href="../index.php#contacto" class="hvr-shutter-out-horizontal animacion">Contacto</a></li>
                                    <li><a href="../index.php#nosotros" class="hvr-shutter-out-horizontal animacion">Nosotros</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->

                        <!-- Disposición de elementos móvil-->
                        <div class="container-fluid animacion hidden-lg hidden-md hidden-sm">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header centrado">

                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <a class="navbar-brand" href="../index.php">
                                    <img src="../images/Logo-ffffff.png" alt="logo" class="img-responsive animacion">
                                </a>

                                <div class="navbar-right carrito animacion">
                                    <img src="../images/carrito-de-compras.svg" alt="" class="img-responsive animacion">

                                    <?php
                                    if(!isset($_SESSION["nombre"])){
                                        echo '
                                            <div class="carrito_mensaje animacion">
                                        <div class="carrito_mensaje_triangulo"></div>

                                        <a class="btn btn-default carrito_btn hvr-shutter-out-horizontal" href="users/inicio.php" role="button">Iniciar sesión</a>
                                    </div>';
                                    } else {
                                        echo '
                                        <div class="carrito_mensaje animacion grande">
                                        <div class="carrito_mensaje_triangulo"></div>

                                        <a class="btn btn-default carrito_btn hvr-shutter-out-horizontal" href="carrito.php" role="button" style="margin-bottom:10px">Ver mi carrito</a>
                                        <a class="btn btn-default carrito_btn hvr-shutter-out-horizontal" href="logout.php" role="button">Cerrar sesión</a>
                                    </div>';
                                    }
                                    ?>

                                </div>

                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse animacion" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav navbar-right animacion">
                                    <li><a href="../restaurantes.php" class="hvr-shutter-out-horizontal animacion">Restaurantes</a></li>
                                    <li><a href="../carta.php" class="hvr-shutter-out-horizontal animacion">Carta</a></li>
                                    <li><a href="#contacto" class="hvr-shutter-out-horizontal animacion">Contacto</a></li>
                                    <li><a href="../nosotros.php" class="hvr-shutter-out-horizontal animacion">Nosotros</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div>
            </div>
        </header>

        <section class="registro">
            <div class="container mi_container">

                <div class="registro_cabecera wow fadeInDown" data-wow-delay="0.5s">

                    <?php
                    echo '<p class="titulo">Bienvenido/a ' . $_SESSION["nombre"] . '</p>'
                    ?>

                    <div class="linea_horizontal"></div>

                </div>

            </div>
        </section>

        <section class="mis_menus">
            <div class="container mi_container" id="carrito"
            </div>
        </section>


        <footer id="contacto">

            <div class="footer wow fadeInUp" >

                <div class="container container_footer">

                    <div class="footer_sup centrado">

                        <!-- Elementos "pareja-1" y "pareja-2" creados para cambiar la disposición de los elementos en dispositivos verticales (iPad y móviles) -->

                        <div class="pareja-1 centrado">
                            <div class="contenido wow fadeInDown">
                                <ul>
                                    <li class="titulo">Contenido</li>
                                    <li>Carta</li>
                                    <li>Restaurantes</li>
                                    <li>Nosotros</li>
                                    <li>Contacto</li>
                                </ul>
                            </div>

                            <div class="rrss wow fadeInDown" data-wow-delay="0.2s">
                                <ul>

                                    <li class="titulo">Redes Sociales</li>

                                    <li>
                                        <a href="#" class="centrado">
                                            <img src="../images/instagram-fff.svg" alt="">
                                            <p class="animacion">Instagram</p>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="centrado">
                                            <img src="../images/facebook-fff.svg" alt="">
                                            <p class="animacion">Facebook</p>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#" class="centrado">
                                            <img src="../images/twitter-fff.svg" alt="">
                                            <p class="animacion">Twitter</p>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="logo_info wow fadeInDown" data-wow-delay="0.4s">
                            <img src="../images/Logo-ffffff.png" alt="logo-fff" class="img-responsive logo">
                            <p class="info">
                                Marca reconocida a nivel regional.
                                Ven a probar nuestros menús, no te arrepentirás.
                                ¡Come lo que quieres!
                            </p>
                        </div>

                        <div class="pareja-2 centrado">
                            <div class="contacto wow fadeInDown" data-wow-delay="0.6s">

                                <p class="titulo">Contacto</p>

                                <div class="icono_texto centrado">

                                    <img src="../images/ubi-fff.svg" alt="">
                                    <p>Calle Pintor Pepé Dámaso, 2</p>

                                </div>

                                <div class="icono_texto centrado">

                                    <img src="../images/tfn-fff.svg" alt="">
                                    <p>928 12 89 86</p>

                                </div>

                                <div class="icono_texto centrado">

                                    <img src="../images/correo-fff.svg" alt="">
                                    <p>info@fascanfood.com</p>

                                </div>

                            </div>

                            <div class="politicas wow fadeInDown" data-wow-delay="0.8s">

                                <ul>

                                    <li class="titulo">Políticas</li>
                                    <li>Preguntas frecuentes</li>
                                    <li>Cookies</li>
                                    <li>Aviso legal</li>
                                    <li>Política de privacidad</li>

                                </ul>

                            </div>                            
                        </div>

                    </div>

                </div>

                <div class="footer_inf wow fadeInUp">
                    <p>Sitio web realizado por <a href="https://www.linkedin.com/in/alexander-cedrés-santana-8666aa198/">Alexander Cedrés Santana</a></p>
                    <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/"><img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">licencia de Creative Commons Reconocimiento-NoComercial-SinObraDerivada 4.0 Internacional</a>.
                </div>

            </div>

        </footer>


    </body>

</html>