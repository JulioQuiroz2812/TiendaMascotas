<?php
require_once __DIR__ . '/../../config/database.php';

class Recordatorio {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance(); // Debe devolver un PDO
    }

    public function all(): array {
        $stmt = $this->db->query(
            "SELECT * FROM recordatorios ORDER BY fecha_recordatorio DESC"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id) {
        $stmt = $this->db->prepare(
            "SELECT * FROM recordatorios WHERE id = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool {
        $sql = "INSERT INTO recordatorios (descripcion, fecha_recordatorio)
                VALUES (:descripcion, :fecha_recordatorio)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'descripcion'        => $data['descripcion'] ?? '',
            'fecha_recordatorio' => $data['fecha_recordatorio'] ?? null,
        ]);
    }

    public function update(int $id, array $data): bool {
        $sql = "UPDATE recordatorios
                SET descripcion = :descripcion,
                    fecha_recordatorio = :fecha_recordatorio
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id'                  => $id,
            'descripcion'         => $data['descripcion'] ?? '',
            'fecha_recordatorio'  => $data['fecha_recordatorio'] ?? null,
        ]);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare(
            "DELETE FROM recordatorios WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }
}
