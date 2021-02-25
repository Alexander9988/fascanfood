<?php 
include "../../conexion.php";

$id = $_GET["id"];

$sql = "DELETE FROM menus WHERE id = ?";
$stmt = $conex -> prepare($sql);
$stmt -> execute([$id]);
?>