<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';

$database = new Database();
$materias = new Materias($database);

$result = $materias->getAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Materias</title>
</head>
<body>
    <h1>Materias</h1>
    <a href="crear.php">Crear Nueva Materia</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Horas Académicas</th>
            <th>Tipo</th>
            <th>Pensum</th>
            <th>Acciones</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['MateriaCodigo']; ?></td>
            <td><?php echo $row['MateriaNombre']; ?></td>
            <td><?php echo $row['MateriaHoraAcademica']; ?></td>
            <td><?php echo $row['MateriaTipo']; ?></td>
            <td><?php echo $row['MateriaPensum']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a>
                <a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
