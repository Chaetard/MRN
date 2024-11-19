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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="../javascript/editar_relacionada_marian.js"></script>
</head>

<body>
    <div id="message" class="message" style="display: none;"></div>
    <div class="container">
        <h1>Formulario de Captura de Datos para el Envío</h1>
        <form id="dataForm" action="grabar_relacionada.php" class="row" method="POST" onsubmit="return ValidaFormulario1()">

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
</body>

</html>
