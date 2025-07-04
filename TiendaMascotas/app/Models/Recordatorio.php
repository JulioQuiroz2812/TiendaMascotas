<?php
require_once __DIR__ . '/../../config/database.php';

class Recordatorio {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function all() {
        $stmt = $this->db->query("SELECT * FROM recordatorios");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
