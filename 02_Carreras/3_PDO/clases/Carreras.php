<?php
class Carreras {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM carreras";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM carreras WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO carreras (id, codigo, nombre, abrev) VALUES (:id, :codigo, :nombre, :abrev)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':codigo', $data['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':abrev', $data['abrev'], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function update($data) {
        $sql = "UPDATE carreras SET codigo = :codigo, nombre = :nombre, abrev = :abrev WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':codigo', $data['codigo'], PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':abrev', $data['abrev'], PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM carreras WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
