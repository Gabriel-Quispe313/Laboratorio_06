<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';

$database = new Database();
$materias = new Materias($database->getConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'MateriaCodigo' => $_POST['MateriaCodigo'],
        'MateriaNombre' => $_POST['MateriaNombre'],
        'MateriaHoraAcademica' => $_POST['MateriaHoraAcademica'],
        'MateriaTipo' => $_POST['MateriaTipo'],
        'MateriaPensum' => $_POST['MateriaPensum']
    ];

    if ($materias->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al crear la materia.";
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
    <h1>Crear Nueva Materia</h1>
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
