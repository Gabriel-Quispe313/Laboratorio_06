<?php
class Materias {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM materias";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function getById($id) {
        $sql = "SELECT * FROM materias WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);

        if (!$stmt) {
            die("Error en prepare(): " . $this->db->getConnection()->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO materias (id, MateriaCodigo, MateriaNombre, MateriaHoraAcademica, MateriaTipo, MateriaPensum) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->getConnection()->prepare($sql);

        if (!$stmt) {
            die("Error en prepare(): " . $this->db->getConnection()->error);
        }

        $stmt->bind_param("ssssis", $data['id'], $data['MateriaCodigo'], $data['MateriaNombre'], $data['MateriaHoraAcademica'], $data['MateriaTipo'], $data['MateriaPensum']);
        return $stmt->execute();
    }

    public function update($id, $data) {
        $sql = "UPDATE materias SET MateriaCodigo = ?, MateriaNombre = ?, MateriaHoraAcademica = ?, MateriaTipo = ?, MateriaPensum = ? 
                WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);

        if (!$stmt) {
            die("Error en prepare(): " . $this->db->getConnection()->error);
        }

        $stmt->bind_param("sssisi", $data['MateriaCodigo'], $data['MateriaNombre'], $data['MateriaHoraAcademica'], $data['MateriaTipo'], $data['MateriaPensum'], $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $sql = "DELETE FROM materias WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);

        if (!$stmt) {
            die("Error en prepare(): " . $this->db->getConnection()->error);
        }

        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
