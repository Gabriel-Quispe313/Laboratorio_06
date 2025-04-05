<?php
require_once 'clases/DatabasePDO.php';
require_once 'clases/EstudiantePDO.php';
$database = new DatabasePDO();
$estudiante = new EstudiantePDO($database);
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ci = $_POST['ci'];
    $data = [
        'ci' => $_POST['ci'],
        'nombre' => $_POST['nombre'],
        'apellido' => $_POST['apellido'],
        'email' => $_POST['email'],
        'telefono' => $_POST['telefono'],
        'carrera' => $_POST['carrera']
    ];
    if($estudiante->update($ci, $data)) {
        header('Location: index.php');
        exit();
    } else {
        echo 'Error al actualizar el estudiante';
    }
}
$database->closeConnection();
?>