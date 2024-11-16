<?php
session_start();
$_SESSION["validado"] = "false";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRN Gestión de Envíos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .hero {
            text-align: center;
        }

        .hero img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        .btn-primary {
            font-size: 1.2rem;
            padding: 10px 20px;
        }

        footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>

<body>

    <div class="hero animate__animated animate__fadeInDown">

        <h1 class="display-4 text-primary">Bienvenido a MRN Envios</h1>

        <p class="lead text-secondary">Logistica y seguimiento de tus envios</p>



        <a href="./paginas/login.php" class="btn btn-primary">Iniciar Sesión</a>
    </div>

    <footer>
        Programacion Web
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-wEmeIV1mKuiNp0D+E3j7khQ6U68m6z9A5M2jE9Wf/NqjHMR2D8ZztVVnTQujl+Xr"
        crossorigin="anonymous"></script>
</body>

</html>