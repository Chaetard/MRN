<?php
session_start();
require_once("conexion.php");
$result = "";
$cuantos;

$Vclave = trim($_POST["txtpassword"]);
$Vclave = (int) $Vclave;
$Vusuario = trim($_POST["txtusuario"]);

$sqlLOGIN = "SELECT * FROM usuarios WHERE usuario = '$Vusuario' AND clave = $Vclave";

$result = $conn->query($sqlLOGIN);
$rows = $result->fetchAll();

$cuantos = (int) $rows;

if ($cuantos > 0) {
    $_SESSION["validado"] = "true";
    $_SESSION["usuario"] = $Vusuario;
    $conn = null;


    header("Location: menu_marian.php");
    exit;

} else {
    $_SESSION["validado"] = "false";
    $conn = null;


    header("Location: login.php");
    exit;

}

echo $Vclave . $Vusuario . $_SESSION["validado"];


foreach ($rows as $row) {
    echo $row["usuario"];
    echo $row["clave"];
}