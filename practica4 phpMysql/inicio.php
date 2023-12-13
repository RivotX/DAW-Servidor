<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Evelynn with the php</title>
</head>

<body>
    <?php
    session_start();
    session_destroy();
    include_once("bbdd/consultas.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['crear'])) {
            $usuario = $_POST["usuario"];
            $clave = $_POST["clave"];
            $email = $_POST["email"];

            Consultas::insertarUsuario("usuarios", $usuario, $clave, $email);
        } else if (isset($_POST['inicio'])) {
            $usuario = $_POST["nombre"];
            $clave = $_POST["password"];

            // if ((Consultas::comprobarUsuario($usuario, $clave))) {
            //     echo "BIEEEN";
            // } else {
            //     echo "mal";
            // }
            Consultas::comprobarUsuario($usuario, $clave);
        }
    } ?>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form name="formCrear" action="inicio.php" method="post">
                <h1>Crear cuenta</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <input type="text" name="usuario" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="clave" placeholder="Password" required>
                <button type="submit" name="crear">Crear cuenta</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form name="formInicio" action="inicio.php" method="post">
                <h1>Iniciar sesion</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>

                <input type="text" name="nombre" placeholder="Usuario" required>
                <input type="password" name="password" placeholder="Password" required>
                <a href="#">Forget Your Password?</a>
                <button type="submit" name="inicio">Iniciar sesión</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Bienvenido de nuevo!</h1>
                    <p> Completa tu perfil para utilizar todas las features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Eyo colegon</h1>
                    <p>Registrate con tus datos para utilizar todas las features</p>
                    <button class="hidden" id="register">Registrarse</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>