<?php
require_once "modelos/Recordatorio.php"; 

class RecordatorioController
{
    public function mostrar()
    {
        $recordatorio = new Recordatorio();  
        return $recordatorio->obtenerTodos();  
    }

    public function eliminar($id)
    {
        $recordatorio = new Recordatorio();  
        $resultado = $recordatorio->eliminar($id);  

        if ($resultado) {
            header("Location: verRecordatorios.php"); 
            exit();
        } else {
            echo "Error: no se pudo eliminar el recordatorio.";
        }
    }

    public function buscar($id)
    {
        $recordatorio = new Recordatorio();  
        return $recordatorio->obtenerPorId($id);  
    }

    public function guardar($datos)
    {
        $recordatorio = new Recordatorio(null, $datos['cliente'], $datos['promocion'], $datos['fechaEnvio'], $datos['mensaje']);
        $resultado = $recordatorio->guardar();

        if ($resultado) {
            header("Location: verRecordatorios.php"); 
            exit();
        } else {
            echo "Error: no se pudo guardar el recordatorio.";
        }
    }

    public function actualizar($datos)
    {
        $recordatorio = new Recordatorio($datos['id'], $datos['cliente'], $datos['promocion'], $datos['fechaEnvio'], $datos['mensaje']);
        $resultado = $recordatorio->actualizar();

        if ($resultado) {
            header("Location: verRecordatorios.php"); 
            exit();
        } else {
            echo "Error: no se pudo actualizar el recordatorio.";
        }
    }
}
?>
