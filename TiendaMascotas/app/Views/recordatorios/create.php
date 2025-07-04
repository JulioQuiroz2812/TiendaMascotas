<h2>Nuevo Recordatorio</h2>
<form method="POST">
    <div class="mb-3">
        <label for="descripcion">Descripción:</label>
        <input type="text"
               id="descripcion"
               name="descripcion"
               class="form-control"
               required>
    </div>
    <div class="mb-3">
        <label for="fecha_recordatorio">Fecha de Recordatorio:</label>
        <input type="date"
               id="fecha_recordatorio"
               name="fecha_recordatorio"
               class="form-control"
               required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?page=recordatorios"
       class="btn btn-secondary">Cancelar</a>
</form>
