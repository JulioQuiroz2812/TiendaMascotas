<?php
require_once __DIR__ . '/../Models/Recordatorio.php';

class RecordatorioController {
    private $model;

    public function __construct() {
        $this->model = new Recordatorio();
    }

    public function index() {
        $recordatorios = $this->model->all();
        require __DIR__ . '/../Views/recordatorios/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->create($_POST)) {
                $_SESSION['flash'] = [
                    'type'    => 'success',
                    'message' => 'Recordatorio creado correctamente.'
                ];
                header('Location: index.php?page=recordatorios');
                exit;
            }
        }
        require __DIR__ . '/../Views/recordatorios/create.php';
    }

    public function edit($id) {
        $recordatorio = $this->model->find((int)$id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->model->update((int)$id, $_POST)) {
                $_SESSION['flash'] = [
                    'type'    => 'success',
                    'message' => 'Recordatorio actualizado correctamente.'
                ];
                header('Location: index.php?page=recordatorios');
                exit;
            }
        }
        require __DIR__ . '/../Views/recordatorios/edit.php';
    }

    public function delete($id) {
        $this->model->delete((int)$id);
        $_SESSION['flash'] = [
            'type'    => 'success',
            'message' => 'Recordatorio eliminado correctamente.'
        ];
        header('Location: index.php?page=recordatorios');
        exit;
    }
}
