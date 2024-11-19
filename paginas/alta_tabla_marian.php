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
</head>

<body>
    <div id="message" class="message" style="display: none;"></div> <!-- Contenedor para mensajes -->
    <div class="container">
        <h1>Formulario de Captura de Datos para la tabla de Empresas</h1>
        <form id="dataForm" action="grabar_datos.php" class="row" method="POST" onsubmit="return ValidarDatos()">
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
        </form>
        <h3>Marian Ochoa Estrella / Programación Web</h3>
    </div>
</body>

</html>