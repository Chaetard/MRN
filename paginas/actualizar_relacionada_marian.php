<?php
require_once "conexion.php";

$envio_id = $_POST["txt_envio_id_oculto"];
$envio_id = (int)$envio_id;  
$id_empresa = $_POST["combo_departamento"];
$id_empresa = (int)$id_empresa;
$f_envio = $_POST["f_envio"];
$destino = strtoupper(trim($_POST["txt_sitio_web"]));
$ciudad_destino = strtoupper(trim($_POST["txt_ciudad_destino"]));
$estado = strtoupper(trim($_POST["txt_estado"]));
$costo = $_POST["txt_costo"];
$costo = (float)$costo;  
$n_remitente = strtoupper(trim($_POST["txt_remitente"]));
$n_destinatario = strtoupper(trim($_POST["txt_destinatario"]));
$peso = $_POST["txt_peso"];
$peso = (float)$peso;  

$sqlUPDATE = "UPDATE envios SET 
                id_empresa = '$id_empresa', 
                f_envio = '$f_envio', 
                destino = '$destino', 
                ciudad_destino = '$ciudad_destino', 
                estado = '$estado', 
                costo = $costo, 
                n_remitente = '$n_remitente', 
                n_destinatario = '$n_destinatario', 
                peso = $peso 
              WHERE envio_id = $envio_id";

$conn->exec($sqlUPDATE);

$sqlEnvio = "SELECT * FROM envios WHERE envio_id = $envio_id";
$stmtEnvio = $conn->query($sqlEnvio);
$rowEnvio = $stmtEnvio->fetch();

$sqlDptos = "SELECT id_empresa, nombre FROM paqueteria WHERE id_empresa = '$id_empresa'";
$stmt2 = $conn->query($sqlDptos);
$rows2 = $stmt2->fetchAll();

if (empty($rows2)) {
    $result2 = "No se encontró esa paqueteria !!";
} else {
    foreach ($rows2 as $row2) {
        $Nombre = $row2['nombre'];
    }
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Envíos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="row mb-3 text-center">
        <div class="col-12">
            <h2 class="display-4">Licenciatura en Tecnologías de la Información</h2>
            <p>Programación web</p>
            <p>Marian Ochoa Estrella</p>
            <h3>Datos del Envío Actualizados Correctamente</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4>Envío Actualizado Satisfactoriamente</h4>
                </div>
                <div class="card-body">
                    <fieldset>
                        <div class="mb-3">
                            <label><b>Paquetería:</b></label>
                            <p><?php echo ($Nombre); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>ID del Envío:</b></label>
                            <p><?php echo ($rowEnvio['envio_id']); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Fecha de Envío:</b></label>
                            <p><?php echo ($rowEnvio['f_envio']); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Destino:</b></label>
                            <p><?php echo ($rowEnvio['destino']); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Ciudad de Destino:</b></label>
                            <p><?php echo ($rowEnvio['ciudad_destino']); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Estado:</b></label>
                            <p><?php echo ($rowEnvio['estado']); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Costo:</b></label>
                            <p>$<?php echo number_format($rowEnvio['costo'], 2); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Remitente:</b></label>
                            <p><?php echo ($rowEnvio['n_remitente']); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Destinatario:</b></label>
                            <p><?php echo ($rowEnvio['n_destinatario']); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Peso:</b></label>
                            <p><?php echo ($rowEnvio['peso']); ?> kg</p>
                        </div>
                    </fieldset>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="reporte_editar_relacionada_marian.php" class="btn btn-info">Regresar al reporte dee envios</a>
                        <a href="alta_relacionada_marian.php" class="btn btn-warning">Registrar un envio</a>
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
