<?php

require_once "conexion.php";
$sql = 'SELECT * from paqueteria ;';
$result = $conn->query($sql);
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
            <a href="alta_tabla_mariam.php" class="btn btn-info w-100 m-2">Agregar otra Empresa</a>
            <table class="bg-white m-2">
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
                                    class="btn btn-secondary w-100">
                                    Enlace</a>
                            </td>
                            <td><?php echo $row['oficinas_c']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['direccion']; ?></td>
                            <td><?php echo $row['ciudad']; ?></td>
                            <td><?php echo $row['cp']; ?></td>

                            <td><a href="eliminar_catalogo_marian.php?id=<?php echo $row['id_empresa']; ?>"
                                    class="btn btn-danger">
                                    eliminar
                                </a>
                            </td>

                            <td><a href="editar_catalogo_marian.php?id=<?php echo $row['id_empresa']; ?>"
                                    class="btn btn-success">
                                    editar
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