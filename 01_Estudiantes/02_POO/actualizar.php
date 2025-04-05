<?php
require_once 'clases/Database.php';
require_once 'clases/Estudiante.php';

$database = new Database();
$estudiante = new Estudiante($database);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ci = $_POST['ci'];
    $data = [
        'ci' => $_POST['ci'],
        'nombres' => $_POST['nombres'],
        'apellidos' => $_POST['apellidos'],
        'email' => $_POST['email'],
        'celular' => $_POST['celular'],
        'carrera' => $_POST['carrera']
    ];

    if($estudiante->update($ci, $data)) {
        header("Location: index.php");
        exit();
    }else{
        $error = "Error al actualizar el estudiante";
    }
}

$database->closeConnection();
?>