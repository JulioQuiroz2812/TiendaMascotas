<?php

require_once "Conn.php";

class Cliente {
    
    public function mostrar() {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM clientes";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function guardar($nombre, $direccion, $telefono, $email) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "INSERT INTO clientes(nombre, direccion, telefono, email)
                VALUES('$nombre', '$direccion', '$telefono', '$email')";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function eliminar($idCliente) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "DELETE FROM clientes WHERE idCliente=$idCliente";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function buscar($idCliente) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "SELECT * FROM clientes WHERE idCliente=$idCliente";
        $resultado = $conexion->query($sql);
        $conn->cerrar();
        return $resultado;
    }

    public function actualizar($nombre, $direccion, $telefono, $email, $idCliente) {
        $conn = new Conn();
        $conexion = $conn->conectar();
        $sql = "UPDATE clientes 
                SET nombre='$nombre', direccion='$direccion', telefono='$telefono', email='$email' 
                WHERE idCliente=$idCliente";
        $resultado = $conexion->exec($sql);
        $conn->cerrar();
        return $resultado;
    }
}
?>
