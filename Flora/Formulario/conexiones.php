<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "formulario-flora"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}
?>
