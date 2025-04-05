<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database->getConnection());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['txt-id'],
        'codigo' => $_POST['txt-codigo'],
        'nombre' => $_POST['txt-nombre'],
        'abrev' => $_POST['txt-abrev']
    ];

    if ($carreras->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error al crear la carrera.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Carrera - PDO</title>
</head>
<body>
    <h1>Crear Carrera</h1>
    <form method="post">
        <label>ID:</label>
        <input type="number" name="txt-id" required><br>
        <label>Código:</label>
        <input type="text" name="txt-codigo" required><br>
        <label>Nombre:</label>
        <input type="text" name="txt-nombre" required><br>
        <label>Abreviación:</label>
        <input type="text" name="txt-abrev" required><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
<?php $database->closeConnection(); ?>
