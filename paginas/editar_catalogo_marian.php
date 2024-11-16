<?php

session_start();
if ($_SESSION["validado"] != "true") {


    header("Location: ../index.php");
    exit;

}


require_once "conexion.php";

$id_empresa = $_GET["id"];
$id_empresa = trim($id_empresa);
$sql = "SELECT * FROM paqueteria WHERE id_empresa='$id_empresa'";
$result = $conn->query($sql);
$rows = $result->fetchAll();
if (empty($rows)) {
    $result = "No se encontraron empresas con esa información !!";
    header("Location: reporte_editar_catalogo_marian.php");
    exit;
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Regitro de Facturas desde PHP hacia MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="../javascript/editar_catalogo_marian.js"></script>
</head>

<body>

    <div class="container">

        <div class="row">
            <div class="col-4 mt-3">Licenciatura en Tecnologías de la Información</div>
            <div class="col-4 mt-3">Programación web</div>
            <div class="col-4 mt-3">Formulario para modificar departamentos en la base de datos desde una página web
            </div>
        </div>





        <h1>Actualizar una empresa</h1>


        <form action="actualizar_catalogo_marian.php" method="post" id="formulario1" onsubmit="return ValidarDatos();">
            <?php
            foreach ($rows as $row) {
                ?>


                <div class="row"><input type="hidden" name="txt_id_empresa_oculto" id="txt_id_empresa_oculto" size="10"
                        maxlength="2" value="<?php echo $row['id_empresa']; ?>" />


                    <input type="hidden" name="txt_nombre_empresa_oculto" id="txt_nombre_empresa_oculto" size="40"
                        maxlength="50" class="w-100" value="<?php echo $row['nombre']; ?>" </div>


                    <div class="row">





                        <div class="col-4 mt-3">
                            ID de la Empresa:
                        </div>
                        <div class="col-8">
                            <input type="text" class=" w-100" name="txt_id_empresa" id="txt_id_empresa" maxlength="5"
                                disabled value="<?php echo $row['id_empresa']; ?>" />
                        </div>




                        <div class="col-4 mt-3">Nombre de la empresa:</div>






                        <div class="col-8">
                            <input type="text" name="txt_nombre_empresa" id="txt_nombre_empresa" size="40" maxlength="50"
                                disabled class="w-100" value="<?php echo $row['nombre']; ?>" />
                        </div>

                        <div class="col-4 mt-3">Número:</div>
                        <div class="col-8">
                            <input type="text" name="txt_telefono_empresa" id="txt_telefono_empresa" size="40"
                                maxlength="50" class="w-100" value="<?php echo $row['telefono']; ?>" />
                        </div>

                        <div class="col-4 mt-3">Sitio web:</div>
                        <div class="col-8">
                            <input type="text" name="txt_sitio_web" id="txt_sitio_web" size="40" maxlength="50"
                                class="w-100" value="<?php echo $row['sitio_web']; ?>" />
                        </div>

                        <div class="col-4 mt-3">Oficinas Centrales:</div>
                        <div class="col-8">
                            <select id="txt_oficinas_c" name="txt_oficinas_c" class="w-100">
                                <option value="0">--Seleccione un Estado--</option>
                                <option value="CDMX">CDMX</option>
                                <option value="DURANGO">Durango</option>
                                <option value="JALISCO">Jalisco</option>
                                <option value="PUEBLA">Puebla</option>
                                <option value="SONORA">Sonora</option>
                            </select>
                        </div>

                        <div class="col-4 mt-3">Email:</div>
                        <div class="col-8">
                            <input type="text" name="txt_email_empresa" id="txt_email_empresa" size="40" maxlength="50"
                                class="w-100" value="<?php echo $row['email']; ?>" />
                        </div>

                        <div class="col-4 mt-3">Dirección:</div>
                        <div class="col-8">
                            <input type="text" name="txt_direccion_empresa" id="txt_direccion_empresa" size="40"
                                maxlength="50" class="w-100" value="<?php echo $row['direccion']; ?>" />
                        </div>

                        <div class="col-4 mt-3">Ciudad:</div>
                        <div class="col-8">
                            <input type="text" name="txt_ciudad_empresa" id="txt_ciudad_empresa" size="40" maxlength="50"
                                class="w-100" value="<?php echo $row['ciudad']; ?>" />
                        </div>

                        <div class="col-4 mt-3">CP:</div>
                        <div class="col-8">
                            <input type="text" name="txt_cp" id="txt_cp" size="40" maxlength="11" class="w-100"
                                value="<?php echo $row['cp']; ?>" />
                        </div>


                    <?php } ?>

                    <br>
                    <br>

                    <input type="submit" class="btn btn-success m-2 col-4" name="AddEmpresa" id="AddEmpresa"
                        value="  Actualizar esta empresa " />

                </div>
        </form>

    </div>






</body>


</html>