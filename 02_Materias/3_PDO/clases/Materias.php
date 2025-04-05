<?php
class Materias {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM materias";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $sql = "SELECT * FROM materias WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO materias (MateriaCodigo, MateriaNombre, MateriaHoraAcademica, MateriaTipo, MateriaPensum) 
                VALUES (:codigo, :nombre, :hora, :tipo, :pensum)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':codigo', $data['MateriaCodigo']);
        $stmt->bindParam(':nombre', $data['MateriaNombre']);
        $stmt->bindParam(':hora', $data['MateriaHoraAcademica']);
        $stmt->bindParam(':tipo', $data['MateriaTipo'], PDO::PARAM_INT);
        $stmt->bindParam(':pensum', $data['MateriaPensum']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE materias 
                SET MateriaCodigo = :codigo, MateriaNombre = :nombre, MateriaHoraAcademica = :hora, MateriaTipo = :tipo, MateriaPensum = :pensum 
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':codigo', $data['MateriaCodigo']);
        $stmt->bindParam(':nombre', $data['MateriaNombre']);
        $stmt->bindParam(':hora', $data['MateriaHoraAcademica']);
        $stmt->bindParam(':tipo', $data['MateriaTipo'], PDO::PARAM_INT);
        $stmt->bindParam(':pensum', $data['MateriaPensum']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM materias WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>
