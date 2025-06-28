<?php

class Recordatorio
{
    private $id;
    private $cliente;
    private $promocion;
    private $fechaEnvio;
    private $mensaje;

    public function __construct($id = null, $cliente = null, $promocion = null, $fechaEnvio = null, $mensaje = null)
    {
        $this->id = $id;
        $this->cliente = $cliente;
        $this->promocion = $promocion;
        $this->fechaEnvio = $fechaEnvio;
        $this->mensaje = $mensaje;
    }

    public function obtenerTodos()
    {
        $db = Database::getConnection();
        $query = 'SELECT * FROM recordatorios';
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPorId($id)
    {
        $db = Database::getConnection();
        $query = 'SELECT * FROM recordatorios WHERE id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar()
    {
        $db = Database::getConnection();
        $query = 'INSERT INTO recordatorios (cliente, promocion, fecha_envio, mensaje) VALUES (:cliente, :promocion, :fecha_envio, :mensaje)';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':promocion', $this->promocion);
        $stmt->bindParam(':fecha_envio', $this->fechaEnvio);
        $stmt->bindParam(':mensaje', $this->mensaje);
        return $stmt->execute();
    }

    public function eliminar($id)
    {
        $db = Database::getConnection();
        $query = 'DELETE FROM recordatorios WHERE id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function actualizar()
    {
        $db = Database::getConnection();
        $query = 'UPDATE recordatorios SET cliente = :cliente, promocion = :promocion, fecha_envio = :fecha_envio, mensaje = :mensaje WHERE id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':cliente', $this->cliente);
        $stmt->bindParam(':promocion', $this->promocion);
        $stmt->bindParam(':fecha_envio', $this->fechaEnvio);
        $stmt->bindParam(':mensaje', $this->mensaje);
        $stmt->bindParam(':id', $this->id);
        return $stmt->execute();
    }
}
?>
