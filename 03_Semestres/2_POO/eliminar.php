<?php
require_once 'clases/Database.php';
require_once 'clases/Semestres.php';

$db = new Database();
$semestres = new Semestres($db);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($semestres->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<p class='error'>Error al eliminar el semestre.</p>";
    }
} else {
    echo "<p class='error'>ID no especificado.</p>";
}
?>
