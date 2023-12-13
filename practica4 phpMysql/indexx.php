<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>papa</title>
    <link rel="stylesheet" href="styles/stylePHP.css">
    <link rel="stylesheet" href="styles/styleIndex.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
          include_once("bbdd/consultas.php");

        if (isset($_POST["destino"]) && isset($_POST["concepto"]) && isset($_POST["cantidad"])) {
            $destino = $_POST["destino"];
            $concepto = $_POST["concepto"];
            $cantidad = $_POST["cantidad"];

            Consultas::insertarBizum("bizums",$destino, $concepto, $cantidad);
        }else{echo "error";}
        
        
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
                        <td>nose</td>
                        <td>nose</td>
                        <td>nose</td>
                        <td><button>Editar</button></td>
                        <td><button>Eliminar</button></td>
                    </tr>
                    <!-- Puedes agregar más filas aquí siguiendo la misma estructura -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>