<h2>Editar Recordatorio</h2>
<form method="POST">
    <div class="mb-3">
        <label for="descripcion">Descripción:</label>
        <input type="text"
               id="descripcion"
               name="descripcion"
               class="form-control"
               value="<?= htmlspecialchars($recordatorio['descripcion']) ?>"
               required>
    </div>
    <div class="mb-3">
        <label for="fecha_recordatorio">Fecha de Recordatorio:</label>
        <input type="date"
               id="fecha_recordatorio"
               name="fecha_recordatorio"
               class="form-control"
               value="<?= htmlspecialchars($recordatorio['fecha_recordatorio']) ?>"
               required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php?page=recordatorios"
       class="btn btn-secondary">Cancelar</a>
</form>
