<h2>Nuevo Recordatorio</h2>
<form method="POST">
    <div class="mb-3">
        <label>Descripción:</label>
        <input type="text" name="descripcion" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fecha de Recordatorio:</label>
        <input type="date" name="fecha_recordatorio" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?page=recordatorios" class="btn btn-secondary">Cancelar</a>
</form>
