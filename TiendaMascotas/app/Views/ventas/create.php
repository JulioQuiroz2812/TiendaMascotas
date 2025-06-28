<h2>Nueva Venta</h2>
<form method="POST">
    <div class="mb-3">
        <label>Cliente:</label>
        <select name="cliente_id" class="form-control" required>
            <?php foreach($clientes as $c): ?>
                <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['nombre']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Fecha de Venta:</label>
        <input type="date" name="fecha_venta" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Total (S/):</label>
        <input type="number" step="0.01" name="total" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?page=ventas" class="btn btn-secondary">Cancelar</a>
</form>
