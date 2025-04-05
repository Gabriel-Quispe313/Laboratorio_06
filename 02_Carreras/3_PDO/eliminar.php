<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database->getConnection());

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $carrera_existente = $carreras->getById($id);
    if (!$carrera_existente) {
        die("<p>Error: La carrera con ID $id no existe.</p>");
    }

    if ($carreras->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p>Error al eliminar la carrera. Por favor, verifica la conexión o consulta SQL.</p>";
    }
} else {
    echo "<p>Error: No se proporcionó un ID válido para eliminar.</p>";
}
$database->closeConnection();
?>
