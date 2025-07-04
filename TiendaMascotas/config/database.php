<?php
class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $host = 'localhost';
        $db   = 'tienda_mascotas';
        $user = 'root';
        $pass = '';  // ← Asegúrate de que coincida con la contraseña SQL

        $dsn = "mysql:host=$host;dbname=$db;charset=utf8";
        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En producción deberías registrar el error en un log, no mostrarlo completo
            die('Error de conexión a la base de datos: ' . $e->getMessage());
        }
    }

    /**
     * Devuelve la instancia PDO única (Singleton)
     *
     * @return PDO
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance->pdo;
    }
}
