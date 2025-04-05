<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';
$database = new Database();
$materias = new Materias($database);

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
    <title>Actualizar Materia</title>
</head>
<body>
    <h1>Actualizar Materia</h1>
    <?php if (isset($error)): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">
        <div class="form-group">
            <label for="MateriaCodigo">Código:</label>
            <input type="text" name="MateriaCodigo" value="<?php echo $_POST['MateriaCodigo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="MateriaNombre">Nombre:</label>
            <input type="text" name="MateriaNombre" value="<?php echo $_POST['MateriaNombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="MateriaHoraAcademica">Horas Académicas:</label>
            <input type="text" name="MateriaHoraAcademica" value="<?php echo $_POST['MateriaHoraAcademica']; ?>" required>
        </div>
        <div class="form-group">
            <label for="MateriaTipo">Tipo:</label>
            <input type="number" name="MateriaTipo" value="<?php echo $_POST['MateriaTipo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="MateriaPensum">Pensum:</label>
            <input type="text" name="MateriaPensum" value="<?php echo $_POST['MateriaPensum']; ?>" required>
        </div>
        <button type="submit" class="btn">Actualizar</button>
        <a href="index.php" class="btn btn-danger">Cancelar</a>
    </form>
</body>
</html>
<?php $database->closeConnection(); ?>
