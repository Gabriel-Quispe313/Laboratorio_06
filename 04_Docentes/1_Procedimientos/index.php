<?php
require_once 'conexion.php';

$sql = "SELECT * FROM docentes";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Docentes</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
    <h1>Docentes</h1>
    <a href="crear.php">Crear Nuevo Docente</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Carnet de Identidad</th>
            <th>Nombres</th>
            <th>Fecha de Nacimiento</th>
            <th>Dirección</th>
            <th>Celular</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['DocenteCodigo']; ?></td>
            <td><?php echo $fila['DocenteCarnetIdentidad']; ?></td>
            <td><?php echo $fila['DocenteNombres']; ?></td>
            <td><?php echo $fila['DocenteFechaNacimiento']; ?></td>
            <td><?php echo $fila['DocenteDireccion']; ?></td>
            <td><?php echo $fila['DocenteCelular']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a>
                <a href="eliminar.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    </div>
</body>
</html>
