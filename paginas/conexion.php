<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .centrar {
            text-align: center;
            width: 100%;
            font-size: 100px;
        }
    </style>
</head>

<body>
    <?php

    //  $servername = "localhost";
    //  $username = "root";
    //  $password = "";
    //  $basededatos = "prograweb";
    
    $servername = "fdb1030.atspace.me";
    $username = "4244598_santos";
    $password = "hola123hola";
    $basededatos = "4244598_santos";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$basededatos", $username, $password);
        // Establecer el modo de error a excepcion
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        //echo  "<div class='  bg-success centrar' aling=´center´>si me conecte </h1></div>";
    } catch (PDOException $e) {

        //echo  "<div class='centrar bg-danger' style='font-size:30px;' >Conexion fallida: " . $e->getMessage() . "</h1></div>";
    }

    ?>
</body>

</html>