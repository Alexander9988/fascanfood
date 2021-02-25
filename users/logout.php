<?php
include "../conexion.php";
if (!isset($_SESSION["nombre"])){
    header("Location: ../index.php");
}
session_start();
session_destroy();
$conex = null;
header("Location: ../index.php");
?>