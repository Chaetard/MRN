<?php

require_once "conexion.php";


$sql = 'SELECT E.envio_id, E.f_envio, E.destino, E.ciudad_destino, E.estado, E.costo, E.n_remitente, E.n_destinatario, E.peso, P.nombre FROM envios E ';
$sql2 = $sql . 'INNER JOIN paqueteria P ON E.id_empresa = P.id_empresa';


$result = $conn->query($sql2);
$rows = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de registros</title>
</head>

<body class="bg-success">

    <div class="container">
        <div class="row bg-white m-2">
            <div class="col-md-4">Licenciatura en Tecnologías de la Información</div>
            <div class="col-md-4">Programación web</div>
            <div class="col-md-4">Reporte de registros de una tabla para ser ACTUALIZADOS en línea (PHP con PDP y MySQL)
            </div>
        </div>

        <div class="row">
            <a href="alta_tabla_mariam.php" class="btn btn-info w-100 m-2">Agregar otro Envio</a>
            <table class="bg-white m-2">
                <thead>
                    <tr>
                        <th>Id Envio</th>
                        <th>Paqueteria</th>
                        <th>Fecha de Envio</th>
                        <th>Destino</th>
                        <th>Ciudad de destino</th>
                        <th>Estado</th>
                        <th>Costo</th>
                        <th>Nombre del remitente</th>
                        <th>Nombre del destinatario</th>
                        <th>Peso</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['envio_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                            <td><?php echo $row['f_envio']; ?></td>
                            <td><?php echo $row['destino']; ?> </td>
                            <td><?php echo $row['ciudad_destino']; ?></td>
                            <td><?php echo $row['estado']; ?></td>
                            <td><?php echo $row['costo']; ?></td>
                            <td><?php echo $row['n_remitente']; ?></td>
                            <td><?php echo $row['n_destinatario']; ?></td>
                            <td><?php echo $row['peso']; ?></td>

                            <td><a href="eliminar_relacionada_marian.php?id=<?php echo $row['envio_id']; ?>"
                                    class="btn btn-danger">
                                    Eliminar
                                </a>
                            </td>

                            <td><a href="editar_relacionada_marian.php?id=<?php echo $row['envio_id']; ?>"
                                    class="btn btn-info">
                                    Editar
                                </a>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>

            <div class="row d-flex center">
                <div class="col-8 bg-dark" style="color:white;">
                    <h1>Marian Ochoa Estrella</h1>
                </div>
            </div>



        </div>

    </div>
    <?php
    $conn = null;
    ?>
</body>

</html>