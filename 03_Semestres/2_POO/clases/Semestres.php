<?php
class Semestres {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM semestres";
        $result = $this->db->getConnection()->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM semestres WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO semestres (id, SemestreCodigo, SemestreNumeral, SemestreLiteral) 
                VALUES (?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("isss", $data['id'], $data['SemestreCodigo'], $data['SemestreNumeral'], $data['SemestreLiteral']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE semestres 
                SET id = ?, SemestreCodigo = ?, SemestreNumeral = ?, SemestreLiteral = ? 
                WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("isssi", $data['id'], $data['SemestreCodigo'], $data['SemestreNumeral'], $data['SemestreLiteral'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM semestres WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
