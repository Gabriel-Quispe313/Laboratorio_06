<?php
require_once 'clases/Database.php';
require_once 'clases/Semestres.php';

$db = new Database();
$semestres = new Semestres($db->getConnection());

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $semestre = $semestres->getById($id);
    if (!$semestre) {
        die("Error: Semestre no encontrado.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_original = $_POST['id_original'];
    $nuevo_id = $_POST['id'];
    $data = [
        'id' => $nuevo_id,
        'SemestreCodigo' => $_POST['SemestreCodigo'],
        'SemestreNumeral' => $_POST['SemestreNumeral'],
        'SemestreLiteral' => $_POST['SemestreLiteral']
    ];

    $semestre_existente = $semestres->getById($nuevo_id);
    if ($semestre_existente && $nuevo_id != $id_original) {
        die("Error: El ID ingresado ya está en uso.");
    }

    if ($semestres->update($id_original, $data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el semestre.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Semestre</title>
</head>
<body>
    <h1>Actualizar Semestre</h1>
    <form action="actualizar.php?id=<?php echo $semestre['id']; ?>" method="post">
        <input type="hidden" name="id_original" value="<?php echo $semestre['id']; ?>">

        <label for="id">Nuevo ID:</label>
        <input type="number" name="id" value="<?php echo $semestre['id']; ?>" required><br>

        <label for="SemestreCodigo">Código:</label>
        <input type="text" name="SemestreCodigo" value="<?php echo $semestre['SemestreCodigo']; ?>" required><br>

        <label for="SemestreNumeral">Numeral:</label>
        <input type="number" name="SemestreNumeral" value="<?php echo $semestre['SemestreNumeral']; ?>" required><br>

        <label for="SemestreLiteral">Literal:</label>
        <input type="text" name="SemestreLiteral" value="<?php echo $semestre['SemestreLiteral']; ?>" required><br>

        <button type="submit">Actualizar</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
