<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Clientes</h2>
  <a href="index.php?page=clientes&action=create" class="btn btn-primary">Nuevo cliente</a>
</div>

<div class="table-responsive">
  <table class="table table-striped table-hover align-middle">
    <thead class="table-light">
      <tr>
        <th>Nombre</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th class="text-end">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($clientes as $c): ?>
      <tr>
        <td><?= htmlspecialchars($c['nombre']) ?></td>
        <td><?= htmlspecialchars($c['correo']) ?></td>
        <td><?= htmlspecialchars($c['telefono']) ?></td>
        <td><?= htmlspecialchars($c['direccion']) ?></td>
        <td class="text-end">
          <a href="index.php?page=clientes&action=edit&id=<?= $c['id'] ?>" class="btn btn-sm btn-outline-secondary">Editar</a>
          <a href="index.php?page=clientes&action=delete&id=<?= $c['id'] ?>" 
             class="btn btn-sm btn-outline-danger"
             onclick="return confirm('¿Eliminar este cliente?')">
             Borrar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
