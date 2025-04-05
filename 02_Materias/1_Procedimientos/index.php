<?php
require_once 'conexion.php';

$sql = "SELECT * FROM materias";
$resultado = mysqli_query($conexion, $sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Materias</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
    <h1>Materias</h1>
    <a href="crear.php">Crear Nueva Materia</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Materia Código</th>
            <th>Materia Nombre</th>
            <th>Horas Académicas</th>
            <th>Tipo de Materia</th>
            <th>Pensum Materia</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = mysqli_fetch_assoc($resultado)): ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['MateriaCodigo']; ?></td>
            <td><?php echo $fila['MateriaNombre']; ?></td>
            <td><?php echo $fila['MateriaHoraAcademica']; ?></td>
            <td><?php echo $fila['MateriaTipo']; ?></td>
            <td><?php echo $fila['MateriaPensum']; ?></td>
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
