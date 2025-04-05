<?php
//Formulario de Edicion
$servidor = "localhost";
$usuario = "root";
$password = "";
$basedatos = "db_instituto";

$conexion = mysqli_connect($servidor, $usuario, $password, $basedatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

if(isset($_GET['ci'])) {
    $ci = $_GET['ci'];
    $sql = "SELECT * FROM estudiante WHERE ci = '$ci';";
    $resultado = mysqli_query($conexion, $sql);
    $estudiante = mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Estudiante</h1>

        <form action="actualizar.php" method="post">
            <div class="form-group">
                <label for="ci">Cédula de Identidad:</label>
                <input type="text" name="txt-ci" value="<?php echo $estudiante['ci']; ?>" readonly require>
            </div>    
            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input type="text" name="txt-nombre" value="<?php echo $estudiante['nombres']; ?>" required>  
            </div>  
            <div class="form-group">
                <label for="apellido">Apellidos:</label>
                <input type="text" name="txt-apellido" value="<?php echo $estudiante['apellidos']; ?>" required>
            </div>
            <div class="form-group">
                <label for="celular">Celular:</label>
                <input type="text" name="txt-celular" value="<?php echo $estudiante['celular']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="txt-email" value="<?php echo $estudiante['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <input type="text" name="txt-carrera" value="<?php echo $estudiante['carrera']; ?>">
            </div>
            <button type="submit" name="actualizar" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>