<?php


session_start();
if ($_SESSION["validado"] != "true") {


    header("Location: ../index.php");
    exit;

}


require_once "conexion.php";


// Recuperar el ID de la empresa del POST
$id_empresa = $_GET["id"];
$id_empresa = (int) $id_empresa;

// Verificar que el ID no sea nulo o inválido
if (empty($id_empresa) || !is_int($id_empresa)) {
    header("Location: empresa_no_encontrada_marian.php");
    exit;
}

// Recuperar los datos actuales antes de la eliminación
$sqlSelect = "SELECT * FROM paqueteria WHERE id_empresa = $id_empresa";
$stmtSelect = $conn->query($sqlSelect);
$rowEmpresa = $stmtSelect->fetch();

// Verificar si la empresa existe
if (!$rowEmpresa) {
    header("Location: empresa_no_encontrada_marian.php");
    exit;
}

// Eliminar el registro de la empresa
$sqlDelete = "DELETE FROM paqueteria WHERE id_empresa = $id_empresa";
$conn->exec($sqlDelete);

?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminación de Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <div class="row mb-3 text-center">
            <div class="col-12">
                <h2 class="display-4">Licenciatura en Tecnologías de la Información</h2>
                <p>Programación web</p>
                <p>Marian Ochoa Estrella</p>
                <h3>Datos de la Empresa Eliminados Correctamente</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h4>Empresa Eliminada Satisfactoriamente</h4>
                    </div>
                    <div class="card-body">
                        <fieldset>
                            <div class="mb-3">
                                <label><b>ID de la Empresa:</b></label>
                                <p><?php echo ($rowEmpresa['id_empresa']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Nombre de la Empresa:</b></label>
                                <p><?php echo ($rowEmpresa['nombre']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Teléfono:</b></label>
                                <p><?php echo ($rowEmpresa['telefono']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Sitio Web:</b></label>
                                <p><?php echo ($rowEmpresa['sitio_web']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Oficinas Centrales:</b></label>
                                <p><?php echo ($rowEmpresa['oficinas_c']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Email:</b></label>
                                <p><?php echo ($rowEmpresa['email']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Dirección:</b></label>
                                <p><?php echo ($rowEmpresa['direccion']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Ciudad:</b></label>
                                <p><?php echo ($rowEmpresa['ciudad']); ?></p>
                            </div>
                            <div class="mb-3">
                                <label><b>Código Postal:</b></label>
                                <p><?php echo ($rowEmpresa['cp']); ?></p>
                            </div>
                        </fieldset>
                        <div class="d-flex justify-content-between mt-4">
                            <a href="reporte_editar_catalogo_marian.php" class="btn btn-info">Regresar al reporte
                                paquetería</a>
                            <a href="alta_tabla_marian.php" class="btn btn-warning">Registrar otra paquetería</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<?php
$conn = null;
?>