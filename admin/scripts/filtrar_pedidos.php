<?php
include "../../conexion.php";

$id_usuario = $_GET["id"];
$sql = "SELECT * FROM pedidos WHERE id_usu = ?";

$stmt = $conex -> prepare($sql);
$stmt -> execute([$id_usuario]);

while($fila = $stmt -> fetch(PDO::FETCH_ASSOC)){

    $id_pedido = $fila["id_pedido"];
    $id_usu = $fila["id_usu"];
    $direccion_pedido = $fila["dir_pedido"];
    $tfn_pedido = $fila["tfn_pedido"];
    $metodo_pedido = $fila["metodo_pedido"];
    $menus_pedido = $fila["menus_pedido"];
    $total_pedido = $fila["total_pedido"];

    echo '<tr class="pedido animacion">
                        <td class="id">'.$id_pedido.'</td>
                        <td>'.$id_usu.'</td>
                        <td>'.$direccion_pedido.'</td>
                        <td>'.$tfn_pedido.'</td>
                        <td>'.$metodo_pedido.'</td>
                        <td>'.$menus_pedido.'</td>
                        <td>'.$total_pedido.'</td>
                    </tr>';
};

?>