<?php
session_start();
if (!isset($_SESSION["nombre"])){
    header("Location: ../index.php");
}
include "../conexion.php";

foreach($_SESSION["lista_menus"] as $index => $value){
    if ($lista==""){
        $lista = $value;
    } else {
        $lista .= ".".$value;
    }
};


$sql = "INSERT INTO pedidos (id_pedido, id_usu, total_pedido, dir_pedido, tfn_pedido, metodo_pedido, menus_pedido) VALUES (?,?,?,?,?,?,?)";

$stmt = $conex->prepare($sql);
$stmt->execute([$_SESSION["compra_id"], $_SESSION["id"], $_SESSION["compra_total"], $_POST["usuario_direccion"], $_POST["usuario_tfn"], $_POST["metodo_pago"], $lista]);

$sql = "DELETE FROM menus_usuarios WHERE usu_id = ?";
$stmt = $conex->prepare($sql);
$stmt->execute([$_SESSION["id"]]);

$lista = "";
$_SESSION["lista_menus"] = null;

header("Location: carrito.php");
?>