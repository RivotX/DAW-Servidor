<?php

class Consultas
{
    public static function CrearTabla($nombreTabla)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password) or die("Conexion incorrecta");

        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        $tablacrear = "CREATE TABLE IF NOT EXISTS $nombreTabla ( USUARIO varchar(30) PRIMARY KEY, CLAVE varchar(30),EMAIL VARCHAR(60) );";
        mysqli_query($conn, $sql) or die("BaseDeDatos no creada");
        mysqli_select_db($conn, $dbName);

        mysqli_query($conn, $tablacrear) or die("tabla no creada");

        mysqli_close($conn);
    }


    public static function insertarUsuario($nombreTabla, $usuario, $clave, $email)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password, $dbName) or die("Conexion incorrecta");

        // Encriptar la contraseña antes de insertarla en la base de datos
        $claveEncriptada = password_hash($clave, PASSWORD_DEFAULT);

        $consultaInsertar = "INSERT INTO $nombreTabla VALUES (?, ?, ?)";
        $stmtInsertar = mysqli_prepare($conn, $consultaInsertar);
        mysqli_stmt_bind_param($stmtInsertar, 'sss', $usuario, $claveEncriptada, $email);
        mysqli_stmt_execute($stmtInsertar);

        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conn);
    }


    public static function comprobarUsuario($usuario, $clave)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password, $dbName) or die("Conexion incorrecta");
        mysqli_select_db($conn, $dbName);

        $loginCorrecto = false;

        // Consulta para obtener la contraseña almacenada asociada al usuario
        $consultaComprobar = "SELECT CLAVE FROM usuarios WHERE usuario = ?";
        $consulta_stmt = mysqli_prepare($conn, $consultaComprobar);

        mysqli_stmt_bind_param($consulta_stmt, 's', $usuario);

        mysqli_stmt_execute($consulta_stmt);

        // Obtener el resultado de la consulta

        mysqli_stmt_bind_result($consulta_stmt, $resultadoClave);
        mysqli_stmt_fetch($consulta_stmt);

        echo "<br>";
        echo $clave;
        echo "<br>";

        echo $resultadoClave;
        echo "<br>";

        // Verificar si la contraseña coincide utilizando password_verify, aqui esta el error PASSWORD_VERIFY DEVUELVE FALSE
        if (password_verify($clave, $resultadoClave)) {
            $loginCorrecto = true;
            echo "entra";
        } else {
            echo "----------mal, no entra al if";
        }

        mysqli_stmt_close($consulta_stmt);
        mysqli_close($conn);

        return $loginCorrecto;
    }

    public static function insertarBizum($nombreTabla, $destino, $concepto, $cantidad)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password, $dbName) or die("Conexion incorrecta");
        mysqli_select_db($conn, $dbName);

        // Encriptar la contraseña antes de insertarla en la base de datos

        $consultaInsertar = "INSERT INTO $nombreTabla (CUENTA_DESTINO, concepto, cantidad) VALUES (?, ?, ?)";
        $stmtInsertar = mysqli_prepare($conn, $consultaInsertar);
        mysqli_stmt_bind_param($stmtInsertar, 'sss', $destino, $concepto, $cantidad);
        mysqli_stmt_execute($stmtInsertar);

        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conn);
    }

    public static function mostrar()
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password, $dbName) or die("Conexion incorrecta");
        mysqli_select_db($conn, $dbName);

        $consulta = 'SELECT * FROM bizums';
        $stmt = mysqli_prepare($conn, $consulta);
        mysqli_stmt_execute($stmt);

        // Obtiene el resultado de la consulta
        $result = mysqli_stmt_get_result($stmt);

        while ($mostrar = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td class='id'> " . $mostrar['ID'] . "</td>";
            echo "<td class='td'>" . $mostrar['Cuenta_destino'] . "</td>";
            echo "<td class='td'>" . $mostrar['Concepto'] . "</td>";
            echo "<td class='td'>" . $mostrar['Cantidad'] . "</td>";
            echo "<td><svg onclick='editar(this)' class='svg' onmouseenter='pointer(this)' style='width: 40px; height:25px' id='svg' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 20'>
            <path d='m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z' />
        </svg></td>";

            echo ' <td>  <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="40" height="40" viewBox="0 10 100 100" onclick="eliminar(this)" class="svg" onmouseenter="pointer(this)">
            <path fill="#f37e98" d="M25,30l3.645,47.383C28.845,79.988,31.017,82,33.63,82h32.74c2.613,0,4.785-2.012,4.985-4.617L75,30"></path><path fill="#f15b6c" d="M65 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S65 36.35 65 38zM53 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S53 36.35 53 38zM41 38v35c0 1.65-1.35 3-3 3s-3-1.35-3-3V38c0-1.65 1.35-3 3-3S41 36.35 41 38zM77 24h-4l-1.835-3.058C70.442 19.737 69.14 19 67.735 19h-35.47c-1.405 0-2.707.737-3.43 1.942L27 24h-4c-1.657 0-3 1.343-3 3s1.343 3 3 3h54c1.657 0 3-1.343 3-3S78.657 24 77 24z"></path><path fill="#1f212b" d="M66.37 83H33.63c-3.116 0-5.744-2.434-5.982-5.54l-3.645-47.383 1.994-.154 3.645 47.384C29.801 79.378 31.553 81 33.63 81H66.37c2.077 0 3.829-1.622 3.988-3.692l3.645-47.385 1.994.154-3.645 47.384C72.113 80.566 69.485 83 66.37 83zM56 20c-.552 0-1-.447-1-1v-3c0-.552-.449-1-1-1h-8c-.551 0-1 .448-1 1v3c0 .553-.448 1-1 1s-1-.447-1-1v-3c0-1.654 1.346-3 3-3h8c1.654 0 3 1.346 3 3v3C57 19.553 56.552 20 56 20z"></path><path fill="#1f212b" d="M77,31H23c-2.206,0-4-1.794-4-4s1.794-4,4-4h3.434l1.543-2.572C28.875,18.931,30.518,18,32.265,18h35.471c1.747,0,3.389,0.931,4.287,2.428L73.566,23H77c2.206,0,4,1.794,4,4S79.206,31,77,31z M23,25c-1.103,0-2,0.897-2,2s0.897,2,2,2h54c1.103,0,2-0.897,2-2s-0.897-2-2-2h-4c-0.351,0-0.677-0.185-0.857-0.485l-1.835-3.058C69.769,20.559,68.783,20,67.735,20H32.265c-1.048,0-2.033,0.559-2.572,1.457l-1.835,3.058C27.677,24.815,27.351,25,27,25H23z"></path><path fill="#1f212b" d="M61.5 25h-36c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h36c.276 0 .5.224.5.5S61.776 25 61.5 25zM73.5 25h-5c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h5c.276 0 .5.224.5.5S73.776 25 73.5 25zM66.5 25h-2c-.276 0-.5-.224-.5-.5s.224-.5.5-.5h2c.276 0 .5.224.5.5S66.776 25 66.5 25zM50 76c-1.654 0-3-1.346-3-3V38c0-1.654 1.346-3 3-3s3 1.346 3 3v25.5c0 .276-.224.5-.5.5S52 63.776 52 63.5V38c0-1.103-.897-2-2-2s-2 .897-2 2v35c0 1.103.897 2 2 2s2-.897 2-2v-3.5c0-.276.224-.5.5-.5s.5.224.5.5V73C53 74.654 51.654 76 50 76zM62 76c-1.654 0-3-1.346-3-3V47.5c0-.276.224-.5.5-.5s.5.224.5.5V73c0 1.103.897 2 2 2s2-.897 2-2V38c0-1.103-.897-2-2-2s-2 .897-2 2v1.5c0 .276-.224.5-.5.5S59 39.776 59 39.5V38c0-1.654 1.346-3 3-3s3 1.346 3 3v35C65 74.654 63.654 76 62 76z"></path><path fill="#1f212b" d="M59.5 45c-.276 0-.5-.224-.5-.5v-2c0-.276.224-.5.5-.5s.5.224.5.5v2C60 44.776 59.776 45 59.5 45zM38 76c-1.654 0-3-1.346-3-3V38c0-1.654 1.346-3 3-3s3 1.346 3 3v35C41 74.654 39.654 76 38 76zM38 36c-1.103 0-2 .897-2 2v35c0 1.103.897 2 2 2s2-.897 2-2V38C40 36.897 39.103 36 38 36z"></path>
            </svg> </td>';

            echo "</tr>";
        }



        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }

    public static function Update($ID, $cuenta_destino, $concepto, $cantidad)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password, $dbName) or die("Conexion incorrecta");
        mysqli_select_db($conn, $dbName);

        $consulta = "UPDATE bizums SET Cuenta_destino = ?, Concepto = ?, Cantidad = ? WHERE ID = ?";
        $stmt = mysqli_prepare($conn, $consulta);

        if ($stmt) {
            // Vincula los parámetros
            mysqli_stmt_bind_param($stmt, "ssss", $cuenta_destino, $concepto, $cantidad, $ID);

            // Ejecuta la consulta
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        } else {
            // Manejo de errores si la preparación de la consulta falla
            echo "Error al preparar la consulta: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }


    public static function Delete($ID)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password, $dbName) or die("Conexion incorrecta");
        mysqli_select_db($conn, $dbName);

        $borrar = isset($_POST['borrar']) ? $_POST['borrar'] : "";

        $consulta = "DELETE FROM bizums WHERE ID = ?";
        $stmt = mysqli_prepare($conn, $consulta);

        if ($stmt) {
            // Vincular parámetro
            mysqli_stmt_bind_param($stmt, "s", $borrar);

            // Ejecutar la consulta
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);
        } else {
            // Manejo de errores si la preparación de la consulta falla
            echo "Error al preparar la consulta: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }



























    public static function CrearTabla2($nombreTabla)
    {
        $host = "localhost";
        $user = "root";
        $password = "";
        $dbName = "UsersYcrud";
        $conn = mysqli_connect($host, $user, $password) or die("Conexion incorrecta");

        $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
        $tablacrear = "CREATE TABLE IF NOT EXISTS $nombreTabla (ID INT AUTO_INCREMENT PRIMARY KEY, Cuenta_destino varchar(30), Concepto varchar(30), Cantidad float );";
        mysqli_query($conn, $sql) or die("BaseDeDatos no creada");
        mysqli_select_db($conn, $dbName);

        mysqli_query($conn, $tablacrear) or die("tabla no creada");

        mysqli_close($conn);
    }
}
