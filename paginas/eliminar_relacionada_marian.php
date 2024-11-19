<?php
session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}



require_once "conexion.php";

$envio_id = $_GET['id'];

$envio_id = (int)$envio_id;

if ($envio_id <= 0) {
    header("Location: envio_no_encontrado_marian.php");
    exit;
}

$sqlEnvio = "SELECT * FROM envios WHERE envio_id = :envio_id";
$stmtEnvio = $conn->prepare($sqlEnvio);
$stmtEnvio->bindParam(':envio_id', $envio_id, PDO::PARAM_INT);
$stmtEnvio->execute();
$rowEnvio = $stmtEnvio->fetch();

if (!$rowEnvio) {
    header("Location: envio_no_encontrado_marian.php");
    exit;
}

// Eliminamos el registro
$sqlBorrar = "DELETE FROM envios WHERE envio_id = :envio_id";
$stmtBorrar = $conn->prepare($sqlBorrar);
$stmtBorrar->bindParam(':envio_id', $envio_id, PDO::PARAM_INT);
$stmtBorrar->execute();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminación de Envío</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="row mb-3 text-center">
        <div class="col-12">
            <h2 class="display-4">Licenciatura en Tecnologías de la Información</h2>
            <p>Programación web</p>
            <p>Marian Ochoa Estrella</p>
            <h3>Envío Eliminado Correctamente</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-danger text-white">
                    <h4>Detalles del Envío Eliminado</h4>
                </div>
                <div class="card-body">
                    <fieldset>
                        <div class="mb-3">
                            <label><b>ID del Envío:</b></label>
                            <p><?php echo $rowEnvio['envio_id']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Fecha de Envío:</b></label>
                            <p><?php echo $rowEnvio['f_envio']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Destino:</b></label>
                            <p><?php echo $rowEnvio['destino']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Ciudad de Destino:</b></label>
                            <p><?php echo $rowEnvio['ciudad_destino']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Estado:</b></label>
                            <p><?php echo $rowEnvio['estado']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Costo:</b></label>
                            <p>$<?php echo number_format($rowEnvio['costo'], 2); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Remitente:</b></label>
                            <p><?php echo $rowEnvio['n_remitente']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Destinatario:</b></label>
                            <p><?php echo $rowEnvio['n_destinatario']; ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Peso:</b></label>
                            <p><?php echo $rowEnvio['peso']; ?> kg</p>
                        </div>
                    </fieldset>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="reporte_editar_relacionada_marian.php" class="btn btn-info">Regresar al reporte de envíos</a>
                        <a href="alta_relacionada_marian.php" class="btn btn-warning">Registrar un envío</a>
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
// Cerramos la conexión
$conn = null;
?>
