<?php
require_once __DIR__ . '/../Models/Producto.php';

class ProductoController {
    private $model;

    public function __construct() {
        $this->model = new Producto();
    }

    public function index() {
        $productos = $this->model->all();
        require __DIR__ . '/../Views/productos/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->create($_POST)) {
                $_SESSION['flash'] = [
                    'type'    => 'success',
                    'message' => 'Producto creado correctamente.'
                ];
                header('Location: index.php?page=productos');
                exit;
            }
        }
        require __DIR__ . '/../Views/productos/create.php';
    }

    public function edit($id) {
        $producto = $this->model->find((int)$id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->update((int)$id, $_POST)) {
                $_SESSION['flash'] = [
                    'type'    => 'success',
                    'message' => 'Producto actualizado correctamente.'
                ];
                header('Location: index.php?page=productos');
                exit;
            }
        }
        require __DIR__ . '/../Views/productos/edit.php';
    }

    public function delete($id) {
        $this->model->delete((int)$id);
        $_SESSION['flash'] = [
            'type'    => 'success',
            'message' => 'Producto eliminado correctamente.'
        ];
        header('Location: index.php?page=productos');
        exit;
    }
}
