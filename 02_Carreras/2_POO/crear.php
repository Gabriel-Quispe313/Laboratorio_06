<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['txt-id'],
        'codigo' => $_POST['txt-codigo'],
        'nombre' => $_POST['txt-nombre'],
        'abrev' => $_POST['txt-abrev']
    ];

    if($carreras->create($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al crear la carrera";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Carrera - POO</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Crear Carrera</h1>
        <?php if(isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="id">ID de la Carrera</label>
                <input type="number" name="txt-id" required>
            </div>
            <div class="form-group">
                <label for="codigo">Codigo Carrera:</label>
                <input type="text" name="txt-codigo" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre de la Carrera:</label>
                <input type="text" name="txt-nombre" required>
            </div>
            <div class="form-group">
                <label for="abrev">Abreviacion (Carrera):</label>
                <input type="text" name="txt-abrev" required>
            </div>
            <button type="submit" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>