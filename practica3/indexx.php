<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Evelynn with the php</title>
</head>

<body>
    <?php
        session_start();
        session_destroy();
    ?>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="index.php" method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>

                <span>O usa tu usuario y contrasenia</span>
                <input type="text" id="name" name="name" placeholder="Usuario" required>
                <input type="password" id="password" name="password" placeholder="contrasenia">
                <button type="submit" class="btn btn-primary" name="enviar" id="enviar">Sign in</button>
            </form>

            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Que pasa co</h1>
                    <p>Entra en esta pagina para comenzar a volar (flipa)</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>