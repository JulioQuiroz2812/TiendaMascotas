<?php
require_once __DIR__ . '/../../config/database.php';

class Producto {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance(); // Debe devolver un PDO
    }

    public function all(): array {
        $stmt = $this->db->query(
            "SELECT * FROM productos ORDER BY id DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id) {
        $stmt = $this->db->prepare(
            "SELECT * FROM productos WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock)
                VALUES (:nombre, :descripcion, :precio, :stock)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'nombre'      => $data['nombre'] ?? '',
            'descripcion' => $data['descripcion'] ?? '',
            'precio'      => $data['precio'] ?? 0,
            'stock'       => $data['stock'] ?? 0,
        ]);
    }

    public function update(int $id, array $data): bool {
        $sql = "UPDATE productos
                SET nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio,
                    stock = :stock
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id'          => $id,
            'nombre'      => $data['nombre'] ?? '',
            'descripcion' => $data['descripcion'] ?? '',
            'precio'      => $data['precio'] ?? 0,
            'stock'       => $data['stock'] ?? 0,
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare(
            "DELETE FROM productos WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }
}
