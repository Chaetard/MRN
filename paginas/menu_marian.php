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
    <title>Menú Principal</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #212529; /* Fondo oscuro */
            color: #f8f9fa; /* Texto claro */
        }

        .container {
            margin-top: 50px;
        }

        h1, h2 {
            color: #ffc107; /* Color amarillo de Bootstrap */
        }

        .btn {
            font-size: 1rem;
            font-weight: bold;
        }

        ul {
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
        }

        .navbar {
            margin-bottom: 30px;
        }

        .btn-danger {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
    </style>
</head>

<body>

   
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
    
        <span class="navbar-brand mb-0 h1">MRN</span>
        
     
        <button class="btn btn-danger mb-0" onclick="location.href='../index.php'">Cerrar Sesion</button>
    </div>
</nav>


    <div class="container">
        <div class="row text-center">
            <h1>Gestion de Envios</h1>
            <h2>Menu Principal</h2>
            <p>Elige las acciones disponibles</p>
        </div>

        <!-- Opciones de Envíos y Paqueterías -->
        <div class="row mt-5">
            <!-- Sección de Envíos -->
            <div class="col-md-6">
                <div class="card bg-secondary text-light">
                    <div class="card-header text-center">
                        <h3>Envios</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a class="btn btn-success w-100 mb-3" href="./reporte_relacionada_marian.php">Reporte</a></li>
                            <li><a class="btn btn-success w-100 mb-3" href="./reporte_editar_relacionada_marian.php">Actualizar o eliminar</a></li>
                            <li><a class="btn btn-success w-100 mb-3" href="./alta_relacionada_marian.php">Alta</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sección de Paqueterías -->
            <div class="col-md-6">
                <div class="card bg-secondary text-light">
                    <div class="card-header text-center">
                        <h3>Paqueterias</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a class="btn btn-primary w-100 mb-3" href="./reporte_catalogo_marian.php">Reporte</a></li>
                            <li><a class="btn btn-primary w-100 mb-3" href="./reporte_editar_catalogo_marian.php">Actualizar o eliminar</a></li>
                            <li><a class="btn btn-primary w-100 mb-3" href="./alta_tabla_marian.php">Alta</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEmeIV1mKuiNp0D+E3j7khQ6U68m6z9A5M2jE9Wf/NqjHMR2D8ZztVVnTQujl+Xr" crossorigin="anonymous"></script>
</body>

</html>
