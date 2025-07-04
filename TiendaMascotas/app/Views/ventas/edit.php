<h2>Editar Venta</h2>
<form method="POST">
    <div class="mb-3">
        <label for="cliente_id">Cliente:</label>
        <select id="cliente_id"
                name="cliente_id"
                class="form-control"
                required>
            <?php foreach($clientes as $c): ?>
                <option value="<?= $c['id'] ?>"
                    <?= $c['id'] == $venta['cliente_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($c['nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="fecha_venta">Fecha de Venta:</label>
        <input type="date"
               id="fecha_venta"
               name="fecha_venta"
               class="form-control"
               value="<?= htmlspecialchars($venta['fecha_venta']) ?>"
               required>
    </div>
    <div class="mb-3">
        <label for="total">Total (S/):</label>
        <input type="number"
               id="total"
               name="total"
               step="0.01"
               class="form-control"
               value="<?= htmlspecialchars($venta['total']) ?>"
               required>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php?page=ventas" class="btn btn-secondary">Cancelar</a>
</form>
