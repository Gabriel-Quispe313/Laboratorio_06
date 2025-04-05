<?php
require_once 'clases/Database.php';
require_once 'clases/Semestres.php';

$db = new Database();
$semestres = new Semestres($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['id'],
        'SemestreCodigo' => $_POST['SemestreCodigo'],
        'SemestreNumeral' => $_POST['SemestreNumeral'],
        'SemestreLiteral' => $_POST['SemestreLiteral']
    ];

    if ($semestres->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al crear el semestre.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Semestre</title>
</head>
<body>
    <h1>Crear Nuevo Semestre</h1>
    <form action="crear.php" method="post">
        <label for="id">ID:</label>
        <input type="number" name="id" required><br>
        <label for="SemestreCodigo">Código:</label>
        <input type="text" name="SemestreCodigo" required><br>
        <label for="SemestreNumeral">Numeral:</label>
        <input type="number" name="SemestreNumeral" required><br>
        <label for="SemestreLiteral">Literal:</label>
        <input type="text" name="SemestreLiteral" required><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
