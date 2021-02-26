<?php
$username = "root";
$password = "";

try{

    // Create connection
    $conex = new PDO('mysql:host=localhost; dbname=fascanfood', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names UTF8"));

} catch (Exception $e) {
    
    echo "Error de conexión " . $e -> getMessage();
}

