<?php
session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}

require_once "conexion.php";

$result;

$sql = 'SELECT * FROM usuarios ';


$result = $conn->query($sql);


$rows = $result->fetchAll();


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Envíos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <style>
        body {
            background-color: #212529;
            color: #f8f9fa;
        }

        .navbar {
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


    <!-- Contenido principal -->
    <div class="content-wrapper">
        <div class="row text-center">
            <h1 class="text-light">Reporte de Usuarios</h1>
        </div>

        <!-- Tabla de Reporte de Usuarios -->
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-secondary text-light">
                    <div class="card-header text-center">
                        <h3>Usuarios Registrados</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre de usuario</th>
                                    <th>Contraseña</th>
                                    <th>Tipo de usuario</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($rows as $row) {

                                    ?>
                                    <tr>
                                        <td><?php echo $row['id_usuario']; ?></td>


                                        <td><?php echo $row['usuario']; ?></td>
                                        <td><?php echo $row['clave']; ?></td>
                                        <td><?php echo $row['tipousuario']; ?></td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pzjw8f+ua7Kw1TIq0JdQ9jD6txf5WsoXI7yBh0KrxP6gYbxEwlm2js2+6EGRd0I1"
        crossorigin="anonymous"></script>

</body>

</html>