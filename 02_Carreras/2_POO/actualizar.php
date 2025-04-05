<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = [
        'id' => $_POST['txt-id'],
        'codigo' => $_POST['txt-codigo'],
        'nombre' => $_POST['txt-nombre'],
        'abrev' => $_POST['txt-abrev']
    ];

    if($carreras->update($data)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar la carrera";
    }
}
$database->closeConnection();
?>