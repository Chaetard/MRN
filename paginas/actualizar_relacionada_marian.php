<?php

session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}

require_once "conexion.php";

$envio_id = $_POST["envio_id_oculto"];
$envio_id = (int)$envio_id;  
$id_empresa = $_POST["combo_departamento"];
$id_empresa = (int)$id_empresa;
$f_envio = $_POST["f_envio"];
$destino = strtoupper(trim($_POST["destino"]));
$ciudad_destino = strtoupper(trim($_POST["ciudad_destino"]));
$estado = strtoupper(trim($_POST["estado"]));
$costo = $_POST["costo"];
$costo = (float)$costo;  
$n_remitente = strtoupper(trim($_POST["n_remitente"]));
$n_destinatario = strtoupper(trim($_POST["n_destinatario"]));
$peso = $_POST["peso"];
$peso = (float)$peso;

$sqlUPDATE = "UPDATE envios SET 
                id_empresa = '$id_empresa', 
                f_envio = '$f_envio', 
                destino = '$destino', 
                ciudad_destino = '$ciudad_destino', 
                estado = '$estado', 
                costo = $costo, 
                n_remitente = '$n_remitente', 
                n_destinatario = '$n_destinatario', 
                peso = $peso 
              WHERE envio_id = $envio_id";

$conn->exec($sqlUPDATE);

$sqlEnvio = "SELECT * FROM envios WHERE envio_id = $envio_id";
$stmtEnvio = $conn->query($sqlEnvio);
$rowEnvio = $stmtEnvio->fetch();

$sqlDptos = "SELECT id_empresa, nombre FROM paqueteria WHERE id_empresa = '$id_empresa'";
$stmt2 = $conn->query($sqlDptos);
$rows2 = $stmt2->fetchAll();

if (empty($rows2)) {
    $result2 = "No se encontró esa paqueteria !!";
} else {
    foreach ($rows2 as $row2) {
        $Nombre = $row2['nombre'];
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Envíos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }

        .navbar {
            position: fixed;
            width: 100%;
            background-color: #343a40;
            z-index: 1000;
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

        .content-wrapper {
            margin-left: 270px;
            padding-top: 90px;
            padding-bottom: 20px;
        }

        .card {
            margin-top: 20px;
        }

        .card-header {
            background-color: #28a745;
            color: white;
        }

        .card-body {
            background-color: #f4f6f9;
        }

        .btn-danger {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .container {
            max-width: 1200px;
        }

        .mb-3 p {
            font-size: 1.1em;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./menu_marian.php">SIVICOM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="./reporte_relacionada_marian.php">Reporte de Envíos</a></li>
                    <li class="nav-item"><a class="nav-link" href="./reporte_catalogo_marian.php">Reporte de Paquetería</a></li>
                    <li class="nav-item"><a class="nav-link" href="./ajax_catalogo_marian.php">Reporte Ajax Catalogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="./ajax_relacionada_marian.php">Reporte Ajax Relacionada</a></li>
                    <li class="nav-item"><a class="nav-link" href="./reporte_usuarios.php">Usuarios</a></li>
                </ul>
            </div>
            <button class="btn btn-danger" onclick="location.href='../index.php'">Cerrar Sesión</button>
        </div>
    </nav>

    <!-- Sidebar -->
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

    <div class="content-wrapper">
        <div class="container">
            <div class="row mb-3 text-center">
                <div class="col-12">
                    <h2 class="display-4">Licenciatura en Tecnologías de la Información</h2>
                    <p>Programación web</p>
                    <p>Marian Ochoa Estrella</p>
                    <h3>Datos del Envío Actualizados Correctamente</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Envío Actualizado Satisfactoriamente</h4>
                        </div>
                        <div class="card-body">
                            <fieldset>
                                <div class="mb-3">
                                    <label><b>Paquetería:</b></label>
                                    <p><?php echo ($Nombre); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>ID del Envío:</b></label>
                                    <p><?php echo ($rowEnvio['envio_id']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Fecha de Envío:</b></label>
                                    <p><?php echo ($rowEnvio['f_envio']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Destino:</b></label>
                                    <p><?php echo ($rowEnvio['destino']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Ciudad de Destino:</b></label>
                                    <p><?php echo ($rowEnvio['ciudad_destino']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Estado:</b></label>
                                    <p><?php echo ($rowEnvio['estado']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Costo:</b></label>
                                    <p>$<?php echo number_format($rowEnvio['costo'], 2); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Remitente:</b></label>
                                    <p><?php echo ($rowEnvio['n_remitente']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Destinatario:</b></label>
                                    <p><?php echo ($rowEnvio['n_destinatario']); ?></p>
                                </div>
                                <div class="mb-3">
                                    <label><b>Peso:</b></label>
                                    <p><?php echo ($rowEnvio['peso']); ?> kg</p>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
