<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Detalle de envíos</title>
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
            $paqueteria_elegida = $_GET['q'];

            $sql = "SELECT E.envio_id, E.f_envio, E.destino, E.ciudad_destino, E.estado, E.costo, E.n_remitente, E.n_destinatario, E.peso, P.nombre FROM envios E ";
            $sql2 = $sql . "INNER JOIN paqueteria P ON E.id_empresa = P.id_empresa AND E.id_empresa=";
            $sql3 = $sql2 . "'$paqueteria_elegida'";

            $result = $conn->query($sql3);

            $rows = $result->fetchAll();

            echo "<div class='table-responsive'>";
            echo "<table class='table table-striped table-bordered small-text'>";
            echo "<thead class='table-dark'>
                <tr>
                    <th>Envio ID</th>
                    <th>Fecha de Envio</th>
                    <th>Dirección</th>
                    <th>Ciudad</th>
                    <th>Estado</th>
                   
                    <th>Costo</th>
                    <th>Nombre del Remitente</th>
                    <th>Nombre del Destinatario</th>
                    <th>Peso</th>
                </tr>
              </thead>
              <tbody>";

            foreach ($rows as $row) {
                echo "<tr>";
                echo "<td>" . $row['envio_id'] . "</td>";
                echo "<td>" . $row['f_envio'] . "</td>";
                echo "<td>" . $row['destino'] . "</td>";
                echo "<td>" . $row['ciudad_destino'] . "</td>";
                echo "<td>" . $row['estado'] . "</td>";

                echo "<td>" . $row['costo'] . "</td>";
                echo "<td>" . $row['n_remitente'] . "</td>";
                echo "<td>" . $row['n_destinatario'] . "</td>";
                echo "<td>" . $row['peso'] . "</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
            echo "</div>"; // Cierra el contenedor responsivo
            
            $conn = null;
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ppp6p+bOjHRDh3cMLBjDXu4aAl/rCRNuBK+s27a5yR6ZdLgVqYhOB6KwehwoubCV"
        crossorigin="anonymous"></script>
</body>

</html>