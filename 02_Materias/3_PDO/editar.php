<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';

$database = new Database();
$materias = new Materias($database->getConnection());

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
        echo "Error al actualizar la materia.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Materia</title>
</head>
<body>
    <h1>Editar Materia</h1>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $materia['id']; ?>">
        <label for="MateriaCodigo">Código:</label>
        <input type="text" name="MateriaCodigo" value="<?php echo $materia['MateriaCodigo']; ?>" required><br>
        <label for="MateriaNombre">Nombre:</label>
        <input type="text" name="Materia