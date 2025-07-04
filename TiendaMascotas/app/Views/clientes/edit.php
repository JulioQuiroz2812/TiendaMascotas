<h2>Editar Cliente</h2>
<form method="POST">
    <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text"
               id="nombre"
               name="nombre"
               class="form-control"
               value="<?= htmlspecialchars($cliente['nombre']) ?>"
               required>
    </div>
    <div class="mb-3">
        <label for="correo">Correo:</label>
        <input type="email"
               id="correo"
               name="correo"
               class="form-control"
               value="<?= htmlspecialchars($cliente['correo']) ?>">
    </div>
    <div class="mb-3">
        <label for="telefono">Teléfono:</label>
        <input type="text"
               id="telefono"
               name="telefono"
               class="form-control"
               value="<?= htmlspecialchars($cliente['telefono']) ?>">
    </div>
    <div class="mb-3">
        <label for="direccion">Dirección:</label>
        <input type="text"
               id="direccion"
               name="direccion"
               class="form-control"
               value="<?= htmlspecialchars($cliente['direccion']) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="index.php?page=clientes" class="btn btn-secondary">Cancelar</a>
</form>
