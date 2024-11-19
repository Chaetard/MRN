<?php
session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}
require_once "conexion.php";

$sql = 'SELECT id_empresa, nombre, sitio_web, oficinas_c FROM paqueteria';
$result = $conn->query($sql);
$rows = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Paqueterias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            font-size: 0.875rem;
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

        .table-container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        .btn-add-shipment {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1.1rem;
            padding: 12px 30px;
            margin: 20px 0;
            width: 100%;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-add-shipment:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            font-size: 0.8rem;
        }

        table th,
        table td {
            padding: 10px;
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

        .footer {
            text-align: center;
            color: #6c757d;
            margin-top: 30px;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="header-row">
            <div class="row">
                <div class="col-md-4">Licenciatura en Tecnologías de la Información</div>
                <div class="col-md-4">Programación Web</div>
                <div class="col-md-4">Lista de Paqueterias</div>
            </div>
        </div>

        <div class="table-container">
            <div class="title">Lista de Paqueterias Registradas</div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Id Envío</th>
                            <th>Fecha de Envío</th>
                            <th>Nombre del Remitente</th>
                            <th>Paquetería</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                            ?>
                            <tr>
                            <td><?php echo $row['id_empresa']; ?></td>
                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                               
                                <td>
                                    <a href="http://<?php echo $row['sitio_web']; ?>" target="_blank" class="btn btn-secondary">
                                        Enlace
                                    </a>
                                </td>
                                <td><?php echo $row['oficinas_c']; ?></td>
                               
                                <td>
                                    <a href="detalle_paqueteria.php?id=<?php echo $row['id_empresa']; ?>" class="btn btn-info">
                                        Ver más detalles
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <a href="menu_marian.php" class="btn btn-warning mt-3">Regresar al Menu</a>
        </div>

        <div class="footer">
            <p>Marian Ochoa Estrella</p>
        </div>

    </div>

</body>

</html>