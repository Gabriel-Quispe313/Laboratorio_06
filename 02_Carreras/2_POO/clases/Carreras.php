<?php
class Carreras {
    private $db;
    private $id;
    private $codigo;
    private $nombre;
    private $abrev;

    public function __construct($db) {
        $this->db = $db;
    }

    //Getters y Setters
    public function getId() { return $this->id; }
    public function getCodigo() { return $this->codigo; }
    public function getNombre() { return $this->nombre; }
    public function getAbrev() { return $this->abrev; }

    public function setId($id) { $this->id = $id; }
    public function setCodigo($codigo) { $this->codigo = $codigo; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setAbrev($abrev) { $this->abrev = $abrev; }

    //metodos CRUD
    public function getAll() {
        $sql = "SELECT * FROM carreras";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }
    public function getById($id) {
        $sql = "SELECT * FROM carreras WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function create($data) {
        $sql = "INSERT INTO carreras (id, codigo, nombre, abrev) VALUES (?,?,?,?)";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("isss", $data['id'], $data['codigo'], $data['nombre'], $data['abrev']);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function update($data) {
        $sql = "UPDATE carreras SET codigo = ?, nombre = ?, abrev = ? WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("sssi", $data['codigo'], $data['nombre'], $data['abrev'], $data['id']);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public function delete($id) {
        $sql = "DELETE FROM carreras WHERE id = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
?>