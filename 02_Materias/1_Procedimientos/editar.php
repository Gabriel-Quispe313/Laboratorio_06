<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM materias WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $materia = mysqli_fetch_assoc($resultado);

    if (!$materia) {
        die("Error: Materia no encontrada.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codigo = $_POST['MateriaCodigo'];
    $nombre = $_POST['MateriaNombre'];
    $hora = $_POST['MateriaHoraAcademica'];
    $tipo = $_POST['MateriaTipo'];
    $pensum = $_POST['MateriaPensum'];

    $sql = "UPDATE materias 
            SET MateriaCodigo = '$codigo', MateriaNombre = '$nombre', MateriaHoraAcademica = '$hora', MateriaTipo = '$tipo', MateriaPensum = '$pensum' 
            WHERE id = $id";
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
    <title>Editar Materia</title>
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
