<?php 

session_start();
include "../conexion.php";

$sql = "SELECT * FROM menus";

$stmt = $conex->prepare($sql);
$stmt->execute();

$control = false;

while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
    $menus[] = $fila;
    $control = true;
}

if($control == false){
    echo "En estos momentos no hay menús disponibles";
} elseif($stmt -> rowCount() >= 1) {

    $contador = 0;
    foreach($menus as $valor => $col){

        $img = $col["foto"];
        $precio = $col["precio"];
        $descripcion = $col["descripcion"];
        $elem_descripcion = explode('.', $descripcion);
        $id = $col["id"];

        switch ($contador){

            case 0:

                echo 
                    '<div class="row row-eq-height">

                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

                                <div class="menu wow fadeInDown" data-wow-delay="0.1s">

                                    <div class="menu_img">
                                        <img src="' . $img . '" alt="" class="img-responsive">
                                    </div>

                                    <p class="menu_precio">' . $precio . '€</p>
                                    <div class="menu_info">
                                        <div>';

                foreach($elem_descripcion as $valor){
                    echo '<p class="menu_elem">' . $valor . '</p>';
                };

                echo '</div>
                                    </div>

                                    <div class="botones centrado">';

                if(!isset($_SESSION["nombre"])){
                    echo '<a class="btn btn-default hvr-shutter-out-horizontal anadir" href="#" id="anadir" role="button">
                                            <img src="images/corazon.svg" alt="" class="img-responsive">
                                        </a>';
                } else {
                    echo '<a class="btn btn-default hvr-shutter-out-horizontal anadirCarrito" role="button">
                                            <img src="images/corazon.svg" alt="" class="img-responsive">
                                        </a>';
                }

                echo '
                                        <a class="btn btn-default hvr-shutter-out-horizontal codigo" href="#" role="button">Ver código</a>


                                    </div>

                                    <section class="menu_back_no animacion">

                                        <p class="cod_num">#'.$id.'</p>
                                        <p class="cod_info">
                                            Presenta este código en caja y 
                                            agilizaremos tu pedido
                                        </p>

                                        <a class="btn btn-default hvr-shutter-out-horizontal codigo_back" href="#" role="button">Volver</a>
                                    </section>

                                </div>

                            </div>';

                $contador++;
                break;

            case 1:

                echo '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">

                                <div class="menu wow fadeInDown" data-wow-delay="0.1s">

                                    <div class="menu_img">
                                        <img src="' . $img . '" alt="" class="img-responsive">
                                    </div>

                                    <p class="menu_precio">' . $precio . '€</p>
                                    <div class="menu_info">
                                        <div>';

                foreach($elem_descripcion as $valor){
                    echo '<p class="menu_elem">' . $valor . '</p>';
                };

                echo '</div>
                                    </div>

                                    <div class="botones centrado">';

                if(!isset($_SESSION["nombre"])){
                    echo '<a class="btn btn-default hvr-shutter-out-horizontal anadir" role="button">
                                            <img src="images/corazon.svg" alt="" class="img-responsive">
                                        </a>';
                } else {
                    echo '<a class="btn btn-default hvr-shutter-out-horizontal anadirCarrito" role="button">
                                            <img src="images/corazon.svg" alt="" class="img-responsive">
                                        </a>';
                };

                echo '<a class="btn btn-default hvr-shutter-out-horizontal codigo" href="#" role="button">Ver código</a>


                                    </div>

                                    <section class="menu_back_no animacion">

                                        <p class="cod_num">#'.$id.'</p>
                                        <p class="cod_info">
                                            Presenta este código en caja y 
                                            agilizaremos tu pedido
                                        </p>

                                        <a class="btn btn-default hvr-shutter-out-horizontal codigo_back" href="#" role="button">Volver</a>
                                    </section>

                                </div>

                            </div>';

                $contador++;
                break;

            case 2:

                echo '<div class="col-lg-4 col-md-4 hidden-sm hidden-xs">

                                <div class="menu wow fadeInDown" data-wow-delay="0.3s">

                                    <div class="menu_img">
                                        <img src="' . $img . '" alt="" class="img-responsive">
                                    </div>

                                    <p class="menu_precio">' . $precio . '€</p>
                                    <div class="menu_info">
                                        <div>';

                foreach($elem_descripcion as $valor){
                    echo '<p class="menu_elem">' . $valor . '</p>';
                };

                echo '</div>
                                    </div>

                                    <div class="botones centrado">';

                if(!isset($_SESSION["nombre"])){
                    echo '<a class="btn btn-default hvr-shutter-out-horizontal anadir" href="#" role="button">
                                            <img src="images/corazon.svg" alt="" class="img-responsive">
                                        </a>';
                } else {
                    echo '<a class="btn btn-default hvr-shutter-out-horizontal anadirCarrito" role="button">
                                            <img src="images/corazon.svg" alt="" class="img-responsive">
                                        </a>';
                }

                echo '<a class="btn btn-default hvr-shutter-out-horizontal codigo" href="#" role="button">Ver código</a>


                                    </div>

                                    <section class="menu_back_no animacion">

                                        <p class="cod_num">#'.$id.'</p>
                                        <p class="cod_info">
                                            Presenta este código en caja y 
                                            agilizaremos tu pedido
                                        </p>

                                        <a class="btn btn-default hvr-shutter-out-horizontal codigo_back" href="#" role="button">Volver</a>
                                    </section>

                                </div>

                            </div>
                        </div>

                        <div class="separa-100 hidden-md hidden-xs"></div>
                        <!--Separadores iPad horizontal-->
                        <div class="separa-50 hidden-lg hidden-sm hidden-xs"></div>
                        <div class="separa-30 hidden-lg hidden-sm hidden-xs"></div>
                        ';
                $contador = 0;
                break;

        }

    }

}
?>