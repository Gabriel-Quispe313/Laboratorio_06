<?php
//Formulario de actualzar
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if(isset($_POST['actualizar'])) {

    $ci = $_POST['txt-ci'];
    $nombres = $_POST['txt-nombre'];
    $apellidos = $_POST['txt-apellido'];
    $email = $_POST['txt-email'];
    $celular = $_POST['txt-celular'];
    $carrera = $_POST['txt-carrera'];

    $sql = "UPDATE estudiante SET 
            ci = '$ci',
            nombres = '$nombres', 
            apellidos = '$apellidos', 
            celular = '$celular', 
            email = '$email', 
            carrera = '$carrera' 
            WHERE ci = '$ci';";

    if(mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " .mysqli_error($conexion);
    }
}
?>


