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
    <div class="container-fluid" id="todo">

        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdicion">Añadir</button>

        <div class="modal fade" id="modalEdicion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        if (isset($_POST["destino"]) && isset($_POST["concepto"]) && isset($_POST["cantidad"])) {
            $destino = $_POST["destino"];
            $concepto = $_POST["concepto"];
            $cantidad = $_POST["cantidad"];

            Consultas::insertarBizum("bizums", $destino, $concepto, $cantidad);
        } else {
            echo "error";
        }


        ?>
        <div class="container">
            <table class="table table-hover table-active">
                <thead>
                    <tr>
                        <th scope="col">Cuenta destino</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="td">nose</td>
                        <td class="td">nose</td>
                        <td class="td">nose</td>
                        <td><svg onclick="editar(this)" class="svg" onmouseenter="pointer(this)" style="width: 40px; height:25px" id="svg" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                            </svg></td>
                        <td><button> Eliminar</button></td>
                    </tr>
                </tbody>
            </table>
            <form id="myForm" action="indexx.php" method="post">
                <input type="hidden" name="campo1" />
                <input type="hidden" name="campo2" />
                <input type="hidden" name="campo3" />
            </form>
        </div>
    <script src="scripts.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>