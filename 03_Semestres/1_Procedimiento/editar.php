<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM semestres WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $semestre = mysqli_fetch_assoc($resultado);

    if (!$semestre) {
        die("Error: Semestre no encontrado.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_actual = $_GET['id'];
    $nuevo_id = $_POST['id'];
    $codigo = $_POST['SemestreCodigo'];
    $numeral = $_POST['SemestreNumeral'];
    $literal = $_POST['SemestreLiteral'];

    $sql = "UPDATE semestres 
            SET id = '$nuevo_id', SemestreCodigo = '$codigo', SemestreNumeral = '$numeral', SemestreLiteral = '$literal' 
            WHERE id = $id_actual";

    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el semestre: " . mysqli_error($conexion);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Semestre</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
    <h1>Editar Semestre</h1>
    <form action="editar.php?id=<?php echo $semestre['id']; ?>" method="post">
        <label for="id">ID:</label>
        <input type="number" name="id" value="<?php echo $semestre['id']; ?>" readonly required><br>
        <label for="SemestreCodigo">Código:</label>
        <input type="text" name="SemestreCodigo" value="<?php echo $semestre['SemestreCodigo']; ?>" required><br>
        <label for="SemestreNumeral">Numeral:</label>
        <input type="number" name="SemestreNumeral" value="<?php echo $semestre['SemestreNumeral']; ?>" required><br>
        <label for="SemestreLiteral">Literal:</label>
        <input type="text" name="SemestreLiteral" value="<?php echo $semestre['SemestreLiteral']; ?>" required><br>
        <button type="submit">Actualizar</button>
        <a href="index.php">Cancelar</a>
    </form>
    </div>
</body>
</html>
