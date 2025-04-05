<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';
$database = new Database();
$materias = new Materias($database->getConnection());

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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $materia = $materias->getById($id);

    if (!$materia) {
        die("Error: Materia no encontrada.");
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
    <form action="crear.php" method="post">
        <label for="MateriaCodigo">Código:</label>
        <input type="text" name="MateriaCodigo" required><br>
        <label for="MateriaNombre">Nombre:</label>
        <input type="text" name="MateriaNombre" required><br>
        <label for="MateriaHoraAcademica">Horas Académicas:</label>
        <input type="text" name="MateriaHoraAcademica" required><br>
        <label for="MateriaTipo">Tipo:</label>
        <input type="number" name="MateriaTipo" required><br>
        <label for="MateriaPensum">Pensum:</label>
        <input type="text" name="MateriaPensum" required><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>