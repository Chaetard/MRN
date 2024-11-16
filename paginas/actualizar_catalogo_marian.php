<?php

session_start();
if ($_SESSION["validado"] != "true") {


    header("Location: ../index.php");
    exit;

}


require_once "conexion.php";

$id_empresa = $_POST["txt_id_empresa_oculto"];
$nombre = strtoupper(trim($_POST["txt_nombre_empresa_oculto"]));
$telefono = (int) $_POST["txt_telefono_empresa"];
$sitio_web = strtoupper(trim($_POST["txt_sitio_web"]));
$oficinas_c = $_POST["txt_oficinas_c"];
$email = strtoupper(trim($_POST["txt_email_empresa"]));
$direccion = strtoupper(trim($_POST["txt_direccion_empresa"]));
$ciudad = strtoupper(trim($_POST["txt_ciudad_empresa"]));
$cp = (int) $_POST["txt_cp"];
$sqlUPDATE = "UPDATE paqueteria SET nombre = '$nombre', telefono = $telefono, sitio_web = '$sitio_web', oficinas_c = '$oficinas_c', email = '$email', direccion = '$direccion', ciudad = '$ciudad', cp = '$cp' WHERE id_empresa = $id_empresa";
$conn->exec($sqlUPDATE);
$mensaje = "Factura Actualizada Correctamente ";
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de Empresa</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <div class="row mb-3 text-center">
        <div class="col-12">
            <h2 class="display-4">Licenciatura en Tecnologías de la Información</h2>
            <p>Programación web</p>
			<p>Marian Ochoa Estrella</p>
            <h3>Datos de la Empresa Actualizados Correctamente</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <h4>Empresa Actualizada Satisfactoriamente</h4>
                </div>
                <div class="card-body">
                    <fieldset>
                        <div class="mb-3">
                            <label><b>ID de la Empresa:</b></label>
                            <p><?php echo ($id_empresa); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Nombre de la Empresa:</b></label>
                            <p><?php echo ($nombre); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Teléfono:</b></label>
                            <p><?php echo ($telefono); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Sitio Web:</b></label>
                            <p><?php echo ($sitio_web); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Oficinas Centrales:</b></label>
                            <p><?php echo ($oficinas_c); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Email:</b></label>
                            <p><?php echo ($email); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Dirección:</b></label>
                            <p><?php echo ($direccion); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Ciudad:</b></label>
                            <p><?php echo ($ciudad); ?></p>
                        </div>
                        <div class="mb-3">
                            <label><b>Código Postal:</b></label>
                            <p><?php echo ($cp); ?></p>
                        </div>
                    </fieldset>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="reporte_editar_catalogo_marian.php" class="btn btn-info">Regresar al reporte paquetería</a>
                        <a href="alta_tabla_marian.php" class="btn btn-warning">Registrar otra paquetería</a>
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
