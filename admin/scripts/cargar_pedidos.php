<?php
include "../../conexion.php";

$sql = "SELECT * FROM pedidos";

$stmt = $conex -> prepare($sql);
$stmt -> execute();

while($fila = $stmt -> fetch(PDO::FETCH_ASSOC)){

    $id_pedido = $fila["id_pedido"];
    $id_usu = $fila["id_usu"];
    $direccion_pedido = $fila["dir_pedido"];
    $tfn_pedido = $fila["tfn_pedido"];
    $metodo_pedido = $fila["metodo_pedido"];
    $menus_pedido = $fila["menus_pedido"];
    $total_pedido = $fila["total_pedido"];

    echo '<tr class="pedido animacion">
                        <td class="id_pedido">'.$id_pedido.'</td>
                        <td class="id_usuario">'.$id_usu.'</td>
                        <td>'.$direccion_pedido.'</td>
                        <td>'.$tfn_pedido.'</td>
                        <td>'.$metodo_pedido.'</td>
                        <td>'.$menus_pedido.'</td>
                        <td>'.$total_pedido.'</td>
                        <td class="opciones_admin">
                            <img src="../images/confirmar.svg" alt="si" class="img-responsive opciones_admin_icon animacion confirmar">
                            <img src="../images/cancelar.svg" alt="no" class="img-responsive opciones_admin_icon animacion cancelar">
                        </td>
                    </tr>';
};

?>