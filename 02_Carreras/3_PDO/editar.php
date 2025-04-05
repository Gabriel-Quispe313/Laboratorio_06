<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database->getConnection());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $carrera = $carreras->getById($id);

    if (!$carrera) {
        die("<p>Error: Carrera no encontrada.</p>");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['txt-id'],
        'codigo' => $_POST['txt-codigo'],
        'nombre' => $_POST['txt-nombre'],
        'abrev' => $_POST['txt-abrev']
    ];

    if ($carreras->update($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error al actualizar la carrera.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Carrera - PDO</title>
</head>
<body>
    <h1>Editar Carrera</h1>
    <form method="post">
        <label>ID:</label>
        <input type="number" name="txt-id" value="<?php echo $carrera['id']; ?>" readonly required><br>
        <label>Código:</label>
        <input type="text" name="txt-codigo" value="<?php echo $carrera['codigo']; ?>" required><br>
        <label>Nombre:</label>
        <input type="text" name="txt-nombre" value="<?php echo $carrera['nombre']; ?>" required><br>
        <label>Abreviación:</label>
        <input type="text" name="txt-abrev" value="<?php echo $carrera['abrev']; ?>" required><br>
        <button type="submit">Actualizar</button>
    </form>
</body>
</html>
<?php $database->closeConnection(); ?>
