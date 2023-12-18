<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>papa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles/styleIndex.css">

</head>

<body class="min-vh-100">
    <div class="container-fluid text-white " id="todo">

        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdicion">Añadir</button>

        <div class="modal fade text-black " id="modalEdicion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agrega nueva persona</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="indexx.php" method="post">
                        <div class="modal-body">
                            <label>Cuenta destino</label>
                            <input type="text" name="destino" id="destino" class="form-control input-sm" required>
                            <label>Concepto</label>
                            <input type="text" name="concepto" id="concepto" class="form-control input-sm" required>
                            <label>Cantidad (euros)</label>
                            <input type="number" name="cantidad" id="cantidad" class="form-control input-sm" required>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" id="guardarnuevo" value="Agregar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include_once("Consultas/consultas.php");

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["destino"]) && isset($_POST["concepto"]) && isset($_POST["cantidad"])) {
            $destino = $_POST["destino"];
            $concepto = $_POST["concepto"];
            $cantidad = $_POST["cantidad"];

            Consultas::insertarBizum("bizums", $destino, $concepto, $cantidad);
            header("Location: " . $_SERVER['PHP_SELF']); //misma pagina

        }


        ?>
        <div class="container">
            <table class="table table-hover table-active">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Cuenta destino</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Cantidad(euros)</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    Consultas::mostrar();

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        // Verificar si las variables $_POST están definidas antes de acceder a ellas
                        $campo1 = isset($_POST["campo1"]) ? $_POST["campo1"] : "";
                        $campo2 = isset($_POST["campo2"]) ? $_POST["campo2"] : "";
                        $campo3 = isset($_POST["campo3"]) ? $_POST["campo3"] : "";
                        $ID = isset($_POST['inputID']) ? (int)$_POST['inputID'] : 0;


                        Consultas::update($ID, $campo1, $campo2, $campo3);
                    }

                    if (isset($_POST["borrar"])) {
                        Consultas::Delete($ID);
                    }

                    ?>

                </tbody>
            </table>
            <form id="myForm" action="indexx.php" method="post">
                <input type="hidden" name="campo1" />
                <input type="hidden" name="campo2" />
                <input type="hidden" name="campo3" />
                <input id="inputID" type="hidden" name="inputID" />
            </form>

            <form id="formBorrar" action="indexx.php" method="post">
                <input id="borrar" type="hidden" name="borrar" />
            </form>
        </div>

        <script src="js/scripts.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>