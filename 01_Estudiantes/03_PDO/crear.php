<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/EstudiantePDO.php';

$database = new DatabasePDO();
$estudiante = new EstudiantePDO($database);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'ci' => $_POST['ci'],
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'email' => $_POST['email'],
        'celular' => $_POST['celular'],
        'carrera' => $_POST['carrera']
    ];

    if ($estudiante->create($data)) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Error al crear el estudiante';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Estudiante - PDO</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Crear nuevo Estudiante</h1>
        <?php if(isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="ci">Cedula de Indentidad:</label>
                <input type="text" name="ci" require>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" require>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" require>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" require>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" name="celular" require>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" name="carrera">
            </div>
            <button type="submit" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-cancel">Cancelar</a>
        </form>
    </div>
</body>
</html>

<?php $database->closeConnection(); ?>