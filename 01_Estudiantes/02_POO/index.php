<?php
require_once 'clases/Database.php';
require_once 'clases/Estudiante.php';

$database = new Database();
$estudiante = new Estudiante($database);
$estudiantes = $estudiante->getAll();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">    
    <title>CRUD Estudiantes - OOP</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Estudiantes</h1>
        <a href="crear.php" class="btn">Nuevo Estudiante</a>
        <table border="1">
            <thead>
                <tr>
                    <th>CI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($fila = $estudiantes->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $fila['ci']; ?></td>;   
                        <td><?php echo $fila['nombres']; ?></td>;                     
                        <td><?php echo $fila['apellidos']; ?></td>;
                        <td><?php echo $fila['email']; ?></td>;
                        <td><?php echo $fila['celular']; ?></td>;
                        <td><?php echo $fila['carrera']; ?></td>;
                        <td>
                            <a href='editar.php?ci=<?php echo $fila['ci']; ?>" class='btn'>Editar</a>
                            <a href='eliminar.php?ci=<?php echo $fila['ci']; ?>" class='btn btn-danger'>Eliminar</a>
                        </td>";
                    </tr>
                <?php endwhile; ?> 
            </tbody>
        </table>
    </div>
</body>
</html>
<?php $database->closeConnection(); ?>