<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigo = $_POST['MateriaCodigo'];
    $nombre = $_POST['MateriaNombre'];
    $hora = $_POST['MateriaHoraAcademica'];
    $tipo = $_POST['MateriaTipo'];
    $pensum = $_POST['MateriaPensum'];

    $sql = "INSERT INTO materias (MateriaCodigo, MateriaNombre, MateriaHoraAcademica, MateriaTipo, MateriaPensum) 
            VALUES ('$codigo', '$nombre', '$hora', '$tipo', '$pensum')";
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
    <title>Crear Materia</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container">
        <h1>Crear Nueva Materia</h1>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="MateriaCodigo">Código:</label>
                <input type="text" name="MateriaCodigo" required>
            </div>
            <div class="form-group">
                <label for="MateriaNombre">Nombre:</label>
                <input type="text" name="MateriaNombre" required>
            </div>
            <div class="form-group">
                <label for="MateriaHoraAcademica">Horas Académicas:</label>
                <input type="text" name="MateriaHoraAcademica" required>
            </div>
            <div class="form-group">
                <label for="MateriaTipo">Tipo:</label>
                <input type="number" name="MateriaTipo" required>
            </div>
            <div class="form-group">
                <label for="MateriaPensum">Pensum:</label>
                <input type="text" name="MateriaPensum" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
