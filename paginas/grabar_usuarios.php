<?php
session_start();
require_once "conexion.php";

if (isset($_SESSION["validado"])) {
	if ($_SESSION["validado"] != "true") {
		header("Location: ../index.php");
		exit;
	}
} else {
	header("Location: ../index.php");
	exit;
}

$numero = $_POST["numero_usuario"];
$nombre = strtoupper(trim($_POST["nombre_usuario"])); //Se convierte a MAYUSCULAS
$contrasena = $_POST["contra"];
$Tipo_U = $_POST["tipoU"];

$sql = "SELECT * FROM usuarios WHERE id_usuario='$numero'";
$result = $conn->query($sql);
$rows = $result->fetchAll();

if (empty($rows)) {


	$sqlINSERT1 = "INSERT INTO usuarios(id_usuario, usuario, clave, tipousuario) ";
	$sqlINSERT2 = $sqlINSERT1 . "VALUES ('$numero', '$nombre', '$contrasena', '$Tipo_U')";


	$conn->exec($sqlINSERT2);
	$mensaje = "USUARIO REGISTRADO SATISFACTORIAMENTE";

} else {


	$mensaje = "Ese numero de usuario ya existe en la base de datos";

	$nombre = "";
	$numero = "";
	$contrasena = "";
	$Tipo_U = "";
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu Principal</title>

	<!-- Estilos y Frameworks -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.min.css">


	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/menu.css">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
		crossorigin="anonymous"></script>
</head>

<body class="">

	


		<div id="contenedorPrincipal" class="container-fluid animate__animated animate__fadeInLeft">

			<div class="tablas">

				<!-- Ingresa Aqui -->
				<legend>
					<?php echo $mensaje; ?>
				</legend>
				<div>
					<br />
					<b>ID:</b>
					<?php echo ($numero); ?>
					<br />
					<br />
					<b>Nombre del usuario:</b>
					<?php echo ($nombre); ?>
					<br />
					<br />
					<b>Contraseña:</b>
					<?php echo ($contrasena); ?>
					<br />
					<br />
					<b>Tipo de usuario:</b>
					<?php echo ($Tipo_U); ?>
					<br />
					<br />
					<a href="alta_usuarios.php">grabar otro usuario</a>
					<br />
					<br />
					<a href="reporte_usuarios.php">ver reporte de usuarios</a>
					<br />
					<br />
					
				</div>
				<!-- Termina Aqui -->
			</div>

		</div>

		<?php
		$conn = null;
		?>

	</main>


	

	<!-- se coloca el script debajo del body para poder cargar de manera correcta el dom, por alguna extraña razon no
	funciona si se coloca con el link de js -->


	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>


</body>

</html>