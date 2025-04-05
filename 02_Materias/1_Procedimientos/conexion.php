<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

// Crear conexión
$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

// Verificar conexión
if (!$conexion) {
    die("Error en la conexión: " . mysqli_connect_error());
}
?>
