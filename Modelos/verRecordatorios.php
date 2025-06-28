<?php
    require_once "controladores/RecordatorioController.php"; 
    require_once "layouts/header.php"; 

    $recordatorioController = new RecordatorioController();
    $recordatorios = $recordatorioController->mostrar(); 

    session_start();
    if (!isset($_SESSION["id"])) {
        header("location: login.php");
        exit();
    }
?>

<a class="btn btn-outline-danger" href="logout.php">Salir</a>
<h1 class="mt-4">Recordatorios del Sistema</h1>

<table class="table">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Promoción</th>
            <th>Fecha de Envío</th>
            <th>Mensaje</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($recordatorios as $recordatorio) {
            echo "<tr>
                    <td>" . $recordatorio["cliente"] . "</td>
                    <td>" . $recordatorio["promocion"] . "</td>
                    <td>" . $recordatorio["fecha_envio"] . "</td>
                    <td>" . $recordatorio["mensaje"] . "</td>
                    <td><a href='eliminarRecordatorio.php?id=" . $recordatorio["id"] . "' class='btn btn-outline-danger'>Eliminar</a></td>
                    <td><a href='actualizarRecordatorio.php?id=" . $recordatorio["id"] . "' class='btn btn-outline-info'>Actualizar</a></td>
                </tr>";
        }
        ?>
    </tbody>
</table>

<!-- Formulario para agregar un nuevo recordatorio -->
<a href="registrarRecordatorio.php" class="btn btn-primary">Registrar Recordatorio</a>