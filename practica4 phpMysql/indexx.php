<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evelynn with the php on php</title>
    <link rel="stylesheet" href="styles/stylePHP.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <div class="container" id="container">

        <?php


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["name"]) && isset($_POST["password"]) && $_POST["name"] == "admin" && $_POST["password"] == "1234" || isset($_POST["name"]) && isset($_POST["password"]) && $_POST["name"] == "migue" && $_POST["password"] == "kkk" || isset($_POST["ruta"]) || isset($_POST["buscar"]) || isset($_POST["crear"]) || isset($_POST["logout"])) {

                session_start();
                $_SESSION["iniciada"] = true;
                if (isset($_SESSION["iniciada"]) && $_POST["name"] == "admin" && $_POST["password"] == "1234") {
                    $_SESSION["ADMIN"] = true;
                } else {
                    $_SESSION["pleb"] = true;
                }
                if (isset($_SESSION["iniciada"]) && isset($_SESSION["ADMIN"])) {

                    $hora_actual = date("H:i");

                    echo '<h2> Inicio correcto de sesión, a las ' . $hora_actual . '</h2>';

                    echo "<p> Pulsa aquí para obtener la ruta en la que te encuentras actualmente.</p>";
        ?>

                    <form action="index.php" method="post">
                        <p>
                            <label for="ruta"> Pulsa aquí para ver la ruta </label>
                            <input type="submit" name="ruta" id="ruta">
                        </p>
                    </form>

                    <form action="index.php" method="post">
                        <p>
                            <label for="buscar"> Pulsa aquí para buscar archivo </label>
                            <input type="text" name="nombreBuscar" id="nombreBuscar" placeholder="introduce el nombre del archivo que deseas buscar" required>
                            <input type="submit" value="buscar" name="buscar" id="buscar">
                        </p>
                    </form>

                    <form action="index.php" method="post">
                        <p>
                            <label> Pulsa aquí para crear archivo </label>
                            <input type="text" name="nombrearch" id="nombrearch" placeholder="introduce el nombre del archivo que deseas crear" required>
                            <input type="submit" value="crear" name="crear" id="crear">
                        </p>
                    </form>

                    <form action="index.php" method="post">
                        <p>
                            <input type="submit" value="Log out" name="logout" id="logout">
                        </p>
                    </form>




                    <?php
                    if (isset($_POST["ruta"])) {
                        $ruta_actual = getcwd();
                        echo "La ruta actual es: " . $ruta_actual;
                    }

                    if (isset($_POST["buscar"])) {
                        $directorio = "C:/xampp/htdocs/Migue/practica3/archivos";

                        $patron = $directorio . "/" . $_POST["nombreBuscar"];
                        $archivos = glob($patron);
                        $encontrado = false;


                        foreach ($archivos as $archivo) {
                            if ($archivo == $patron) {
                                $encontrado = true;
                                break;
                            }
                        }
                        if ($encontrado) {
                            echo "El archivo '$patron' se encuentra en la carpeta.";
                        } else {
                            echo "El archivo '$patron' no se encuentra en la carpeta.";
                        }
                    }
                    if (isset($_POST["crear"])) {
                        $nombreArchivo = "archivos/" . $_POST["nombrearch"];
                        fopen($nombreArchivo, 'a+');
                    }



                    if (isset($_POST["logout"])) {
                        session_destroy();
                        header("Location: inicio.php"); // Redirigir a la página de inicio de sesión o a donde desees después del cierre de sesión
                    }
                } else {
                    $hora_actual = date("H:i");

                    echo '<h2> Inicio correcto de sesión, a las ' . $hora_actual . '</h2>';

                    echo "<p> Pulsa aquí para obtener la ruta en la que te encuentras actualmente.</p>";

                    ?>
                    <form action="index.php" method="post">
                        <p>
                            <label for="ruta"> Pulsa aquí para ver la ruta </label>
                            <input type="submit" name="ruta" id="ruta">
                        </p>
                    </form>
        <?php
                    if (isset($_POST["ruta"])) {
                        $ruta_actual = getcwd();
                        echo "La ruta actual es: " . $ruta_actual;
                    }
                }
            } else {
                echo "Login incorrecto";
            }
        }
        ?>

    </div>
</body>

</html>