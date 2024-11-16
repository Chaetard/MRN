<?php



session_start();
if ($_SESSION["validado"] != "true") {


    header("Location: ../index.php");
    exit;

}


require_once "conexion.php";

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="bg-danger text-center">
    <h1>!!Empresa No Encontrada!!</h1>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <a href="reporte_editar_catalogo_marian.php" class="btn btn-info">Regresar al reporte</a>
</body>
</html>