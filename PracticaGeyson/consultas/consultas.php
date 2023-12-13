<?php
class Consultas
{
    public static function CrearTabla(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $conexion = mysqli_connect($host,$user,$password) or die("Conexion incorrecta");



        $sql="CREATE DATABASE IF NOT EXISTS usuarioBD";

        $tablacrear="CREATE TABLE IF NOT EXISTS USUARIOS( USUARIO varchar(30) PRIMARY KEY, CLAVE varchar(1000));";
        
        mysqli_query($conexion,$sql) or die("BaseDeDatos no creada");

        mysqli_select_db($conexion,"usuarioBD") or die("No se encontro la bd");
        
        mysqli_query($conexion,$tablacrear) or die("No se pudo crear la tabla");
            
        mysqli_close($conexion);
        }
       
    public static function Insertar($usuario, $clave){

        $host = "localhost";
        $user = "root";
        $password = "";
        $database="usuarioBD";
        $conexion = mysqli_connect($host,$user,$password,$database) or die("Conexion incorrecta");
        $HashPassword= password_hash($clave, PASSWORD_DEFAULT);

        $consultainsertar="INSERT INTO USUARIOS VALUES(?,?)";

        $stmtInsertar=mysqli_prepare($conexion,$consultainsertar);

        mysqli_stmt_bind_param($stmtInsertar,"ss",$usuario,$HashPassword);

        mysqli_stmt_execute($stmtInsertar);

        mysqli_stmt_close($stmtInsertar);
        mysqli_close($conexion);

        
}


public static function ExisteRegistro($usuario){

    $host = "localhost";
    $user = "root";
    $password = "";
    $database="usuarioBD";
    $conexion = mysqli_connect($host,$user,$password,$database) or die("Conexion incorrecta");
    $Existe=false;
    
        $consultausuario="SELECT * FROM USUARIOS WHERE USUARIO=?";
        $stmtUsuario= mysqli_prepare($conexion,$consultausuario) or die("Error");
        mysqli_stmt_bind_param($stmtUsuario,"s", $usuario) or die("Error");
        mysqli_stmt_execute($stmtUsuario);

        mysqli_stmt_store_result($stmtUsuario);

        if(mysqli_stmt_num_rows($stmtUsuario)> 0){
            $Existe=true; 
        }
        mysqli_stmt_close($stmtUsuario);
    

    
    mysqli_close($conexion);

return $Existe; 
}




public static function ComprobarInicio($usuario,$clave){

    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "usuarioBD";

    $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");
    $Existe = false;

    // Utilizar una consulta preparada
    $consulta = "SELECT CLAVE FROM USUARIOS WHERE USUARIO=?";
    $stmt = mysqli_prepare($conexion, $consulta);
    // Vincular parámetros
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    // Ejecutar la consulta
    mysqli_stmt_execute($stmt);

    mysqli_stmt_bind_result($stmt,$columnaHash);
    // Obtener resultados
    mysqli_stmt_fetch($stmt);

    if (password_verify($clave,$columnaHash)) {
        $Existe = true;
    }

    // Cerrar la consulta preparada
    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    return $Existe;
}
public static function recolectarDatos($usuario){
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "usuarioBD";

    $conexion = mysqli_connect($host, $user, $password, $database) or die("Conexion incorrecta");
    $consulta = "SELECT * FROM USUARIOS WHERE USUARIO=?";
    $stmtRecolectar= mysqli_prepare($conexion,$consulta);
    mysqli_stmt_bind_param($stmtRecolectar,"s",$usuario);
    mysqli_stmt_execute($stmtRecolectar);
    mysqli_stmt_store_result($stmtRecolectar);

    mysqli_stmt_bind_result($stmtRecolectar,$columna1,$columnaNN,$columna3,$columna4,$columna5,$columna6,$columna7);

    mysqli_stmt_fetch($stmtRecolectar);

    $_SESSION["usuario"] = $columna1;
    $_SESSION["email"] = $columna3;
    $_SESSION["nombre"] = $columna4;
    $_SESSION["telefono"] = $columna5;
    $_SESSION["direccion"] = $columna6;
    $_SESSION["sexo"] = $columna7;

    mysqli_stmt_close($stmtRecolectar);
    mysqli_close($conexion);

}

}

?>