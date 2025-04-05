<?php
require_once 'conexion.php';

$sql = "SELECT * FROM semestres";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Semestres</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
    <h1>Semestres</h1>
    <a href="crear.php">Crear Nuevo Semestre</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Numeral</th>
            <th>Literal</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['SemestreCodigo']; ?></td>
            <td><?php echo $fila['SemestreNumeral']; ?></td>
            <td><?php echo $fila['SemestreLiteral']; ?></td>
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
