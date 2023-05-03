<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'aso_campo';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;charset=utf8", $username, $password);
}   catch (PDOException $e) {
  die('Falló la conección a la base de datos: ' . $e->getMessage());
}
?>