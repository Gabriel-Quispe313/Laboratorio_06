<?php
require_once 'clases/Database.php';
require_once 'clases/Carreras.php';

$database = new Database();
$carreras = new Carreras($database);

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    if($carreras->delete($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar la carrera";
    }
}
$database->closeConnection();
?>