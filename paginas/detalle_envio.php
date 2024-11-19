<?php
session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ../index.php");
    exit;
}
require_once "conexion.php";

// Obtenemos el ID del envío de la URL
$envio_id = isset($_GET['id']) ? $_GET['id'] : null;

// Verificamos si el ID está presente
if ($envio_id) {
    // Consultamos todos los detalles de ese envío
    $sql = 'SELECT E.*, P.nombre AS paqueteria_nombre FROM envios E ';
    $sql .= 'INNER JOIN paqueteria P ON E.id_empresa = P.id_empresa WHERE E.envio_id = :envio_id';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':envio_id', $envio_id);
    $stmt->execute();
    $envio = $stmt->fetch();

    if (!$envio) {
        die("Envío no encontrado.");
    }
} else {
    die("ID de envío no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Envío</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
        }

        .header-row {
            background-color: #343a40;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
        }

        .details-container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        table th, table td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table td {
            background-color: #f8f9fa;
        }

        .btn-custom {
            width: 200px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header-row">
            <h3>Detalles del Envío</h3>
        </div>

        <div class="details-container">
            <table class="table">
                <tr>
                    <th>Envío ID</th>
                    <td><?php echo $envio['envio_id']; ?></td>
                </tr>
                <tr>
                    <th>Fecha de Envío</th>
                    <td><?php echo $envio['f_envio']; ?></td>
                </tr>
                <tr>
                    <th>Remitente</th>
                    <td><?php echo $envio['n_remitente']; ?></td>
                </tr>
                <tr>
                    <th>Destinatario</th>
                    <td><?php echo $envio['n_destinatario']; ?></td>
                </tr>
                <tr>
                    <th>Destino</th>
                    <td><?php echo $envio['destino']; ?></td>
                </tr>
                <tr>
                    <th>Ciudad de Destino</th>
                    <td><?php echo $envio['ciudad_destino']; ?></td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td><?php echo $envio['estado']; ?></td>
                </tr>
                <tr>
                    <th>Costo</th>
                    <td><?php echo $envio['costo']; ?></td>
                </tr>
                <tr>
                    <th>Peso</th>
                    <td><?php echo $envio['peso']; ?> kg</td>
                </tr>
                <tr>
                    <th>Paquetería</th>
                    <td><?php echo $envio['paqueteria_nombre']; ?></td>
                </tr>
            </table>
        </div>

        <!-- Botones -->
        <a href="menu_marian.php" class="btn btn-warning btn-custom">Regresar al Menu</a>
        <a href="reporte_relacionada_marian.php" class="btn btn-primary btn-custom">Volver a la lista de envíos</a>
    </div>

</body>

</html>
