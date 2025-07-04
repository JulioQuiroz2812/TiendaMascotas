<?php
require_once __DIR__ . '/../Models/Cliente.php';

class ClienteController {
    private $model;

    public function __construct() {
        $this->model = new Cliente();
    }

    public function index() {
        $clientes = $this->model->all();
        require __DIR__ . '/../Views/clientes/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->create($_POST)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Cliente creado correctamente.'];
                header('Location: index.php?page=clientes');
                exit;
            }
        }
        require __DIR__ . '/../Views/clientes/create.php';
    }

    public function edit($id) {
        $cliente = $this->model->find($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->update($id, $_POST)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Cliente actualizado correctamente.'];
                header('Location: index.php?page=clientes');
                exit;
            }
        }
        require __DIR__ . '/../Views/clientes/edit.php';
    }

    public function delete($id) {
        $this->model->delete($id);
        $_SESSION['flash'] = ['type' => 'success', 'message' => 'Cliente eliminado correctamente.'];
        header('Location: index.php?page=clientes');
        exit;
    }
}
