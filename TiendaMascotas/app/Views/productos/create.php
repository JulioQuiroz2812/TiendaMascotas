<h2>Nuevo Producto</h2>
<form method="POST">
    <div class="mb-3">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripción:</label>
        <textarea name="descripcion" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label>Precio:</label>
        <input type="number" step="0.01" name="precio" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stock:</label>
        <input type="number" name="stock" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?page=productos" class="btn btn-secondary">Cancelar</a>
</form>
