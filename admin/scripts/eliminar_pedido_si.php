<?php 
include "../../conexion.php";

$id_pedido = $_GET["id_pedido"];
$id_usuario = $_GET["id_usuario"];

$sql = "SELECT correo FROM usuarios WHERE id = ?";
$stmt = $conex -> prepare($sql);
$stmt -> execute([$id_usuario]);

if($datos = $stmt -> rowCount() == 1){

    $datos = $stmt -> fetch(PDO::FETCH_ASSOC);
    $receptor = $datos["correo"];
    $remitente = "alexandercs740@gmail.com";
    $asunto = "PEDIDO " . $id_pedido . " EN CAMINO";
    $cuerpo = "Su pedido está en camino. Si eres el destinatario de este correo, ignórelo. Si no es usted, por favor, comuníquelo.";

    mail($receptor, $asunto, $cuerpo);

    echo $receptor;

}

$sql = "DELETE FROM pedidos WHERE id_pedido = ?";
$stmt = $conex -> prepare($sql);
$stmt -> execute([$id_pedido]);

?>