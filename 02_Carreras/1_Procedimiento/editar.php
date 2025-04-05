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

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM carreras WHERE id = '$id';";
    $resultado = mysqli_query($conexion, $sql);
    $carreras = mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Editar Carrera</h1>
        <form action="actualizar.php" method="post">
            <div class="form-group">
                <label for="id">Id de la Carrera:</label>
                <input type="number" name="txt-id" value="<?php echo $carreras['id']; ?>" readonly require>
            </div>    
            <div class="form-group">
                <label for="codigo">Codigo de la Carrera:</label>
                <input type="number" name="txt-codigo" value="<?php echo $carreras['codigo']; ?>" required>  
            </div>  
            <div class="form-group">
                <label for="nombre">Nombre de la Carrera:</label>
                <input type="text" name="txt-nombre" value="<?php echo $carreras['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="abrev">Abrevacion (Carrera):</label>
                <input type="text" name="txt-abrev" value="<?php echo $carreras['abrev']; ?>">
            </div>
            <button type="submit" name="actualizar" class="btn">Actualizar</button>
            <a href="index.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>
</html>