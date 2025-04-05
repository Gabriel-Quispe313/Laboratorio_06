<?php
class Estudiante {
    private $db;
    private $ci;
    private $nombre;
    private $apellido;
    private $email;
    private $celular;
    private $carrera;

    public function __construct($db) {
        $this->db = $db;
    }

    // Getters y Setters
    public function getCi() { return $this->ci; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getEmail() { return $this->email; }
    public function getCelular() { return $this->celular; }
    public function getCarrera() { return $this->carrera; }

    public function setCi($ci) { $this->ci = $ci; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellido($apellido) { $this->apellido = $apellido; }
    public function setEmail($email) { $this->email = $email; }
    public function setCelular($celular) { $this->celular = $celular; }
    public function setCarrera($carrera) { $this->carrera = $carrera; }

    // Métodos CRUD
    public function getAll() {
        $sql = "SELECT * FROM estudiante";
        $result = $this->db->getConnection()->query($sql);
        return $result;
    }

    public function getById($ci) {
        $sql = "SELECT * FROM estudiante WHERE ci = ?";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->bind_param("s", $ci);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
        public function create($data) {
            $sql = "INSERT INTO estudiante (ci, nombres, apellidos, email, celular, carrera) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bind_param("ssssss", $data['ci'], $data['nombre'], $data['apellido'], $data['email'], $data['celular'], $data['carrera']);
            return $stmt->execute();
        }
        
        public function update($ci, $data) {
            $sql = "UPDATE estudiante SET ci = ?, nombres = ?, apellidos = ?, email = ?, celular = ?, carrera = ? WHERE ci = ?";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bind_param("sssssss", $data['ci'], $data['nombres'], $data['apellidos'], $data['email'], $data['celular'], $data['carrera'], $ci);
            return $stmt->execute();
        }
        
        public function delete($ci) {
            $sql = "DELETE FROM estudiante WHERE ci = ?";
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->bind_param("s", $ci);
            return $stmt->execute();
        }
        
    }
?>
¨
