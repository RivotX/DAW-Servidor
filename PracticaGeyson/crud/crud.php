<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../estilo/crud.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="../jss/script.js"></script>
</head>

<body class=" align-items-center d-flex bg-dark">

    <?php 
    session_start();
include_once("../consultas/consultas.php");
    if(isset($_POST["usuario"], $_POST["clave"])&&!Consultas::ComprobarInicio($_POST["usuario"], $_POST["clave"])){
       $_SESSION["usuario"]=$_POST["usuario"];
        header("location:../indexx.php?inco=0");

    }else{

    
    ?>

    <div class="container h-75 w-75 crud text-center">
        <h1 class="mt-5 mb-5">Bienvenido al CRUD <?php $_SESSION["usuario"]?></h1>
        <div class="row  ">
            <div class="col-lg-2  col-md-2 col-xl-2 acciones col-sm-12 ">
                <form action="">
                    <input class="inputs " type="text" placeholder="Cancion">
                    <input class="inputs " type="text" placeholder="Autor">
                    <input class="inputs " type="text" placeholder="Genero">
                    <input type="submit" value="crear">
                </form>

                

                <form action="">
                    <input class="inputs " type="text" placeholder="id de la cancion">
                    <input class="inputs " type="text" placeholder="Cancion">
                    <input class="inputs " type="text" placeholder="Autor">
                    <input class="inputs " type="text" placeholder="Genero">
                    <input class="btn btn-dark btn-outline-light " type="submit" value="Modificar">
                </form>
            </div>
            <div class="col-2"></div>
            <div class="col-lg-8 col-sm-12 col-md-8 col-xl-8 tabla ">
                <table class="table  table-hover table-dark  ">
                    <tr class="">
                        <th>ID</th>
                        <th>CANCION</th>
                        <th>AUTOR</th>
                        <th>GENERO</th>
                        <th></th>
                        <?php 
                        include_once("../consultas/consultas.php");


                        
                        ?>
                    </tr>
                    

                </table>
            </div>

        </div>


    </div>

    <?php
    }
    ?>
</body>

</html>