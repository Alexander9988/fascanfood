<?php
session_start();
if (!isset($_POST["usuario_correo"])){
    header("Location: ../index.php");
} else {

    include_once "../conexion.php";

    $mail = $_POST["usuario_correo"];
    $pass = $_POST["usuario_pass"];

    $sql = "SELECT * FROM usuarios WHERE correo = ? AND contrasena = ?";

    $stmt = $conex->prepare($sql);

    $stmt->execute([$mail, $pass]);

    $datos = $stmt -> fetch(PDO::FETCH_OBJ);

    if($datos == FALSE){

        echo '
        <!DOCTYPE html>
<html lang="es">  
    <head>  

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">

        <title>Inicio - Fascanfood</title>
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
        <link rel="stylesheet" href="../styles.css">
        <link rel="stylesheet" href="../styles-subpages.css">
        <link rel="stylesheet" href="styles-users.css">
        <!--Enlace a mis scripts-->
        <script src="../js/mis-scripts.js" type="text/javascript"></script>

        <!--Fuentes-->
        <!--        font-family: "Roboto Slab", serif;-->
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!--        font-family: "Montserrat", sans-serif;-->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">

        <!--        font-family: "Oswald", sans-serif;-->
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    </head> 
    <body>

        <header class="barra_ampliada animacion">
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
                                    <div class="carrito_mensaje animacion">
                                        <div class="carrito_mensaje_triangulo"></div>
                                        <p>No has iniciado sesión aún. Hazlo <a href="inicio.php">aquí</a></p>
                                    </div>
                                </div>
                                <ul class="nav navbar-nav navbar-right animacion">
                                    <li><a href="../restaurantes.php" class="hvr-shutter-out-horizontal animacion">Restaurantes</a></li>
                                    <li><a href="../carta.php" class="hvr-shutter-out-horizontal animacion">Carta</a></li>
                                    <li><a href="#contacto" class="hvr-shutter-out-horizontal animacion">Contacto</a></li>
                                    <li><a href="../nosotros.php" class="hvr-shutter-out-horizontal animacion">Nosotros</a></li>
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

                                <a class="navbar-brand" href="#">
                                    <img src="../images/Logo-ffffff.png" alt="logo" class="img-responsive animacion">
                                </a>

                                <div class="navbar-right carrito animacion">
                                    <img src="../images/carrito-de-compras.svg" alt="" class="img-responsive">
                                    <div class="carrito_mensaje animacion">
                                        <div class="carrito_mensaje_triangulo"></div>
                                        <p>No has iniciado sesión aún. Hazlo <a href="inicio.php">aquí</a></p>
                                    </div>
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

        <section class="inicio">
            <div class="container mi_container">

                <div class="inicio_cabecera">
                    <p class="titulo">El usuario introducido no existe</p>
                    <div class="linea_horizontal"></div>
                </div>

                <p class="centrado">Si no tiene una cuenta, regístrese<a href="registro.php">&nbsp;aquí</a></p>
            </div>

        </section>

        <footer id="contacto">

            <div class="footer" style="position:absolute;bottom:0px">

                <div class="container container_footer">

                    <div class="footer_sup centrado">

                        <!-- Elementos "pareja-1" y "pareja-2" creados para cambiar la disposición de los elementos en dispositivos verticales (iPad y móviles) -->

                        <div class="pareja-1 centrado">
                            <div class="contenido">
                                <ul>
                                    <li class="titulo">Contenido</li>
                                    <li>Carta</li>
                                    <li>Restaurantes</li>
                                    <li>Nosotros</li>
                                    <li>Contacto</li>
                                </ul>
                            </div>

                            <div class="rrss">
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

                        <div class="logo_info">
                            <img src="../images/Logo-ffffff.png" alt="logo-fff" class="img-responsive logo">
                            <p class="info">
                                Marca reconocida a nivel regional.
                                Ven a probar nuestros menús, no te arrepentirás.
                                ¡Come lo que quieres!
                            </p>
                        </div>

                        <div class="pareja-2 centrado">
                            <div class="contacto">

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

                            <div class="politicas">

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

                <div class="footer_inf">
                    <p>Sitio web realizado por <a href="https://www.linkedin.com/in/alexander-cedrés-santana-8666aa198/">Alexander Cedrés Santana</a></p>
                </div>

            </div>

        </footer>


    </body>

</html>
        ';

    } elseif($stmt->rowCount() == 1){

        if($mail == "admin@fascanfood.es" && $pass = "@dminF@sc@nf00d_2020"){

            $_SESSION["nombre"] = "admin";
            $_SESSION["id"] = 4512;
            header("Location: ../admin/panel_admin.php");
            
        }else {


            $_SESSION["nombre"] = $datos->nombre;
            $_SESSION["id"] = $datos->id;
            header('Location: ../index.php');   

        }

    }   
}
?>
