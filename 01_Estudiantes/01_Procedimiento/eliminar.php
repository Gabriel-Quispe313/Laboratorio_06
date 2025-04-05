<?php
//Formulario de eliminar
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if(isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    $sql = "DELETE FROM estudiante WHERE ci = '$ci';";
    
    if(mysqli_query($conexion, $sql)) {
        header("Location: index.php");
    } else {
        echo "Error: " .mysqli_error($conexion);
    }
}
?>