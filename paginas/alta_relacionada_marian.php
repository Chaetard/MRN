<?php


session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}


require_once "conexion.php";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Envíos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../javascript/editar_relacionada_marian.js"></script>
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
    <div id="message" class="message" style="display: none;"></div>
    <div class="container contenedor_mensaje">
        <h1>Formulario de Captura de Datos para el Envío</h1>
        <form id="dataForm" action="grabar_relacionada.php" class="row" method="POST"
            onsubmit="return ValidaFormulario1()">

            <div class="row mb-3">
                <div class="col-6">
                    <label for="txt_envio_id" class="form-label">Envio ID:</label>
                    <input type="number" id="txt_envio_id" name="txt_envio_id" class="form-control">
                </div>

                <div class="col-6">
                    <label for="combo_departamento" class="">Empresa:</label>
                    <select id="combo_departamento" name="combo_departamento" class="form-select">
                        <?php
                        $sqlEmpresas = "SELECT id_empresa, nombre FROM paqueteria";
                        $stmtEmpresas = $conn->query($sqlEmpresas);
                        $empresas = $stmtEmpresas->fetchAll();
                        foreach ($empresas as $empresa) {
                            echo "<option value='" . $empresa['id_empresa'] . "'>" . $empresa['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="f_envio" class="">Fecha de Envío:</label>
                    <input type="date" id="f_envio" name="f_envio" class="form-control">
                </div>
                <div class="col-6">
                    <label for="destino" class="">Destino:</label>
                    <input type="text" id="destino" name="destino" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="ciudad_destino" class="">Ciudad Destino:</label>
                    <input type="text" id="ciudad_destino" name="ciudad_destino" class="form-control">
                </div>
                <div class="col-6">
                    <label for="estado" class="">Estado:</label>
                    <select id="estado" name="estado" class="form-select">
                        <option value="">Seleccione una opción</option>
                        <option value="CDMX">CDMX</option>
                        <option value="JALISCO">JALISCO</option>
                        <option value="SONORA">SONORA</option>
                        <option value="DURANGO">DURANGO</option>
                        <option value="PUEBLA">PUEBLA</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="costo" class="">Costo:</label>
                    <input type="number" step="0.01" id="costo" name="costo" class="form-control">
                </div>
                <div class="col-6">
                    <label for="n_remitente" class="">Nombre Remitente:</label>
                    <input type="text" id="n_remitente" name="n_remitente" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="n_destinatario" class="">Nombre Destinatario:</label>
                    <input type="text" id="n_destinatario" name="n_destinatario" class="form-control">
                </div>
                <div class="col-6">
                    <label for="peso" class="">Peso (kg):</label>
                    <input type="number" step="0.1" id="peso" name="peso" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn m-2 btn-primary col-4">Enviar</button>
        </form>
        <h3>Marian Ochoa Estrella / Programación Web</h3>
    </div>
    <?php
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