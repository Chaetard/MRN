<?php




session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $envio_id = $_POST['txt_envio_id'];
    $id_empresa = $_POST['combo_departamento'];
    $f_envio = $_POST['f_envio'];
    $destino = $_POST['destino'];
    $ciudad_destino = $_POST['ciudad_destino'];
    $estado = $_POST['estado'];
    $costo = $_POST['costo'];
    $n_remitente = $_POST['n_remitente'];
    $n_destinatario = $_POST['n_destinatario'];
    $peso = $_POST['peso'];

    $stmt = $conn->prepare("SELECT COUNT(*) FROM envios WHERE envio_id = ?");
    $stmt->execute([$envio_id]);

    $existe = $stmt->fetchColumn();

    if ($existe > 0) {
        echo "<script>document.getElementById('message').innerHTML = 'Error: Ya existe un registro con este ID de Envío.'; document.getElementById('message').className = 'message error'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
    } else {
        // Preparar la consulta SQL para inserción
        $stmt = $conn->prepare("INSERT INTO envios (envio_id, id_empresa, f_envio, destino, ciudad_destino, estado, costo, n_remitente, n_destinatario, peso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Ejecutar la consulta con los valores
        if ($stmt->execute([$envio_id, $id_empresa, $f_envio, $destino, $ciudad_destino, $estado, $costo, $n_remitente, $n_destinatario, $peso])) {
            echo "<script>document.getElementById('message').innerHTML = 'Nuevo envío registrado exitosamente'; document.getElementById('message').className = 'message success'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
        } else {
            echo "<script>document.getElementById('message').innerHTML = 'Error al registrar el envío.'; document.getElementById('message').className = 'message error'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Envíos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../css/estilo_formulario.css" rel="stylesheet" type="text/css" media="screen">
    <script src="../javascript/validacion.js" defer></script>
    <style>
        body {
            background-color: #212529;
            color: #f8f9fa;
        }

        .navbar {
            position: fixed;
            width: 100%;
            background-color: #343a40;
            margin-bottom: 20px;
        }

        .navbar .nav-link {
            color: #ffc107;
            font-weight: bold;
        }

        .navbar .nav-link:hover {
            color: #ffffff;
        }

        .sidebar {
            background-color: #343a40;
            width: 250px;
            position: fixed;
            top: 70px;
            bottom: 0;
            left: 0;
            padding-top: 20px;
            border-right: 3px solid #ffc107;
        }

        .sidebar h2 {
            color: #ffc107;
            text-align: center;
            margin-bottom: 30px;
        }

        .list-unstyled li {
            margin-bottom: 10px;
        }

        .dropdown-menu {
            display: none;
        }

        .content-wrapper {
            margin-left: 270px;
            padding: 20px;
        }

        .card {
            margin-top: 20px;
        }

        .card-header {
            background-color: #343a40;
            color: #ffc107;
        }

        .card-body {
            background-color: #495057;
        }

        .btn-danger {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .contenedor_mensaje {
            margin-left: 20vw;
        }
    </style>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./menu_marian.php">SIVICOM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./reporte_relacionada_marian.php">Reporte de Envíos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./reporte_catalogo_marian.php">Reporte de Paquetería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ajax_catalogo_marian.php">Reporte Ajax Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ajax_relacionada_marian.php">Reporte Ajax Relacionada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./reporte_usuarios.php">Usuarios</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-danger" onclick="location.href='../index.php'">Cerrar Sesión</button>
        </div>
    </nav>

    <!-- Menú lateral -->
    <nav class="sidebar">
        <h2>Menú</h2>
        <ul class="list-unstyled">
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Envíos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./reporte_relacionada_marian.php">Reporte</a></li>
                    <li><a class="dropdown-item" href="./alta_relacionada_marian.php">Alta</a></li>
                    <li><a class="dropdown-item" href="./reporte_editar_relacionada_marian.php">Actualizar/Eliminar</a>
                    </li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Paqueterías
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./reporte_catalogo_marian.php">Reporte</a></li>
                    <li><a class="dropdown-item" href="./alta_tabla_marian.php">Alta</a></li>
                    <li><a class="dropdown-item" href="./reporte_editar_catalogo_marian.php">Actualizar/Eliminar</a>
                    </li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Usuarios
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./alta_usuarios.php">Altas</a></li>
                    <li><a class="dropdown-item" href="./reporte_para_eliminar_usuarios.php">Bajas</a></li>
                    <li><a class="dropdown-item" href="./reporte_para_editar_usuarios.php">Actualizaciones</a></li>
                    <li><a class="dropdown-item" href="./reporte_usuarios.php">Reporte</a></li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Reportes Ajax
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./ajax_catalogo_marian.php">Catálogo</a></li>
                    <li><a class="dropdown-item" href="./ajax_relacionada_marian.php">Relacionada</a></li>
                </ul>
            </li>
        </ul>
    </nav>


    <div id="message" class="message" style="display: none; "></div>
    <div class="form-container contenedor_mensaje">
        <h1>Datos del Envío Registrado</h1>
        <fieldset style="width: 90%;">
            <div>
                <br />
                <b>Envio ID:</b> <?php echo htmlspecialchars($envio_id); ?>
                <br />
                <br />
                <b>Empresa ID:</b> <?php echo htmlspecialchars($id_empresa); ?>
                <br />
                <br />
                <b>Fecha de Envío:</b> <?php echo htmlspecialchars($f_envio); ?>
                <br />
                <br />
                <b>Destino:</b> <?php echo htmlspecialchars($destino); ?>
                <br />
                <br />
                <b>Ciudad Destino:</b> <?php echo htmlspecialchars($ciudad_destino); ?>
                <br />
                <br />
                <b>Estado:</b> <?php echo htmlspecialchars($estado); ?>
                <br />
                <br />
                <b>Costo:</b> <?php echo htmlspecialchars($costo); ?>
                <br />
                <br />
                <b>Remitente:</b> <?php echo htmlspecialchars($n_remitente); ?>
                <br />
                <br />
                <b>Destinatario:</b> <?php echo htmlspecialchars($n_destinatario); ?>
                <br />
                <br />
                <b>Peso (kg):</b> <?php echo htmlspecialchars($peso); ?>
                <br />
                <a href="alta_relacionada_marian.php" class="btn btn-success">Registrar otro envío</a>
                <br />
                <br />
                <a href="reporte_editar_relacionada_marian.php" class="btn btn-success">Ver todos los envíos</a>
            </div>
        </fieldset>
        <h3>Marian Ochoa Estrella / Programación Web</h3>
    </div>
    <script>
        // Control de los dropdowns
        document.querySelectorAll('.dropdown-toggle').forEach(function (dropdown) {
            dropdown.addEventListener('click', function (event) {
                event.preventDefault();
                document.querySelectorAll('.dropdown-menu').forEach(function (menu) {
                    menu.style.display = 'none';
                });
                const menu = dropdown.nextElementSibling;
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Cerrar dropdowns al hacer clic fuera
        window.addEventListener('click', function (e) {
            if (!e.target.matches('.dropdown-toggle')) {
                document.querySelectorAll('.dropdown-menu').forEach(function (menu) {
                    menu.style.display = 'none';
                });
            }
        });
    </script>

    <?php
    // Cerramos la conexión a la base de datos
    $conn = null;
    ?>

</body>

</html>