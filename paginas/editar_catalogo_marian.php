<?php

require_once "conexion.php";
$id_empresa = $_GET["id"];
$id_empresa = trim($id_empresa);
$sql = "SELECT * FROM paqueteria WHERE id_empresa='$id_empresa'";
$result = $conn->query($sql);
$rows = $result->fetchAll();
if (empty($rows)) {
    $result = "No se encontraron empresas con esa información !!";
    header("Location: reporte_editar_catalog_marian.php");
    exit;
}
?>

<html>

<head>
    <meta charset="utf-8">
    <title>Regitro de Facturas desde PHP hacia MySQL</title>

    <script>
        function ValidaFormulario1() {
            var id_empresa = document.getElementById("txt_id_empresa").value;
            var nombre_empresa = document.getElementById("txt_nombre_empresa").value;
            var numero = document.getElementById("txt_telefono_empresa").value;
            var sitio_web = document.getElementById("txt_sitio_web").value;
            var oficinas_c = document.getElementById("txt_oficinas_c").value;
            var email = document.getElementById("txt_email_empresa").value;
            var direccion = document.getElementById("txt_direccion_empresa").value;
            var ciudad = document.getElementById("txt_ciudad_empresa").value;
            var cp = document.getElementById("txt_cp").value;

            if (id_empresa == null || id_empresa.length === 0 || /^\s+$/.test(id_empresa)) {
                alert("Debes escribir la CLAVE de la factura usando solo números");
                document.getElementById("txt_id_empresa").style.background = 'lightgreen';
                document.getElementById("txt_id_empresa").focus();
                return false;
            } else if (nombre_empresa == null || nombre_empresa.length === 0 || /^\s+$/.test(nombre_empresa)) {
                alert("Debes escribir el nombre de la empresa");
                document.getElementById("txt_nombre_empresa").style.background = 'lightgreen';
                document.getElementById("txt_nombre_empresa").focus();
                return false;
            }   else if (numero == null || numero.length === 0 || isNaN(numero)) {
                alert("Debes ingresar un numero de telefono válido");
                document.getElementById("txt_telefono_empresa").style.background = 'lightgreen';
                document.getElementById("txt_telefono_empresa").focus();
                return false;
            } else if (sitio_web == null || sitio_web.length === 0 || /^\s+$/.test(sitio_web)) {
                alert("Debes escribir el sitio web de la empresa");
                document.getElementById("txt_sitio_web").style.background = 'lightgreen';
                document.getElementById("txt_sitio_web").focus();
                return false;
            } else if (oficinas_c == null || oficinas_c == 0 || oficinas_c.length === 0 || /^\s+$/.test(oficinas_c)) {
                alert("Debes ingresar el estado");
                document.getElementById("txt_oficinas_c").style.background = 'lightgreen';
                document.getElementById("txt_oficinas_c").focus();
                return false;
            } else if (email == null || email.length === 0 || /^\s+$/.test(email)) {
                alert("Debes escribir el email de la empresa");
                document.getElementById("txt_email_empresa").style.background = 'lightgreen';
                document.getElementById("txt_email_empresa").focus();
                return false;
            } else if (direccion == null || direccion.length === 0 || /^\s+$/.test(direccion)) {
                alert("Debes escribir la dirección de la empresa");
                document.getElementById("txt_direccion_empresa").style.background = 'lightgreen';
                document.getElementById("txt_direccion_empresa").focus();
                return false;
            } else if (ciudad == null || ciudad.length === 0 || /^\s+$/.test(ciudad)) {
                alert("Debes escribir la ciudad de la empresa");
                document.getElementById("txt_ciudad_empresa").style.background = 'lightgreen';
                document.getElementById("txt_ciudad_empresa").focus();
                return false;
            } else if (cp == null || cp.length === 0 || isNaN(cp)) {
                alert("Debes ingresar un código postal válido");
                document.getElementById("txt_cp").style.background = 'lightgreen';
                document.getElementById("txt_cp").focus();
                return false;
            }

            return true;
        }

    </script>
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


        <form action="actualizar_catalogo_marian.php" method="post" id="formulario1"
            onsubmit="return ValidaFormulario1();">
            <?php
            foreach ($rows as $row) {
                ?>
                
                
                  <div class="row"><input type="hidden" name="txt_id_empresa_oculto" id="txt_id_empresa_oculto" size="10" maxlength="2"
                        value="<?php echo $row['id_empresa']; ?>" />


                        <input type="hidden" name="txt_nombre_empresa_oculto" id="txt_nombre_empresa_oculto" size="40" maxlength="50"  
                            class="w-100" value="<?php echo $row['nombre']; ?>"  </div>
                         

                <div class="row">
                        
                        
                        
                        

                    <div class="col-4 mt-3">
                        ID de la Empresa:
                    </div>
                    <div class="col-8">
                        <input type="text" class=" w-100" name="txt_id_empresa" id="txt_id_empresa" maxlength="5" disabled
                            value="<?php echo $row['id_empresa']; ?>" />
                    </div>
                        
                    
                    

                    <div class="col-4 mt-3">Nombre de la empresa:</div>
                        
                        
                        
                        
                        
                        
                    <div class="col-8">
                        <input type="text" name="txt_nombre_empresa" id="txt_nombre_empresa" size="40" maxlength="50" disabled
                            class="w-100" value="<?php echo $row['nombre']; ?>" />
                    </div>

                    <div class="col-4 mt-3">Número:</div>
                    <div class="col-8">
                        <input type="text" name="txt_telefono_empresa" id="txt_telefono_empresa" size="40" maxlength="50"
                            class="w-100" value="<?php echo $row['telefono']; ?>" />
                    </div>

                    <div class="col-4 mt-3">Sitio web:</div>
                    <div class="col-8">
                        <input type="text" name="txt_sitio_web" id="txt_sitio_web" size="40" maxlength="50" class="w-100"
                            value="<?php echo $row['sitio_web']; ?>" />
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
                        <input type="text" name="txt_direccion_empresa" id="txt_direccion_empresa" size="40" maxlength="50"
                            class="w-100" value="<?php echo $row['direccion']; ?>" />
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