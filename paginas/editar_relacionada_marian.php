<?php

session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}


require_once "conexion.php";

$result = "";
$result2 = "";
$sqlPaq = 'SELECT id_empresa, nombre FROM paqueteria';
$stmt2 = $conn->query($sqlPaq);
$rows2 = $stmt2->fetchAll();
if (empty($rows2)) {
    $result2 = "No se encontraron Paqueterias !!";
}
$envio_id = $_GET["id"];
$envio_id = (int) $envio_id;
if ($envio_id == "") {
    header("Location: reporte_para_editar_relacionada.php");
    exit;
}
if (is_null($envio_id)) {
    header("Location: reporte_para_editar_relacionada.php");
    exit;
}
$sql3 = 'SELECT E.envio_id, E.f_envio, E.destino, E.ciudad_destino, E.estado, E.costo, E.n_remitente, E.n_destinatario, E.peso, P.nombre, P.id_empresa FROM envios E
         INNER JOIN paqueteria P ON E.id_empresa = P.id_empresa
         WHERE E.envio_id =' . $envio_id;


$result = $conn->query($sql3);
$rows = $result->fetchAll();
if (empty($rows)) {
    $result = "No se encontraron empleados !!";
    header("Location: reporte_editar_relacionada_marian.php");
    exit;
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Editar Relacionada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="../javascript/editar_relacionada_marian.js"></script>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-4 mt-3">Licenciatura en Tecnologías de la Información</div>
            <div class="col-4 mt-3">Programación web</div>
            <div class="col-4 mt-3">Formulario para modificar departamentos en la base de datos desde una página web
            </div>
        </div>





        <h1>Actualizar un envio</h1>
        <form action="actualizar_relacionada_marian.php" method="post" id="formulario1"
            onsubmit="return ValidaFormulario1();">
            <?php foreach ($rows as $row) { ?>
                <input type="hidden" name="envio_id_oculto" id="envio_id_oculto" value="<?php echo $row['envio_id']; ?>" />

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Id del Envío:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="txt_envio_id" id="txt_envio_id" maxlength="5" disabled
                            value="<?php echo $row['envio_id']; ?>" />
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Paquetería:</label>
                    <div class="col-sm-8">
                        <select name="combo_departamento" id="combo_departamento" class="form-select">
                            <option value="0">-- Selecciona un departamento --</option>
                            <?php foreach ($rows2 as $row2) {
                                echo '<option value="' . $row2['id_empresa'] . '">' . $row2['nombre'] . '</option>';
                            } ?>
                            <option value="<?php echo $row['id_empresa']; ?>" selected><?php echo $row['nombre']; ?>
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Fecha de Envío:</label>
                    <div class="col-sm-8">
                        <input type="date" name="f_envio" id="f_envio" maxlength="50" class="form-control"
                            value="<?php echo $row['f_envio']; ?>" />
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Direccion de envio:</label>
                    <div class="col-sm-8">
                        <input type="text" name="destino" id="destino" maxlength="50" class="form-control"
                            value="<?php echo $row['destino']; ?>" />
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Ciudad de Destino:</label>
                    <div class="col-sm-8">
                        <input type="text" name="ciudad_destino" id="ciudad_destino" maxlength="50" class="form-control"
                            value="<?php echo $row['ciudad_destino']; ?>" />
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label mt-3">Estado:</label>
                    <div class="col-sm-8">
                        <select id="estado" name="estado" class="form-select">
                            <option value="0">--Seleccione un Estado--</option>
                            <option value="CDMX">CDMX</option>
                            <option value="DURANGO">Durango</option>
                            <option value="JALISCO">Jalisco</option>
                            <option value="PUEBLA">Puebla</option>
                            <option value="SONORA">Sonora</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Costo:</label>
                    <div class="col-sm-8">
                        <input type="text" name="costo" id="costo" maxlength="50" class="form-control"
                            value="<?php echo $row['costo']; ?>" />
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Nombre del Remitente:</label>
                    <div class="col-sm-8">
                        <input type="text" name="n_remitente" id="n_remitente" maxlength="50" class="form-control"
                            value="<?php echo $row['n_remitente']; ?>" />
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Nombre del Destinatario:</label>
                    <div class="col-sm-8">
                        <input type="text" name="n_destinatario" id="n_destinatario" maxlength="50" class="form-control"
                            value="<?php echo $row['n_destinatario']; ?>" />
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="col-sm-4 col-form-label">Peso en Kilogramos:</label>
                    <div class="col-sm-8">
                        <input type="text" name="peso" id="peso" maxlength="50" class="form-control"
                            value="<?php echo $row['peso']; ?>" />
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <div class="col-12">
                        <input type="submit" class="btn btn-success w-100" name="AddEmpresa" id="AddEmpresa"
                            value="Actualizar esta empresa" />
                    </div>
                </div>
            <?php } ?>
        </form>

    </div>






</body>


</html>