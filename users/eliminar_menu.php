<?php
session_start();
if (!isset($_GET["id"])){
    header("Location: ../index.php");
}
include "../conexion.php";

$cod_orden = $_GET["id"];
$usu_id = $_SESSION["id"];

$sql = "DELETE FROM menus_usuarios WHERE usu_id = ? AND orden_id = ?";

$stmt = $conex->prepare($sql);
$stmt->execute([$usu_id, $cod_orden]);

foreach($_SESSION["lista_menus"] as $index => $value){
    if($value == $menu){
        unset($_SESSION["lista_menus"][$index]);
        break;
    }
}
?>