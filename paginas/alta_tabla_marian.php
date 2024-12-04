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
    <title>Formulario Tabla Empresas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script>
        function ValidarDatos() {
            var id_empresa = document.getElementById("id_empresa").value;
            var nombre_empresa = document.getElementById("nombre").value;
            var numero = document.getElementById("telefono").value;
            var sitio_web = document.getElementById("sitioweb").value;
            var oficinas_c = document.getElementById("oficinascentrales").value;
            var email = document.getElementById("email").value;
            var direccion = document.getElementById("direccion").value;
            var ciudad = document.getElementById("ciudad").value;
            var cp = document.getElementById("codigoPostal").value;

            if (id_empresa == null || id_empresa.length === 0 || /^\s+$/.test(id_empresa)) {
                alert("Debes escribir la CLAVE de la factura usando solo números");
                document.getElementById("id_empresa").style.background = 'lightgreen';
                document.getElementById("id_empresa").focus();
                return false;
            } else if (nombre_empresa == null || nombre_empresa.length === 0 || /^\s+$/.test(nombre_empresa)) {
                alert("Debes escribir el nombre de la empresa");
                document.getElementById("nombre").style.background = 'lightgreen';
                document.getElementById("nombre").focus();
                return false;
            } else if (numero == null || numero.length === 0 || isNaN(numero)) {
                alert("Debes ingresar un numero de telefono válido");
                document.getElementById("telefono").style.background = 'lightgreen';
                document.getElementById("telefono").focus();
                return false;
            } else if (sitio_web == null || sitio_web.length === 0 || /^\s+$/.test(sitio_web)) {
                alert("Debes escribir el sitio web de la empresa");
                document.getElementById("sitioweb").style.background = 'lightgreen';
                document.getElementById("sitioweb").focus();
                return false;
            } else if (oficinas_c == null || oficinas_c === "" || /^\s+$/.test(oficinas_c)) {
                alert("Debes seleccionar el estado de las oficinas centrales");
                document.getElementById("oficinascentrales").style.background = 'lightgreen';
                document.getElementById("oficinascentrales").focus();
                return false;
            } else if (email == null || email.length === 0 || /^\s+$/.test(email)) {
                alert("Debes escribir el email de la empresa");
                document.getElementById("email").style.background = 'lightgreen';
                document.getElementById("email").focus();
                return false;
            } else if (direccion == null || direccion.length === 0 || /^\s+$/.test(direccion)) {
                alert("Debes escribir la dirección de la empresa");
                document.getElementById("direccion").style.background = 'lightgreen';
                document.getElementById("direccion").focus();
                return false;
            } else if (ciudad == null || ciudad.length === 0 || /^\s+$/.test(ciudad)) {
                alert("Debes escribir la ciudad de la empresa");
                document.getElementById("ciudad").style.background = 'lightgreen';
                document.getElementById("ciudad").focus();
                return false;
            } else if (cp == null || cp.length === 0 || isNaN(cp)) {
                alert("Debes ingresar un código postal válido");
                document.getElementById("codigoPostal").style.background = 'lightgreen';
                document.getElementById("codigoPostal").focus();
                return false;
            }

            return true;
        }
    </script>

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
        .containermensje{
            margin: 10vh  0 0 10vw;
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

    <!-- Contenido principal -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEmeIV1mKuiNp0D+E3j7khQ6U68m6z9A5M2jE9Wf/NqjHMR2D8ZztVVnTQujl+Xr" crossorigin="anonymous"></script>

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
    <div id="message" class="message" style="display: none;"></div> <!-- Contenedor para mensajes -->
    <div class="container ">
        <h1>Formulario de Captura de Datos para la tabla de Empresas</h1>
        <form id="dataForm" action="grabar_datos.php" class="row containermensje" method="POST" onsubmit="return ValidarDatos()">
            <div class="row mb-3">
                <div class="col-6">
                    <label for="id_empresa">Empresa ID:</label>
                    <input type="number" id="id_empresa" name="id_empresa" class="form-control">
                </div>
                <div class="col-6">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" id="telefono" name="telefono" class="form-control">
                </div>
                <div class="col-6">
                    <label for="sitioweb">Sitio Web:</label>
                    <input type="text" id="sitioweb" name="sitioweb" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="oficinascentrales">Oficinas Centrales:</label>
                    <select id="oficinascentrales" name="oficinascentrales" class="form-select">
                        <option value="">Seleccione una opción</option>
                        <option value="CDMX">CDMX</option>
                        <option value="JALISCO">JALISCO</option>
                        <option value="SONORA">SONORA</option>
                        <option value="DURANGO">DURANGO</option>
                        <option value="PUEBLA">PUEBLA</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" class="form-control">
                </div>
                <div class="col-6">
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" id="ciudad" name="ciudad" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-6">
                    <label for="codigoPostal">Código Postal:</label>
                    <input type="number" id="codigoPostal" name="codigoPostal" class="form-control">
                </div>
            </div>

            <button type="submit" class="btn m-2 btn-primary col-4">Enviar</button>
            <h3>Marian Ochoa Estrella / Programación Web</h3>
        </form>
        
    </div>
</body>

</html>