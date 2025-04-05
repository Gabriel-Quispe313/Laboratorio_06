<?php
//formualario de crear
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Carrera</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Crear Nueva Carrera</h1>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="id">ID de la Carrera</label>
                <input type="number" name="txt-id" required>
            </div>
            <div class="form-group">
                <label for="codigo">Codigo de la Carrera:</label>
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
            <button type="submit" name="crear" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
        <?php
        if (isset($_POST['crear'])) {

            $id = $_POST['txt-id'];
            $codigo = $_POST['txt-codigo'];
            $nombre = $_POST['txt-nombre'];
            $abrev = $_POST['txt-abrev'];

            $sql = "INSERT INTO carreras (id, codigo, nombre, abrev) VALUES ('$id','$codigo','$nombre','$abrev');";

            if (mysqli_query($conexion, $sql)) {
                header("Location: index.php");
            } else {
                echo "<p class='error'>" . mysqli_error($conexion) . "</p>";
            }
        }
        ?>
    </div>
</body>
</html>