<?php

require_once 'DetalleVenta.php';

class Venta {
    private $idVenta;
    private $fecha;
    private $total;
    private $cliente;
    private $detalles = [];

    public function __construct($idVenta, $fecha, $cliente) {
        $this->idVenta = $idVenta;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->total = 0;
    }

    public function agregarDetalle($detalle) {
        $this->detalles[] = $detalle;
        $this->calcularTotal();
    }

    public function calcularTotal() {
        $suma = 0;
        foreach ($this->detalles as $detalle) {
            $suma += $detalle->subtotal();
        }
        $this->total = $suma;
        return $this->total;
    }

}
?>
