<?php
session_start();

if (isset($_SESSION["validado"])) {
    if ($_SESSION["validado"] == "true") {
        header("Location: ./menu_marian.php");
        exit;
    }
} else {
    header("Location: ./menu_marian.php");
    exit;
}
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }

        .logContainer {
            max-width: 400px;
            margin: 50px auto;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .avatar {
            width: 100px;
            margin: 10px auto;
            display: block;
        }

        .btn-primary {
            width: 100%;
        }

        .btn-danger {
            width: 100%;
        }

        .form-label {
            color: #495057;
            font-weight: bold;
        }
    </style>
</head>

<body>


    <div class="logContainer animate__animated animate__fadeInDown" >
        <form action="./validacion.php" method="post" onsubmit="return ValidaFormulario()">
            <div class="text-center">
                <img src="https://cdn2.iconfinder.com/data/icons/audio-16/96/user_avatar_profile_login_button_account_member-512.png" alt="Avatar" class="avatar">
            </div>

            <div class="mb-3">
                <label for="txtusuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" placeholder="Ingresa el usuario" name="txtusuario" id="txtusuario" required>
            </div>

            <div class="mb-3">
                <label for="txtpassword" class="form-label">Contraseña</label>
                <input type="password" class="form-control" placeholder="Ingresa la contraseña" name="txtpassword" id="txtpassword" required>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" checked>
                <label class="form-check-label" for="remember">Recuérdame</label>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Login</button>
            <a href="../index.php" class="btn btn-danger"> Cancelar</a>

            <!-- <div class="text-center mt-3">
                <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
            </div> -->
        </form>
    </div>

    <script>
        document.getElementById("txtusuario").addEventListener("keypress", function () {
            this.style.background = 'white';
        });

        document.getElementById("txtpassword").addEventListener("keypress", function () {
            this.style.background = 'white';
        });

        function ValidaFormulario() {
            const valorUsuario = document.getElementById("txtusuario").value.trim();
            const valorClave = document.getElementById("txtpassword").value.trim();

            if (!valorUsuario) {
                alert("Debes escribir el usuario");
                document.getElementById("txtusuario").style.background = 'pink';
                document.getElementById("txtusuario").focus();
                return false;
            }

            if (!valorClave || !/^\d+$/.test(valorClave)) {
                alert("Debes escribir la contraseña con solo NUMEROS");
                document.getElementById("txtpassword").style.background = 'pink';
                document.getElementById("txtpassword").focus();
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
