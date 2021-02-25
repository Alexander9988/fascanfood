 <?php
session_start();
include "../conexion.php";

                        $sql = "SELECT * FROM pedidos WHERE id_usu = ?";
                    $stmt = $conex->prepare($sql);
                    $stmt->execute([$_SESSION["id"]]);

                    //Comprobamos si hay pedidos pendientes
                    if( $stmt->rowCount() >= 1){


                        while($fila = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $datos[] = $fila;
                        };

                        echo '<p class="tipo_carro">Tus compras en camino</p>';
                        foreach ($datos as $index => $col){
                            echo '<p class="num_pedido">Pedido nº'.$col["id_pedido"].' || Total: '.$col["total_pedido"].'€</p>';
                            $menus = explode(".", $col["menus_pedido"]);

                            foreach ($menus as $menu){

                                $sql = "SELECT * FROM menus WHERE id = ?";
                                $stmt = $conex->prepare($sql);
                                $stmt->execute([$menu]);

                                while ($fila = $stmt-> fetch(PDO::FETCH_ASSOC)){

                                    $elem = explode(".", $fila["descripcion"]);

                                    //Mostramos los pedidos pendientes
                                    echo '
                                        <div class="mi_menu centrado wow fadeInDown">
                                        <div class="mi_menu_img">
                                            <img src="../' . $fila["foto"] . '" alt="menu_1" class="img-responsive">
                                        </div>

                                        <div class="mi_menu_descripcion">';

                                    foreach($elem as $valor){
                                        echo '<p>' . $valor . '</p>';
                                    };

                                    echo '</div>

                                        <div class="mi_menu_precio_cantidad centrado">
                                            <p class="precio">' . $fila["precio"] . '€</p>
                                            <p class="cantidad">x1</p>
                                        </div>

                                        <div class="mi_menu_opciones centrado">
                                            <p>En progreso</p>
                                        </div>
                                    </div>';
                                }
                            }
                        };


                        //Mostramos los pedidos del carrito
                        echo '<div id="carro">';
                        echo '<p class="tipo_carro">Tus compras en el carro</p>';
                        $sql = "SELECT * FROM menus_usuarios WHERE usu_id = ?";

                        $stmt = $conex->prepare($sql);
                        $stmt->execute([$_SESSION["id"]]);

                        $control = false;
                        $datos = null;

                        while($fila = $stmt -> fetch(PDO::FETCH_ASSOC)){
                            $datos[] = $fila;
                            $control = true;
                        }

                        //Si no hay pedidos en el carro
                        if($control == FALSE ){

                            echo "<p class='centrado'>Aún no ha añadido nada</p>";
                            $total = 0;

                        } elseif($stmt -> rowCount()>=1 ){

                            //Si hay pedidos en el carro
                            $total = 0;
                            foreach($datos as $valor => $col){                                                            
                                $descripcion = $col["menu_descripcion"];
                                $elem_descripcion = explode('.', $descripcion);

                                $img = $col["menu_img"];
                                $code = $col["orden_id"];
                                $precio = $col["menu_precio"];
                                $menu = $col["menu_id"];
                                $total = $total + $precio;

                                echo '
                                        <div class="mi_menu centrado wow fadeInDown">
                                        <div class="mi_menu_img">
                                        <img src="../' . $img . '" alt="menu_1" class="img-responsive">
                                        </div>

                                        <div class="mi_menu_descripcion">';

                                foreach($elem_descripcion as $valor){
                                    echo '<p>' . $valor . '</p>';
                                };

                                echo '</div>

                                        <div class="mi_menu_precio_cantidad centrado">
                                        <p class="precio">' . $precio . '€</p>
                                        <p class="cantidad">x1</p>
                                        </div>

                                        <div class="mi_menu_opciones centrado">

                                        <a class="animacion eliminar_menu" id="eliminar_menu">
                                        <img src="../images/eliminar.svg" alt="" class="img-responsive">
                                        <p style="opacity:0" class="cod_orden">'.$code.'</p>
                                        </a>
                                        </div>
                                        </div>';

                            }
                        } 
                        echo '</div>';
                    } else {

                        //Si no hay pedidos pendientes mostramos el carrito
                        echo '<div id="carro">';
                        $sql = "SELECT * FROM menus_usuarios WHERE usu_id = ?";

                        $stmt = $conex->prepare($sql);
                        $stmt->execute([$_SESSION["id"]]);

                        $control = false;
                        $datos = null;

                        while($fila = $stmt -> fetch(PDO::FETCH_ASSOC)){
                            $datos[] = $fila;
                            $control = true;
                        }

                        //Si el carro está vacío
                        if($control == FALSE ){

                            echo "<p class='centrado no_compra'>Aún no ha añadido nada</p>";
                            $total = 0;

                        } elseif($stmt -> rowCount()>=1 ){

                            //Sí hay elementos en el carro
                            $total = 0;
                            echo '<p class="tipo_carro">Tus compras en el carro</p>';
                            foreach($datos as $valor => $col){                                                            
                                $descripcion = $col["menu_descripcion"];
                                $elem_descripcion = explode('.', $descripcion);

                                $img = $col["menu_img"];
                                $code = $col["orden_id"];
                                $precio = $col["menu_precio"];
                                $menu = $col["menu_id"];
                                $total = $total + $precio;

                                echo '
                                        <div class="mi_menu centrado wow fadeInDown">
                                        <div class="mi_menu_img">
                                        <img src="../' . $img . '" alt="menu_1" class="img-responsive">
                                        </div>

                                        <div class="mi_menu_descripcion">';

                                foreach($elem_descripcion as $valor){
                                    echo '<p>' . $valor . '</p>';
                                };

                                echo '</div>

                                        <div class="mi_menu_precio_cantidad centrado">
                                        <p class="precio">' . $precio . '€</p>
                                        <p class="cantidad">x1</p>
                                        </div>

                                        <div class="mi_menu_opciones centrado">

                                        <a class="animacion eliminar_menu" id="eliminar_menu">
                                        <img src="../images/eliminar.svg" alt="" class="img-responsive">
                                        <p style="opacity:0" class="cod_orden">'.$code.'</p>
                                        </a>
                                        </div>';
                                
                                        echo '</div>';

                            }
                        }

                    }                  

                ?>
<?php
echo '
                <div class="mi_menu_total centrado wow fadeInDown" data-wow-delay="0.5s">

                    <p>TOTAL:</p>
                    <p>'.$total.'€</p>
                    

                </div>

                <a href="efectuar_compra.php" class="btn btn-default btn_comprar hvr-shutter-out-horizontal">Comprar</a>
';

            

    $_SESSION["compra_id"] = rand(0, 9999);
                        $_SESSION["compra_total"] = $total;
                ?>