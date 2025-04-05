<?php
class Semestres {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM semestres";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM semestres WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO semestres (id, SemestreCodigo, SemestreNumeral, SemestreLiteral) 
                VALUES (:id, :codigo, :numeral, :literal)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':codigo', $data['SemestreCodigo']);
        $stmt->bindParam(':numeral', $data['SemestreNumeral'], PDO::PARAM_INT);
        $stmt->bindParam(':literal', $data['SemestreLiteral']);
        return $stmt->execute();
    }

    public function update($id_original, $data) {
        $sql = "UPDATE semestres 
                SET id = :id, SemestreCodigo = :codigo, SemestreNumeral = :numeral, SemestreLiteral = :literal 
                WHERE id = :id_original";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':codigo', $data['SemestreCodigo']);
        $stmt->bindParam(':numeral', $data['SemestreNumeral'], PDO::PARAM_INT);
        $stmt->bindParam(':literal', $data['SemestreLiteral']);
        $stmt->bindParam(':id_original', $id_original, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM semestres WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
