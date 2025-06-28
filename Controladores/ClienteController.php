<?php

require_once "modelos/Cliente.php";

class ClienteController {

    public function guardar(array $datos) {
        $cliente = new Cliente();
        $resultado = $cliente->guardar(
            $datos["nombre"],
            $datos["direccion"],
            $datos["telefono"],
            $datos["email"]
        );

        if ($resultado != 0) {
            return "Cliente registrado correctamente";
        } else {
            return "Error: no se pudo registrar el cliente";
        }
    }

    public function mostrar() {
        $cliente = new Cliente();
        return $cliente->mostrar();
    }

    public function eliminar(int $idCliente) {
        $cliente = new Cliente();
        $resultado = $cliente->eliminar($idCliente);
        if ($resultado != 0) {
            header("location: verClientes.php");
        } else {
            return "Error: no se eliminó el cliente";
        }
    }

    public function buscar(int $idCliente) {
        $cliente = new Cliente();
        return $cliente->buscar($idCliente);
    }

    public function actualizar(array $datos) {
        $cliente = new Cliente();
        $resultado = $cliente->actualizar(
            $datos["nombre"],
            $datos["direccion"],
            $datos["telefono"],
            $datos["email"],
            $datos["idCliente"]
        );

        if ($resultado != 0) {
            header("location: verClientes.php");
        } else {
            return "Error: no se actualizó el cliente";
        }
    }
}
?>
