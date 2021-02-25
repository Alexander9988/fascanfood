<?php
include "../../conexion.php";
session_start();

$mail = $_POST["admin_correo"];
$pass = $_POST["admin_pass"];

$sql = "SELECT * FROM usuarios WHERE id = 4512";

$stmt = $conex -> prepare($sql);
$stmt -> execute([$mail, $pass]);

if($datos = $stmt -> fetch(PDO::FETCH_ASSOC)){

    $valid_mail = $datos["correo"];
    $valid_pass = $datos["contrasena"];

    if($mail == $valid_mail && $pass == $valid_pass){

        $_SESSION["id"] = $datos["id"];
        $_SESSION["nombre"] = "admin";
        header("Location: ../panel_admin.php");

    } else{

        header("Location: ../error-admin.php");

    }

} else{

    echo "ERROR";

}
?>