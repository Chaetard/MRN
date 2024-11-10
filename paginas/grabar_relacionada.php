<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $envio_id = $_POST['txt_envio_id'];
    $id_empresa = $_POST['combo_departamento'];
    $f_envio = $_POST['f_envio'];
    $destino = $_POST['destino'];
    $ciudad_destino = $_POST['ciudad_destino'];
    $estado = $_POST['estado'];
    $costo = $_POST['costo'];
    $n_remitente = $_POST['n_remitente'];
    $n_destinatario = $_POST['n_destinatario'];
    $peso = $_POST['peso'];

    $stmt = $conn->prepare("SELECT COUNT(*) FROM envios WHERE envio_id = ?");
    $stmt->execute([$envio_id]);
    
    $existe = $stmt->fetchColumn();

    if ($existe > 0) {
        echo "<script>document.getElementById('message').innerHTML = 'Error: Ya existe un registro con este ID de Envío.'; document.getElementById('message').className = 'message error'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
    } else {
        // Preparar la consulta SQL para inserción
        $stmt = $conn->prepare("INSERT INTO envios (envio_id, id_empresa, f_envio, destino, ciudad_destino, estado, costo, n_remitente, n_destinatario, peso) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Ejecutar la consulta con los valores
        if ($stmt->execute([$envio_id, $id_empresa, $f_envio, $destino, $ciudad_destino, $estado, $costo, $n_remitente, $n_destinatario, $peso])) {
            echo "<script>document.getElementById('message').innerHTML = 'Nuevo envío registrado exitosamente'; document.getElementById('message').className = 'message success'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
        } else {
            echo "<script>document.getElementById('message').innerHTML = 'Error al registrar el envío.'; document.getElementById('message').className = 'message error'; document.getElementById('message').style.display = 'block'; setTimeout(() => { document.getElementById('message').style.display = 'none'; }, 3000);</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Envíos</title>
    <link href="../css/estilo_formulario.css" rel="stylesheet" type="text/css" media="screen"> 
    <script src="../javascript/validacion.js" defer></script>
</head>
<body>
    <div id="message" class="message" style="display: none;"></div>
    <div class="form-container">
        <h1>Datos del Envío Registrado</h1>
        <fieldset style="width: 90%;">
            <div>
                <br />
                    <b>Envio ID:</b> <?php echo htmlspecialchars($envio_id); ?>
                <br />
                <br />
                    <b>Empresa ID:</b> <?php echo htmlspecialchars($id_empresa); ?>
                <br />
                <br />
                    <b>Fecha de Envío:</b> <?php echo htmlspecialchars($f_envio); ?>
                <br />
                <br />
                    <b>Destino:</b> <?php echo htmlspecialchars($destino); ?>
                <br />
                <br />
                    <b>Ciudad Destino:</b> <?php echo htmlspecialchars($ciudad_destino); ?>
                <br />
                <br />
                    <b>Estado:</b> <?php echo htmlspecialchars($estado); ?>
                <br />
                <br />
                    <b>Costo:</b> <?php echo htmlspecialchars($costo); ?>
                <br />
                <br />
                    <b>Remitente:</b> <?php echo htmlspecialchars($n_remitente); ?>
                <br />
                <br />
                    <b>Destinatario:</b> <?php echo htmlspecialchars($n_destinatario); ?>
                <br />
                <br />
                    <b>Peso (kg):</b> <?php echo htmlspecialchars($peso); ?>
                <br />
                    <a href="grabar_relacionada.php">Registrar otro envío</a>
                <br />
                <br />
                    <a href="reporte_editar_relacionada_marian.php">Ver todos los envíos</a>
            </div>
        </fieldset>
        <h3>Marian Ochoa Estrella / Programación Web</h3>
    </div>
    
    <?php
        // Cerramos la conexión a la base de datos
        $conn = null;
    ?>

</body>
</html>
