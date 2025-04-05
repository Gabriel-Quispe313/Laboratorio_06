<?php
require_once 'clases/Database.php';
require_once 'clases/Docentes.php';

$db = new Database();
$docentes = new Docentes($db->getConnection());

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $docente = $docentes->getById($id);

    if (!$docente) {
        die("<p>Error: Docente no encontrado.</p>");
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_original = $_POST['id_original']; 
    $nuevo_id = $_POST['id'];
    $data = [
        'id' => $nuevo_id,
        'DocenteCodigo' => $_POST['DocenteCodigo'],
        'DocenteCarnetIdentidad' => $_POST['DocenteCarnetIdentidad'],
        'DocenteNombres' => $_POST['DocenteNombres'],
        'DocenteFechaNacimiento' => $_POST['DocenteFechaNacimiento'],
        'DocenteDireccion' => $_POST['DocenteDireccion'],
        'DocenteCelular' => $_POST['DocenteCelular']
    ];

    $docente_existente = $docentes->getById($nuevo_id);
    if ($docente_existente && $nuevo_id != $id_original) {
        die("<p>Error: El ID ingresado ya está en uso por otro registro.</p>");
    }

    if ($docentes->update($id_original, $data)) {
        header("Location: index.php"); 
        exit();
    } else {
        echo "<p>Error al actualizar el docente.</p>";
    }
}
?>

