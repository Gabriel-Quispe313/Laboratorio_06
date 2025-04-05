<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';

$database = new Database();
$materias = new Materias($database);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $materia = $materias->getById($id);

    if (!$materia) {
        die("Error: Materia no encontrada.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $data = [
        'MateriaCodigo' => $_POST['MateriaCodigo'],
        'MateriaNombre' => $_POST['MateriaNombre'],
        'MateriaHoraAcademica' => $_POST['MateriaHoraAcademica'],
        'MateriaTipo' => $_POST['MateriaTipo'],
        'MateriaPensum' => $_POST['MateriaPensum']
    ];

    if ($materias->update($id, $data)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Error al actualizar la materia.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Materia</title>
</head>
<body>
    <h1>Editar Materia</h1>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form action="editar.php" method="post">
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
        <button type="submit">Actualizar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
<?php $database->closeConnection(); ?>
