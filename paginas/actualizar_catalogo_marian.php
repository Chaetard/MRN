<?php
require_once "conexion.php";
$id_empresa = $_POST["txt_id_empresa_oculto"];
$nombre = strtoupper(trim($_POST["txt_nombre_empresa"]));
$telefono = (int) $_POST["txt_telefono_empresa"];
$sitio_web = strtoupper(trim($_POST["txt_sitio_web"]));
$oficinas_c = $_POST["txt_oficinas_c"];
$email = strtoupper(trim($_POST["txt_email_empresa"]));
$direccion = strtoupper(trim($_POST["txt_direccion_empresa"]));
$ciudad = strtoupper(trim($_POST["txt_ciudad_empresa"]));
$cp = (int) $_POST["txt_cp"];
$sqlUPDATE = "UPDATE paqueteria  SET nombre = '$nombre',telefono  = $telefono, sitio_web = '$sitio_web', oficinas_c = '$oficinas_c', email = '$email', direccion = '$direccion', ciudad = '$ciudad', cp = '$cp'  WHERE id_empresa=$id_empresa";
$conn->exec($sqlUPDATE);
$mensaje = "Factura Actualizada Correctamente ";
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Actualización de departamentos desde PHP hacia MySQL</title>



</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-4 mt-2">Licenciatura en Tecnologías de la Información</div>
			<div class="col-4 mt-2">Programación web</div>
			<div class="col-4 mt-2">Formulario para modificar departamentos en la base de datos desde una página web
			</div>
		</div>

		<div class="row">

			<div class="col-12 bg-success">

				<h1>
					<?php echo ($mensaje); ?>
				</h1>
			</div>

		</div>
		<div class="row mt-2 p-3 ">


			<div class="row">
				<div class="col-4"><b>Id de la Factura:</b></div>
				<div class="col-8"><?php echo ($id_empresa); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Nombre de la Empresa:</b></div>
				<div class="col-8"><?php echo ($nombre); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Telefono:</b></div>
				<div class="col-8"><?php echo ($telefono); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Sitio web:</b></div>
				<div class="col-8"><?php echo ($sitio_web); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Oficinas Centrales:</b></div>
				<div class="col-8"><?php echo ($oficinas_c); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Email:</b></div>
				<div class="col-8"><?php echo ($email); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Dirección:</b></div>
				<div class="col-8"><?php echo ($direccion); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Ciudad:</b></div>
				<div class="col-8"><?php echo ($ciudad); ?></div>
			</div>

			<div class="row">
				<div class="col-4"><b>Código Postal:</b></div>
				<div class="col-8"><?php echo ($cp); ?></div>
			</div>





			<a href="reporte_editar_catalogo_marian.php" class="col-4 m-1 mt-5 btn btn-info">Regresar al reporte paqueteria </a>


			<a href="alta_tabla_marian.php" class="col-4 mt-5 m-1 btn btn-warning" >Registrar otra paqueteria</a>


		</div>



	</div>
	<?php

	$conn = null;
	?>
</body>

</html>