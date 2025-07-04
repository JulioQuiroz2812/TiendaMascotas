<?php
require_once __DIR__ . '/../Models/Promocion.php';

class PromocionController {
    private $model;

    public function __construct() {
        $this->model = new Promocion();
    }

    public function index() {
        $promociones = $this->model->all();
        require __DIR__ . '/../Views/promociones/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->create($_POST)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Promoción creada correctamente.'];
                header('Location: index.php?page=promociones');
                exit;
            } else {
                $_SESSION['flash'] = ['type' => 'danger', 'message' => 'Error al crear la promoción.'];
            }
        }
        require __DIR__ . '/../Views/promociones/create.php';
    }

    public function edit($id) {
        $promocion = $this->model->find($id);
        if (!$promocion) {
            $_SESSION['flash'] = ['type' => 'danger', 'message' => 'Promoción no encontrada.'];
            header('Location: index.php?page=promociones');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->update($id, $_POST)) {
                $_SESSION['flash'] = ['type' => 'success', 'message' => 'Promoción actualizada correctamente.'];
                header('Location: index.php?page=promociones');
                exit;
            } else {
                $_SESSION['flash'] = ['type' => 'danger', 'message' => 'Error al actualizar la promoción.'];
            }
        }
        require __DIR__ . '/../Views/promociones/edit.php';
    }

    public function delete($id) {
        if ($this->model->delete($id)) {
            $_SESSION['flash'] = ['type' => 'success', 'message' => 'Promoción eliminada correctamente.'];
        } else {
            $_SESSION['flash'] = ['type' => 'danger', 'message' => 'Error al eliminar la promoción.'];
        }
        header('Location: index.php?page=promociones');
        exit;
    }
}
