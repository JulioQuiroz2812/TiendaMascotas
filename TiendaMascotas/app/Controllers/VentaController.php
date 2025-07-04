<?php
require_once __DIR__ . '/../Models/Venta.php';
require_once __DIR__ . '/../Models/Cliente.php';

class VentaController {
    private $model;
    private $clienteModel;

    public function __construct() {
        $this->model = new Venta();
        $this->clienteModel = new Cliente();
    }

    public function index() {
        $ventas = $this->model->all();
        require __DIR__ . '/../Views/ventas/index.php';
    }

    public function create() {
        $clientes = $this->clienteModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->create($_POST)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Venta creada correctamente.'];
                header('Location: index.php?page=ventas');
                exit;
            }
        }
        require __DIR__ . '/../Views/ventas/create.php';
    }

    public function edit($id) {
        $venta = $this->model->find($id);
        $clientes = $this->clienteModel->all();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->update($id, $_POST)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Venta actualizada correctamente.'];
                header('Location: index.php?page=ventas');
                exit;
            }
        }
        require __DIR__ . '/../Views/ventas/edit.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Venta eliminada correctamente.'];
        header('Location: index.php?page=ventas');
        exit;
    }
}
