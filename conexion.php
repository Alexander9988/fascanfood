<?php
$username = "remoto";
$password = "@lexand3rCS1998_rem0t0_mysql";

try{

    // Create connection
    $conex = new PDO('mysql:host=161.22.47.138; dbname=fascanfood', $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "set names UTF8"));

} catch (Exception $e) {
    
    echo "Error de conexión " . $e -> getMessage();
}

