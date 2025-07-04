<h2>Nueva Promoción</h2>
<form method="POST">
    <div class="mb-3">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tipo de Descuento:</label>
        <select name="tipo_descuento" class="form-control" required>
            <option value="PORCENTAJE">Porcentaje (%)</option>
            <option value="MONTO">Monto Fijo (S/)</option>
        </select>
    </div>
    <div class="mb-3">
        <label>Valor del Descuento:</label>
        <input type="number" step="0.01" name="valor_descuento" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Fecha de Fin:</label>
        <input type="date" name="fecha_fin" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Criterio de Segmentación:</label>
        <input type="text" name="criterio_segmentacion" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?page=promociones" class="btn btn-secondary">Cancelar</a>
</form>
