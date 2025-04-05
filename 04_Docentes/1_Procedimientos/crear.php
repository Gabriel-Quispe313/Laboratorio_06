<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codigo = $_POST['DocenteCodigo'];
    $ci = $_POST['DocenteCarnetIdentidad'];
    $nombres = $_POST['DocenteNombres'];
    $fecha_nacimiento = $_POST['DocenteFechaNacimiento'];
    $direccion = $_POST['DocenteDireccion'];
    $celular = $_POST['DocenteCelular'];

    $sql = "INSERT INTO docentes (id, DocenteCodigo, DocenteCarnetIdentidad, DocenteNombres, DocenteFechaNacimiento, DocenteDireccion, DocenteCelular) 
            VALUES ('$id', '$codigo', '$ci', '$nombres', '$fecha_nacimiento', '$direccion', '$celular')";
    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Docente</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container">
    <h1>Crear Nuevo Docente</h1>
    <form action="crear.php" method="post">
        <label for="id">ID:</label>
        <input type="number" name="id" required><br>
        <label for="DocenteCodigo">Código:</label>
        <input type="text" name="DocenteCodigo" required><br>
        <label for="DocenteCarnetIdentidad">Carnet de Identidad:</label>
        <input type="text" name="DocenteCarnetIdentidad" required><br>
        <label for="DocenteNombres">Nombres:</label>
        <input type="text" name="DocenteNombres" required><br>
        <label for="DocenteFechaNacimiento">Fecha de Nacimiento:</label>
        <input type="text" name="DocenteFechaNacimiento" required><br>
        <label for="DocenteDireccion">Dirección:</label>
        <input type="text" name="DocenteDireccion" required><br>
        <label for="DocenteCelular">Celular:</label>
        <input type="text" name="DocenteCelular" required><br>
        <button type="submit">Guardar</button>
        <a href="index.php">Cancelar</a>
    </form>
    </div>
</body>
</html>
