<?php
session_start();
if (!isset($_SESSION["validado"]) || $_SESSION["validado"] != "true") {
    header("Location: ./login.php");
    exit;
}
require_once "conexion.php";
$sql = 'SELECT * from paqueteria ;';
$result = $conn->query($sql);
$rows = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Registros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            font-size: 0.7rem;
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

        .btn-add-company {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 1rem;
            padding: 12px 30px;
            margin: 20px 0;
            width: 100%;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .btn-add-company:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th,
        table td {
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

        table td a {
            text-decoration: none;
            color: white;
        }

        table td a.btn {
            width: 100%;
        }

        .btn-info,
        .btn-danger,
        .btn-success {
            font-size: 0.8rem;
            padding: 6px 15px;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-info:hover {
            background-color: #138496;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        .title {
            font-size: 1.3rem;
            font-weight: bold;
            color: #495057;
            margin-bottom: 20px;
        }

        .footer {
            text-align: center;
            color: #6c757d;
            margin-top: 30px;
        }

        .footer p {
            font-size: 0.9rem;
            margin: 0;
        }

        .table-responsive {
            overflow-x: auto;
        }


        @media (max-width: 768px) {

            table th,
            table td {
                font-size: 0.75rem;
            }

            .btn-add-company {
                font-size: 0.9rem;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

    <div class="container">


        <div class="header-row">
            <div class="row">
                <div class="col-md-4">Licenciatura en Tecnologías de la Información</div>
                <div class="col-md-4">Programación Web</div>
                <div class="col-md-4">Reporte de registros de una tabla para ser ACTUALIZADOS en línea (PHP con PDP y
                    MySQL)</div>
            </div>
        </div>


        <a href="alta_tabla_marian.php" class="btn btn-add-company">Agregar otra Empresa</a>


        <div class="table-container">
            <div class="title">Lista de Empresas Registradas</div>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Id Empresa</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>Sitio web</th>
                            <th>Oficinas Centrales</th>
                            <th>Email</th>
                            <th>Direccion</th>
                            <th>Ciudad</th>
                            <th>Cp</th>
                            <th>Eliminar</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rows as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row['id_empresa']; ?></td>
                                <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td>
                                    <a href="http://<?php echo $row['sitio_web']; ?>" target="_blank"
                                        class="btn btn-secondary">
                                        Enlace
                                    </a>
                                </td>
                                <td><?php echo $row['oficinas_c']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['ciudad']; ?></td>
                                <td><?php echo $row['cp']; ?></td>
                                <td>
                                    <a href="eliminar_catalogo_marian.php?id=<?php echo $row['id_empresa']; ?>"
                                        onclick="return borrar_empresa(<?php echo $row['id_empresa']; ?>);"
                                        class="btn btn-danger">
                                        Eliminar
                                    </a>
                                </td>
                                <td>
                                    <a href="editar_catalogo_marian.php?id=<?php echo $row['id_empresa']; ?>"
                                        class="btn btn-success">
                                        Editar
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

    <script>
        function borrar_empresa(id_empresa) {
            console.log("Intentando eliminar la paquetería con ID:", id_empresa);
            return confirm("¿Estás seguro de eliminar la Paqueteria No: " + id_empresa + "?");
        }
    </script>

</body>

</html>