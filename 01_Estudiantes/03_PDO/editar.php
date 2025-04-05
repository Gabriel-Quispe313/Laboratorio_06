<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/EstudiantePDO.php';

$database = new DatabasePDO();
$estudiante = new EstudiantePDO($database);

$ci = $_GET['ci'] ?? null;
$datosEstudiante = $estudiante->getById($ci);

if (!$datosEstudiante) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Estudiante - PDO</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Estudiante</h1>
        <form action="actualizar.php" method="POST">
            <div class="form-group">
                <label for="ci">C.I:</label>
                <input type="text" name="ci" value="<?php echo htmlspecialchars($datosEstudiante['ci']); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($datosEstudiante['nombres']); ?>" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" value="<?php echo htmlspecialchars($datosEstudiante['apellidos']); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($datosEstudiante['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" name="celular" value="<?php echo htmlspecialchars($datosEstudiante['celular']); ?>">
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" name="carrera" value="<?php echo htmlspecialchars($datosEstudiante['carrera']); ?>">
            </div>
            <div class="form-group">
                <button type="submit" name="actualizar" class="btn">Actualizar</button>
                <a href="index.php" class="btn btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>