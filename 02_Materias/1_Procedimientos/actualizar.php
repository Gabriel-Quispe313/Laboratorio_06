<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos actuales de la materia para prellenar el formulario
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

    // Actualizar los datos en la base de datos
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
    <title>Actualizar Materia</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container">
        <h1>Actualizar Materia</h1>
        <form action="actualizar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $materia['id']; ?>">

            <div class="form-group">
                <label for="MateriaCodigo">Código:</label>
                <input type="text" name="MateriaCodigo" value="<?php echo $materia['MateriaCodigo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="MateriaNombre">Nombre:</label>
                <input type="text" name="MateriaNombre" value="<?php echo $materia['MateriaNombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="MateriaHoraAcademica">Horas Académicas:</label>
                <input type="text" name="MateriaHoraAcademica" value="<?php echo $materia['MateriaHoraAcademica']; ?>" required>
            </div>
            <div class="form-group">
                <label for="MateriaTipo">Tipo:</label>
                <input type="number" name="MateriaTipo" value="<?php echo $materia['MateriaTipo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="MateriaPensum">Pensum:</label>
                <input type="text" name="MateriaPensum" value="<?php echo $materia['MateriaPensum']; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
