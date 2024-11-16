<?php
$servername = "fdb1030.atspace.me";
$username = "4244598_santos";
$password = "hola123hola";
$basededatos = "4244598_santos";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$basededatos", $username, $password);
    // Establecer el modo de error a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejo de errores (si es necesario)
    // echo  "<div class='centrar bg-danger' style='font-size:30px;' >Conexion fallida: " . $e->getMessage() . "</h1></div>";
}