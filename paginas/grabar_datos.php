<?php


session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}
require_once "conexion.php";

// Si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_empresa = $_POST['id_empresa'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $sitioweb = $_POST['sitioweb'];
    $oficinas_c = $_POST['oficinascentrales'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $cp = $_POST['codigoPostal'];

    $stmt = $conn->prepare("SELECT COUNT(*) FROM paqueteria WHERE id_empresa = ? OR LOWER(nombre) = LOWER(?)");
    $stmt->execute([$id_empresa, $nombre]);
    
    $existe = $stmt->fetchColumn();

    if ($existe > 0) {
        echo "<script>document.getElementById('message').innerHTML = 'Error: Ya existe un registro con este ID de Empresa o Nombre de Empresa.'; document.getElementById('message').className = 'message error'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
    } else {
        // Preparar la consulta SQL para inserción
        $stmt = $conn->prepare("INSERT INTO paqueteria (id_empresa, nombre, telefono, sitio_web, oficinas_c, email, direccion, ciudad, cp) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Ejecutar la consulta con los valores
        if ($stmt->execute([$id_empresa, $nombre, $telefono, $sitioweb, $oficinas_c, $email, $direccion, $ciudad, $cp])) {
            echo "<script>document.getElementById('message').innerHTML = 'Nuevo registro creado exitosamente'; document.getElementById('message').className = 'message success'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
        } else {
            echo "<script>document.getElementById('message').innerHTML = 'Error al crear el registro.'; document.getElementById('message').className = 'message error'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Tabla Empresas</title>
    <link href="../css/estilo_formulario.css" rel="stylesheet" type="text/css" media="screen"> 
    <script src="../javascript/validacion.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        .msjc{
            margin: 10vh  0 0 20vw;
        }
    </style>
</head>

<body>

    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./menu_marian.php">SIVICOM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Envíos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./reporte_relacionada_marian.php">Reporte</a></li>
                    <li><a class="dropdown-item" href="./alta_relacionada_marian.php">Alta</a></li>
                    <li><a class="dropdown-item" href="./reporte_editar_relacionada_marian.php">Actualizar/Eliminar</a></li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Paqueterías
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./reporte_catalogo_marian.php">Reporte</a></li>
                    <li><a class="dropdown-item" href="./alta_tabla_marian.php">Alta</a></li>
                    <li><a class="dropdown-item" href="./reporte_editar_catalogo_marian.php">Actualizar/Eliminar</a></li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reportes Ajax
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./ajax_catalogo_marian.php">Catálogo</a></li>
                    <li><a class="dropdown-item" href="./ajax_relacionada_marian.php">Relacionada</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="message" class="message" style="display: none;"></div> <!-- Contenedor para mensajes -->
    <div class="form-container ">
        <h1>Datos Registrados</h1>
        <fieldset style="width: 90%;">
            <div class="msjc">
                <br />
                    <b>ID Empresa:</b> <?php echo htmlspecialchars($id_empresa); ?>
                <br />
                <br />
                    <b>Nombre:</b> <?php echo htmlspecialchars($nombre); ?>
                <br />
                <br />
                    <b>Teléfono:</b> <?php echo htmlspecialchars($telefono); ?>
                <br />
                <br />
                    <b>Sitio Web:</b> <?php echo htmlspecialchars($sitioweb); ?>
                <br />
                <br />
                    <b>Oficinas Centrales:</b> <?php echo htmlspecialchars($oficinas_c); ?>
                <br />
                <br />
                    <b>Email:</b> <?php echo htmlspecialchars($email); ?>
                <br />
                <br />
                    <b>Dirección:</b> <?php echo htmlspecialchars($direccion); ?>
                <br />
                <br />
                    <b>Ciudad:</b> <?php echo htmlspecialchars($ciudad); ?>
                <br />
                <br />
                    <b>Código Postal:</b> <?php echo htmlspecialchars($cp); ?>
                <br />
                    <a href="alta_tabla_marian.php">REGISTRAR OTRA EMPRESA</a>
                <br />
                <br />
                    <a href="reporte_editar_catalogo_marian.php">Ver todos los registros</a>
                    <h3>Marian Ochoa Estrella / Programación Web</h3>
            </div>
        </fieldset>
        
    </div>
    
    <?php
        // Cerramos la conexión a la base de datos
        $conn = null;
     ?>
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
</body>
</html>