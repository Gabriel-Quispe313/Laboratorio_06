<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codigo = $_POST['SemestreCodigo'];
    $numeral = $_POST['SemestreNumeral'];
    $literal = $_POST['SemestreLiteral'];

    $sql = "INSERT INTO semestres (id, SemestreCodigo, SemestreNumeral, SemestreLiteral) 
            VALUES ('$id', '$codigo', '$numeral', '$literal')";
    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
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
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
