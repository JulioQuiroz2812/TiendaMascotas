<?php
require_once __DIR__ . '/../../config/database.php';

class Venta {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function all() {
        $stmt = $this->db->query("SELECT v.*, c.nombre as cliente_nombre FROM ventas v JOIN clientes c ON v.cliente_id = c.id ORDER BY v.id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM ventas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = "INSERT INTO ventas (cliente_id, fecha_venta, total) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['cliente_id'],
            $data['fecha_venta'],
            $data['total']
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE ventas SET cliente_id=?, fecha_venta=?, total=? WHERE id=?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['cliente_id'],
            $data['fecha_venta'],
            $data['total'],
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM ventas WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
