<?php
require_once 'clases/Database.php';
require_once 'clases/Materias.php';

$database = new Database();
$materias = new Materias($database->getConnection());

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($materias->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Error al eliminar la materia.</p>";
    }
} else {
    echo "<p class='error'>ID no especificado para eliminar.</p>";
}
?>
