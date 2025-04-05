<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database->getConnection());

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $carrera = $carreras->getById($id);

    if (!$carrera) {
        die("<p>Error: La carrera con ID $id no fue encontrada.</p>");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['txt-id'],
        'codigo' => $_POST['txt-codigo'], 
        'nombre' => $_POST['txt-nombre'], 
        'abreviacion' => $_POST['txt-abreviacion']
    ];

    if (empty($data['id']) || empty($data['codigo']) || empty($data['nombre']) || empty($data['abreviacion'])) {
        die("<p>Error: Todos los campos son obligatorios.</p>");
    }

    if ($data['id'] != $carrera['id']) {
        $carrera_existente = $carreras->getById($data['id']);
        if ($carrera_existente) {
            die("<p>Error: El ID ingresado ya está en uso por otra carrera.</p>");
        }
    }

    if ($carreras->update($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error al actualizar la carrera. Verifica la conexión o los datos ingresados.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera - PDO</title>
</head>
<body>
    <h1>Editar Carrera</h1>
    <form method="post">
        <div class="form-group">
            <label for="txt-id">ID de la Carrera:</label>
            <input type="number" name="txt-id" value="<?php echo $carrera['id']; ?>" required>
        </div>
        <div class="form-group">
            <label for="txt-codigo">Código de la Carrera:</label>
            <input type="text" name="txt-codigo" value="<?php echo $carrera['CarreraCodigo']; ?>" required>
        </div>
        <div class="form-group">
            <label for="txt-nombre">Nombre de la Carrera:</label>
            <input type="text" name="txt-nombre" value="<?php echo $carrera['CarreraNombre']; ?>" required>
        </div>
        <div class="form-group">
            <label for="txt-abreviacion">Abreviación:</label>
            <input type="text" name="txt-abreviacion" value="<?php echo $carrera['CarreraAbreviacion']; ?>" required>
        </div>
        <button type="submit" class="btn">Actualizar</button>
        <a href="index.php" class="btn btn-danger">Cancelar</a>
    </form>
</body>
</html>
<?php $database->closeConnection(); ?>
