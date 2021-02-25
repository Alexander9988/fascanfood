<?php
session_start();
if (!isset($_SESSION["nombre"])){
    header("Location: ../index.php");
};
include "../conexion.php";

$id_usu = $_SESSION["id"];
$id_menu = $_GET["id"];
$id_orden = rand(0, 9999);
$descripcion = $_GET["desc"];
$img = $_GET["img"];
$precio = $_GET["precio"];

$sql = "INSERT INTO menus_usuarios (usu_id, menu_id, orden_id, menu_img, menu_descripcion, menu_precio) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conex->prepare($sql);

$stmt->execute([$id_usu, $id_menu, $id_orden, $img, $descripcion, $precio]);

$_SESSION["lista_menus"][] = $id_menu;

//header("Location: ../index.php#carta");
?>