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
}
