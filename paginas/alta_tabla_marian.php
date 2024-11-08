<?php
require_once "conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Tabla Empresas</title>
    <link href="../css/estilo_formulario.css" rel="stylesheet" type="text/css" media="screen">
    <script src="../javascript/validacion.js" defer></script>
</head>

<body>
    <div id="message" class="message" style="display: none;"></div> <!-- Contenedor para mensajes -->
    <div class="container">
        <h1>Formulario de Captura de Datos para la tabla de Empresas</h1>
        <form id="dataForm" action="grabar_datos.php" class="row" method="POST" onsubmit="return validarDatos()">

        <div class="row mb-3">
        <div class="col-6">
            <label for="id_empresa" class="">Empresa ID:</label>
            <input type="number" id="id_empresa" name="id_empresa" class="form-control" required>
        </div>
        <div class="col-6">
            <label for="nombre" class="">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="telefono" class="">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" class="form-control" required>
        </div>
        <div class="col-6">
            <label for="sitioweb" class="">Sitio Web:</label>
            <input type="text" id="sitioweb" name="sitioweb" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="oficinascentrales" class="">Oficinas Centrales:</label>
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
            <label for="email" class="">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="direccion" class="">Dirección:</label>
            <input type="text" id="direccion" name="direccion" class="form-control">
        </div>
        <div class="col-6">
            <label for="ciudad" class="">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-6">
            <label for="codigoPostal" class="">Código Postal:</label>
            <input type="number" id="codigoPostal" name="codigoPostal" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn m-2 btn-primary col-4">Enviar</button>
        </form>
        <h3>Marian Ochoa Estrella / Programación Web</h3>
    </div>
    <?php
    $conn = null;
    ?>

</body>

</html>