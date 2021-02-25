<?php
include "../../conexion.php";

$sql = "SELECT * FROM menus";

$stmt = $conex -> prepare($sql);
$stmt -> execute();

while($fila = $stmt -> fetch(PDO::FETCH_ASSOC)){

    $id_menu = $fila["id"];
    $nombre_menu = $fila["nombre"];
    $descripcion_menu = $fila["descripcion"];
    $precio_menu = $fila["precio"];
    $foto_menu = $fila["foto"];

    echo '<tr class="pedido animacion">
                        <td class="id">'.$id_menu.'</td>
                        <td>'.$nombre_menu.'</td>
                        <td>'.$descripcion_menu.'</td>
                        <td>'.$precio_menu.'</td>
                        <td>'.$foto_menu.'</td>
                        <td class="opciones_admin">
                            <img src="../images/cancelar.svg" alt="no" class="img-responsive opciones_admin_icon animacion cancelar">
                        </td>
                    </tr>';
};

?>