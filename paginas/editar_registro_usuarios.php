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

$idEmpresa = $_GET["id"];

$idEmpresa = trim($idEmpresa);


$sql = "SELECT * FROM usuarios WHERE id_usuario='$idEmpresa'";


$result = $conn->query($sql);

$rows = $result->fetchAll();


if (empty($rows)) {
	$result = "No se encontro la informacion relacionada a ese id !!";
	header("Location: reporte_para_editar_usuarios.php");
	exit;
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

		<style>
        body {
            background-color: #212529;
            color: #f8f9fa;
        }

        .navbar {
            position: fixed;
            width: 100%;
            background-color: #343a40;
            margin-bottom: 20px;
        }

        .navbar .nav-link {
            color: #ffc107;
            font-weight: bold;
        }

        .navbar .nav-link:hover {
            color: #ffffff;
        }

        .sidebar {
            background-color: #343a40;
            width: 250px;
            position: fixed;
            top: 70px; 
            bottom: 0;
            left: 0;
            padding-top: 20px;
            border-right: 3px solid #ffc107;
        }

        .sidebar h2 {
            color: #ffc107;
            text-align: center;
            margin-bottom: 30px;
        }

        .list-unstyled li {
            margin-bottom: 10px;
        }

        .dropdown-menu {
            display: none;
        }

        .content-wrapper {
            margin-left: 270px; 
            padding: 20px;
        }

        .card {
            margin-top: 20px;
        }

        .card-header {
            background-color: #343a40;
            color: #ffc107;
        }

        .card-body {
            background-color: #495057;
        }

        .btn-danger {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }
        .msjc{
            margin: 10vh  0 0 20vw;
        }
    </style>
</head>

<body>

    
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./menu_marian.php">SIVICOM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="./reporte_relacionada_marian.php">Reporte de Envíos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./reporte_catalogo_marian.php">Reporte de Paquetería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ajax_catalogo_marian.php">Reporte Ajax Catalogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./ajax_relacionada_marian.php">Reporte Ajax Relacionada</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./reporte_usuarios.php">Usuarios</a>
                    </li>
                </ul>
            </div>
            <button class="btn btn-danger" onclick="location.href='../index.php'">Cerrar Sesión</button>
        </div>
    </nav>

    <!-- Menú lateral -->
    <nav class="sidebar">
        <h2>Menú</h2>
        <ul class="list-unstyled">
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Envíos
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./reporte_relacionada_marian.php">Reporte</a></li>
                    <li><a class="dropdown-item" href="./alta_relacionada_marian.php">Alta</a></li>
                    <li><a class="dropdown-item" href="./reporte_editar_relacionada_marian.php">Actualizar/Eliminar</a></li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Paqueterías
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./reporte_catalogo_marian.php">Reporte</a></li>
                    <li><a class="dropdown-item" href="./alta_tabla_marian.php">Alta</a></li>
                    <li><a class="dropdown-item" href="./reporte_editar_catalogo_marian.php">Actualizar/Eliminar</a></li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Usuarios
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./alta_usuarios.php">Altas</a></li>
                    <li><a class="dropdown-item" href="./reporte_para_eliminar_usuarios.php">Bajas</a></li>
                    <li><a class="dropdown-item" href="./reporte_para_editar_usuarios.php">Actualizaciones</a></li>
                    <li><a class="dropdown-item" href="./reporte_usuarios.php">Reporte</a></li>
                </ul>
            </li>
            <li class="menuDesplegableLi">
                <button class="btn btn-primary w-100 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Reportes Ajax
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./ajax_catalogo_marian.php">Catálogo</a></li>
                    <li><a class="dropdown-item" href="./ajax_relacionada_marian.php">Relacionada</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEmeIV1mKuiNp0D+E3j7khQ6U68m6z9A5M2jE9Wf/NqjHMR2D8ZztVVnTQujl+Xr" crossorigin="anonymous"></script>

    <script>
        // Control de los dropdowns
        document.querySelectorAll('.dropdown-toggle').forEach(function (dropdown) {
            dropdown.addEventListener('click', function (event) {
                event.preventDefault();
                document.querySelectorAll('.dropdown-menu').forEach(function (menu) {
                    menu.style.display = 'none';
                });
                const menu = dropdown.nextElementSibling;
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            });
        });

        // Cerrar dropdowns al hacer clic fuera
        window.addEventListener('click', function (e) {
            if (!e.target.matches('.dropdown-toggle')) {
                document.querySelectorAll('.dropdown-menu').forEach(function (menu) {
                    menu.style.display = 'none';
                });
            }
        });
    </script>


		<div id="contenedorPrincipal" class="container-fluid ">

			<br>
			<!-- Ingresa Aqui -->

			<?php
			foreach ($rows as $row) {

				?>

				<h2>Editar Usuario
					<?php echo $row['usuario'] ?>
				</h2>
				<form class="tablas msjc" action="actualizar_usuarios.php" method="post" id="formulario1"
				onsubmit="return ValidaFormulario1(<?php echo $row['tipousuario']; ?>);">


					<div>
						<br />
						<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
						ID usuario:
						<input type="text" name="numero_usuario" id="id_usuario" size="10" maxlength="2" disabled
							value="<?php echo $row['id_usuario']; ?>" />

						<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
						<input type="hidden" name="txt_usuario_oculto" id="txt_usuario_oculto" size="10" maxlength="2"
							value="<?php echo $row['id_usuario']; ?>" />

						<br />
						<br />
						Nombre del usuario:
						<input type="text" name="nombre_usuario" id="nom_emp" size="40" maxlength="50"
							value="<?php echo $row['usuario']; ?>" />
						<!-- Cada valor recuperado de tu tabla CATALOGO va en 1 caja de texto del formulario -->
						<br />
						<br />
						Contraseña:
						<input type="text" name="contra" id="contraseña" size="30" maxlength="40"
							value="<?php echo $row['clave']; ?>" />
						<br />
						<br />
						Tipo de usuario:<!-- Caja de Selección o ComboBox -->
						<?php
						$empresa = $row['tipousuario'];
						if ($empresa == "1") {
							$empresa1 = "1";

						} else if ($empresa == "2") {
							$empresa1 = "2";

						}

						?>
						<select name="tipoU" id="tipo_usua">
							<option value="0">-- Selecciona una Tipo --</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="<?php echo ($empresa); ?>" selected>
								<?php echo ($empresa1); ?>
							</option>
						</select>
						<br />
						<br />
						<input class="btn btn-success" type="submit" name="AddEmpresa" id="AddEmpresa"
							value="  Actualizar las columnas del usuario " />
						<br />
					</div>
				<?php } ?>
			</form>
			<!-- Termina Aqui -->


		</div>

		<?php
		$conn = null;
		?>

	</main>

	<!-- se coloca el script debajo del body para poder cargar de manera correcta el dom, por alguna extraña razon no
	funciona si se coloca con el link de js -->

	<script language="javascript">

		function ValidaFormulario1(num) {

			var numero = num;
			//Recuperamos lo escrito en la caja de texto del Nombre:
			var valorId = document.getElementById("id_usuario").value;
			var Nombre_em = document.getElementById("nom_emp").value;
			var Contra = document.getElementById("contraseña").value;
			var Tipo = document.getElementById("tipo_usua").value;

			//VALIDACIONES *****************************************************************
			//Caja de Texto ****************************************************************
			if (valorId == null || valorId.length == 0 || !/^([0-9])*$/.test(valorId))//checha que sean numeros
			{
				alert("Debes escribir un numero para el usuario");
				document.getElementById("id_usuario").focus();
				return false;
			} else if (Nombre_em == null || Nombre_em.length == 0 || /^\s+$/.test(Nombre_em))//checa que solo contenga letras
			{
				alert("Debes escribir el nombre del usuario");
				document.getElementById("nom_emp").focus();
				return false;
			} else if (Contra == null || Contra.length == 0 || !/^([0-9])*$/.test(Contra)) {
				alert("Debes escribir la contraseña del usuario mediante numeros ");
				document.getElementById("contraseña").focus();
				return false;
			} else if (Tipo == null || Tipo == 00) {
				alert("Debes elegir el tipo de usuario en la caja de seleccion");
				document.getElementById("tipo_usua").focus();
				return false;
			} else if (numero != 1) {
				alert("Usted No puede Registrar Un Usuario ya que no es Admin, Tipo de Usuario: " + numero)
				return false;
			}
			return true;
		}

	</script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>


	<script src="../js/jsclick.js"></script>
</body>

</html>