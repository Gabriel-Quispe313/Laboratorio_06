<?php
//Formulario de actualzar
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión: " .mysqli_connect_error());
}

if(isset($_POST['actualizar'])) {

    $id = $_POST['txt-id'];
    $codigo = $_POST['txt-codigo'];
    $nombre = $_POST['txt-nombre'];
    $abrev = $_POST['txt-abrev'];

    $sql = "UPDATE carreras SET 
        codigo = '$codigo', 
        nombre = '$nombre', 
        abrev = '$abrev'
        WHERE id = '$id'";


    if(mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " .mysqli_error($conexion);
    }
}
?>