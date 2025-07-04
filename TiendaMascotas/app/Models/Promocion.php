<?php
require_once __DIR__ . '/../../config/database.php';

class Promocion {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM promociones ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM promociones WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO promociones (nombre, tipo_descuento, valor_descuento, fecha_inicio, fecha_fin, criterio_segmentacion)
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['tipo_descuento'],
            $data['valor_descuento'],
            $data['fecha_inicio'],
            $data['fecha_fin'],
            $data['criterio_segmentacion']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE promociones
                SET nombre = ?, tipo_descuento = ?, valor_descuento = ?, fecha_inicio = ?, fecha_fin = ?, criterio_segmentacion = ?
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['nombre'],
            $data['tipo_descuento'],
            $data['valor_descuento'],
            $data['fecha_inicio'],
            $data['fecha_fin'],
            $data['criterio_segmentacion'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM promociones WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
