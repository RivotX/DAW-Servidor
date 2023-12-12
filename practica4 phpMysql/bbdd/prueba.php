<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once("consultas.php");

    if (Consultas::comprobarUsuario("admin", "123")) {

        echo "bien";
    } else {
        echo "mal";
    };
    ?>
</body>

</html>