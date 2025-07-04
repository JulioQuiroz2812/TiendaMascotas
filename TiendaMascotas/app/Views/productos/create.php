<h2>Nuevo Producto</h2>
<form method="POST">
    <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text"
               id="nombre"
               name="nombre"
               class="form-control"
               required>
    </div>
    <div class="mb-3">
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion"
                  name="descripcion"
                  class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <label for="precio">Precio (S/):</label>
        <input type="number"
               id="precio"
               name="precio"
               step="0.01"
               class="form-control"
               required>
    </div>
    <div class="mb-3">
        <label for="stock">Stock:</label>
        <input type="number"
               id="stock"
               name="stock"
               class="form-control"
               required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?page=productos" class="btn btn-secondary">Cancelar</a>
</form>
