<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Detalle de paqueteria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6KwehwoubCV" crossorigin="anonymous">
    <style>
        .table-wrapper {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .table {
            margin-bottom: 0;
        }

        .small-text td,
        .small-text th {
            font-size: 0.85rem;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="table-wrapper">
            <?php
            require_once "conexion.php";
            $envio_elegido = $_GET['q'];

            $sql = "SELECT P.id_empresa, P.nombre, P.telefono, P.sitio_web, P.oficinas_c, P.email, P.direccion, P.ciudad, P.cp  
                    FROM paqueteria P 
                    INNER JOIN envios E ON E.id_empresa = P.id_empresa AND E.envio_id = ";
            $sql3 = $sql . "'$envio_elegido'";

            $result = $conn->query($sql3);

            $rows = $result->fetchAll();

            echo "<div class='table-responsive'>";
            echo "<table class='table table-striped table-bordered small-text'>";
            echo "<thead class='table-dark'>
                <tr>
                    <th>ID Empresa</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Sitio Web</th>
                    <th>Oficinas Centrales</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Código Postal</th>
                </tr>
              </thead>
              <tbody>";

            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row['id_empresa'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['telefono'] . "</td>";
                echo "<td>" . $row['sitio_web'] . "</td>";
                echo "<td>" . $row['oficinas_c'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['direccion'] . "</td>";
                echo "<td>" . $row['ciudad'] . "</td>";
                echo "<td>" . $row['cp'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            echo "</div>"; 

            $conn = null;
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ppp6p+bOjHRDh3cMLBjDXu4aAl/rCRNuBK+s27a5yR6ZdLgVqYhOB6KwehwoubCV"
        crossorigin="anonymous"></script>
</body>


</html>