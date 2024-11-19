<?php
session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}

require_once "conexion.php";

$id_empresa = $_GET['id'];

$sql = 'SELECT * FROM paqueteria WHERE id_empresa = :id_empresa';
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id_empresa', $id_empresa, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Paquetería</title>
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
            <h3>Detalles de la Paquetería</h3>
        </div>

        <div class="details-container">
            <table class="table">
                <tr>
                    <th>ID de la Empresa</th>
                    <td><?php echo $row['id_empresa']; ?></td>
                </tr>
                <tr>
                    <th>Nombre de la Empresa</th>
                    <td><?php echo $row['nombre']; ?></td>
                </tr>
                <tr>
                    <th>Número</th>
                    <td><?php echo $row['telefono']; ?></td>
                </tr>
                <tr>
                    <th>Sitio Web</th>
                    <td><?php echo $row['sitio_web']; ?></td>
                </tr>
                <tr>
                    <th>Oficinas Centrales</th>
                    <td><?php echo $row['oficinas_c']; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td><?php echo $row['direccion']; ?></td>
                </tr>
                <tr>
                    <th>Ciudad</th>
                    <td><?php echo $row['ciudad']; ?></td>
                </tr>
                <tr>
                    <th>CP</th>
                    <td><?php echo $row['cp']; ?></td>
                </tr>
            </table>
        </div>

       
        <a href="menu_marian.php" class="btn btn-warning btn-custom">Regresar al Menu</a>
        <a href="reporte_catalogo_marian.php" class="btn btn-primary btn-custom">Volver a la lista de paqueterias</a>
    </div>
</body>
</html>
