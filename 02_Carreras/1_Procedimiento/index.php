<?php
//Formulario de index
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
    <title>CRUD Carreras - Procedimientos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="container">
        <h1>Lista de Carreras</h1>
        <a href="crear.php" class="btn">Agregar Carrera</a>
        <table border="1">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Codigo Carrera</th>
                    <th>Nombre Carrera</th>
                    <th>Abreviacion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM carreras;";
                $resultado = mysqli_query($conexion, $sql);
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    echo "<td>" . $fila['codigo'] . "</td>";
                    echo "<td>" . $fila['nombre'] . "</td>";
                    echo "<td>" . $fila['abrev'] . "</td>";
                    echo "<td> <a href='editar.php?id=" . $fila['id'] . "' class='btn'>Editar</a>
                    <a href='eliminar.php?id=" . $fila['id'] . "' class='btn btn-danger'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>

