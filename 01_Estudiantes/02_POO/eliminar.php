<?php
require_once 'clases/Database.php';
require_once 'clases/Estudiante.php';

$database = new Database();
$estudiante = new Estudiante($database);

if(isset($_GET['ci'])){
    $ci = $_GET['ci'];

    if($estudiante->delete($ci)){
        header("Location: index.php");
        exit();
    }else{
        echo "Error al eliminar el estudiante";
    }
}

$database->closeConnection();
?>