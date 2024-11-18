<?php

$host = 'localhost';
$dbname = 'DatabaseElPatio';
$user = 'postgres'; 
$password = 'Ramses2003'; 

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexión a PostgreSQL exitosa!";

} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
