<?php
include "../../conexion.php";

$nombre_menu = $_POST["nombre_menu"];
$descripcion_menu = $_POST["descripcion_menu"];
$precio_menu = $_POST["precio_menu"];
$id_menu = $_POST["id_menu"];

//ruta temporal del archivo durante la subida
$fileTmpPath = $_FILES['img_menu']['tmp_name'];
//nombre del archivo que se va a subir
$fileName = $_FILES['img_menu']['name'];
//Tamaño del archivo
$fileSize = $_FILES['img_menu']['size'];
//Tipo de archivo -> image/png,jpg,jpeg...
$fileType = $_FILES['img_menu']['type'];
$fileNameCmps = explode(".", $fileName);
//Almacena la extensión del archivo cargado
$fileExtension = strtolower(end($fileNameCmps)); 

$ruta_destino = '../../images/' . $fileName;

$ruta_bbdd = "images/".$fileName;

if(move_uploaded_file($fileTmpPath, $ruta_destino)){

    //El archivo se sube correctamente

    $sql = "INSERT INTO menus (nombre, descripcion, precio, foto, id) VALUES (?,?,?,?,?)";
    $stmt = $conex -> prepare($sql);
    $stmt -> execute([$nombre_menu, $descripcion_menu, $precio_menu, $ruta_bbdd, $id_menu]);
    
    
}

?>