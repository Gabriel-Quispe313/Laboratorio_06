<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';

$database = new Database();
$materias = new Materias($database->getConnection());

$result = $materias->getAll();
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
            <th>Código</th>
            <th>Nombre</th>
            <th>Horas Académicas</th>
            <th>Tipo</th>
            <th>Pensum</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($result as $row): ?>
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
        <?php endforeach; ?>
    </table>
        </div>
</body>
</html>
