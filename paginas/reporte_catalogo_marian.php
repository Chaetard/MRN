<?php
session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}
require_once "conexion.php";

$sql = 'SELECT id_empresa, nombre, sitio_web, oficinas_c FROM paqueteria';
$result = $conn->query($sql);
$rows = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Paqueterias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            font-size: 0.875rem;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .header-row {
            background-color: #343a40;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }

        .table-container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        .btn-add-shipment {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1.1rem;
            padding: 12px 30px;
            margin: 20px 0;
            width: 100%;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-add-shipment:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            font-size: 0.8rem;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table td {
            background-color: #f8f9fa;
        }

        .footer {
            text-align: center;
            color: #6c757d;
            margin-top: 30px;
        }
    </style>
    <style>
        body {
            background-color: #212529;
            color: black !important;
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

    <div class="container">

        <div class="header-row">
            <div class="row">
                <div class="col-md-4">Licenciatura en Tecnologías de la Información</div>
                <div class="col-md-4">Programación Web</div>
                <div class="col-md-4">Lista de Paqueterias</div>
            </div>
        </div>

        <div class="table-container">
            <div class="title">Lista de Paqueterias Registradas</div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Id Envío</th>
                            <th>Fecha de Envío</th>
                            <th>Nombre del Remitente</th>
                            <th>Paquetería</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['id_empresa']; ?></td>
                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>

                                <td>
                                    <a href="http://<?php echo $row['sitio_web']; ?>" target="_blank"
                                        class="btn btn-secondary">
                                        Enlace
                                    </a>
                                </td>
                                <td><?php echo $row['oficinas_c']; ?></td>

                                <td>
                                    <a href="detalle_paqueteria.php?id=<?php echo $row['id_empresa']; ?>"
                                        class="btn btn-info">
                                        Ver más detalles
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <a href="menu_marian.php" class="btn btn-warning mt-3">Regresar al Menu</a>
        </div>

        <div class="footer">
            <p>Marian Ochoa Estrella</p>
        </div>

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
</body>

</html>