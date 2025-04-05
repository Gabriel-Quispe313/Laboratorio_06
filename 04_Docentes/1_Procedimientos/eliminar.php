<?php
require_once 'conexion.php';

// Verificar si se recibió un ID para eliminar
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta para eliminar el registro de la tabla docentes
    $sql = "DELETE FROM docentes WHERE id = $id";

    // Ejecutar la consulta y verificar el resultado
    if (mysqli_query($conexion, $sql)) {
        header("Location: index.php"); // Redirigir al listado de docentes después de eliminar
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion); // Mostrar mensaje de error si la eliminación falla
    }
} else {
    echo "ID no especificado para eliminar."; // Mensaje si no se pasa un ID
}
?>
