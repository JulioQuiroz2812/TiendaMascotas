<h2>Nuevo Cliente</h2>
<form method="POST">
    <div class="mb-3">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Correo:</label>
        <input type="email" name="correo" class="form-control">
    </div>
    <div class="mb-3">
        <label>Teléfono:</label>
        <input type="text" name="telefono" class="form-control">
    </div>
    <div class="mb-3">
        <label>Dirección:</label>
        <input type="text" name="direccion" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="index.php?page=clientes" class="btn btn-secondary">Cancelar</a>
</form>
