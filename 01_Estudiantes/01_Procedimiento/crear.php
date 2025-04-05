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
    <title>Crear Estudiante</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="container">
        <h1>Crear Nuevo Estudiante</h1>
        <form action="crear.php" method="post">
            <div class="form-group">
                <label for="ci">Cédula de Identidad:</label>
                <input type="text" name="txt-ci" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input type="text" name="txt-nombre" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos:</label>
                <input type="text" name="txt-apellido" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" name="txt-celular" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="txt-email" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" name="txt-carrera">
            </div>
            <button type="submit" name="crear" class="btn">Guardar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
        <?php
        if (isset($_POST['crear'])) {

            $ci = $_POST['txt-ci'];
            $nombres = $_POST['txt-nombre'];
            $apellidos = $_POST['txt-apellido'];
            $email = $_POST['txt-email'];
            $celular = $_POST['txt-celular'];
            $carrera = $_POST['txt-carrera'];

            $sql = "INSERT INTO estudiante (ci, nombres, apellidos, email, celular, carrera) VALUES ('$ci','$nombres','$apellidos','$email','$celular','$carrera');";

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