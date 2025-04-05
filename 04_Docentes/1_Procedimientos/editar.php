<?php
require_once 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM docentes WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $docente = mysqli_fetch_assoc($resultado);

    if (!$docente) {
        die("Error: Docente no encontrado.");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $codigo = $_POST['DocenteCodigo'];
    $ci = $_POST['DocenteCarnetIdentidad'];
    $nombres = $_POST['DocenteNombres'];
    $fecha_nacimiento = $_POST['DocenteFechaNacimiento'];
    $direccion = $_POST['DocenteDireccion'];
    $celular = $_POST['DocenteCelular'];

    $sql = "UPDATE docentes 
            SET id = '$id', DocenteCodigo = '$codigo', DocenteCarnetIdentidad = '$ci', DocenteNombres = '$nombres', DocenteFechaNacimiento = '$fecha_nacimiento', DocenteDireccion = '$direccion', DocenteCelular = '$celular' 
            WHERE id = $id";
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
    <title>Editar Docente</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Docente</h1>
        <form action="actualizar.php?id=<?php echo $docente['id']; ?>" method="post">
            <input type="hidden" name="id_actual" value="<?php echo $docente['id']; ?>">
            <label for="id">Nuevo ID:</label>
            <input type="number" name="id" value="<?php echo $docente['id']; ?>" required>
            <label for="DocenteCodigo">Código:</label>
            <input type="text" name="DocenteCodigo" value="<?php echo $docente['DocenteCodigo']; ?>" required>
            <label for="DocenteCarnetIdentidad">Carnet de Identidad:</label>
            <input type="text" name="DocenteCarnetIdentidad" value="<?php echo $docente['DocenteCarnetIdentidad']; ?>" required>
            <label for="DocenteNombres">Nombres:</label>
            <input type="text" name="DocenteNombres" value="<?php echo $docente['DocenteNombres']; ?>" required>
            <label for="DocenteFechaNacimiento">Fecha de Nacimiento:</label>
            <input type="text" name="DocenteFechaNacimiento" value="<?php echo $docente['DocenteFechaNacimiento']; ?>" required>
            <label for="DocenteDireccion">Direccion:</label>
            <input type="text" name="DocenteDireccion" value="<?php echo $docente['DocenteDireccion']; ?>" required>
            <label for="DocenteCelular">Celular:</label>
            <input type="text" name="DocenteCelular" value="<?php echo $docente['DocenteCelular']; ?>" required>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>

</html>
