<?php
class EstudiantePDO{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM estudiante";
        $stmt = $this->db->getConnection()->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($ci) {
        $sql = "SELECT * FROM estudiante WHERE ci = :ci";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':ci', $ci, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO estudiante (ci, nombres, apellidos, email, celular, carrera) VALUES (:ci, :nombre, :apellido, :email, :celular, :carrera)";

        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':ci', $data['ci']);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':apellido', $data['apellido']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':celular', $data['celular']);
        $stmt->bindParam(':carrera', $data['carrera']);

        return $stmt->execute();
    }

    public function update($ci, $data)
    {
        $sql = "UPDATE estudiante SET
                ci = :ci,
                nombres = :nombre,
                apellidos = :apellido,
                email = :email,
                celular = :celular,
                carrera = :carrera
                WHERE ci = :ci";

        $stmt = $this->db->getConnection()->prepare($sql);

        $stmt->bindParam(':ci', $data['ci']);
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':apellido', $data['apellido']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':celular', $data['celular']);
        $stmt->bindParam(':carrera', $data['carrera']);
        $stmt->bindParam(':ci', $ci, PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete($ci)
    {
        $sql = "DELETE FROM estudiante WHERE ci = :ci";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bindParam(':ci', $ci, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>