<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database);

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
        'abrev' => $_POST['txt-abrev'],
    ];

    if ($data['id'] != $carrera['id']) {
        $carrera_existente = $carreras->getById($data['id']);
        if ($carrera_existente) {
            die("<p>Error: El ID ingresado ya está en uso.</p>");
        }
    }

    if ($carreras->update($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error al actualizar la carrera.</p>";
    }
}

$database->closeConnection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera - CRUD POO</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Carrera</h1>
        <form method="post">
            <div class="form-group">
                <label for="id">ID de la Carrera</label>
                <input type="number" name="txt-id" value="<?php echo $carrera['id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="codigo">Código de la Carrera</label>
                <input type="text" name="txt-codigo" value="<?php echo $carrera['codigo']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre de la Carrera</label>
                <input type="text" name="txt-nombre" value="<?php echo $carrera['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label for="abrev">Abreviación de la Carrera</label>
                <input type="text" name="txt-abrev" value="<?php echo $carrera['abrev']; ?>" required>
            </div>
            <button type="submit" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>
