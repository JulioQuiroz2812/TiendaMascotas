<?php

class DetalleVenta {
    private $producto;
    private $cantidad;
    private $precioUnitario;

    public function __construct($producto, $cantidad, $precioUnitario) {
        $this->producto = $producto;
        $this->cantidad = $cantidad;
        $this->precioUnitario = $precioUnitario;
    }

    public function getProducto() {
        return $this->producto;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioUnitario() {
        return $this->precioUnitario;
    }

    public function subtotal() {
        return $this->cantidad * $this->precioUnitario;
    }
}
?>
